<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo1 extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    function createUser($user, $pass1, $pass2, $email, $wallet)
    {
		$regEx_pass = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/";
		$regEx_email = "/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/";

        $data = array( 
            'USER'=> $user,
            'PASSWORD' => $pass1,
            'EMAIL' => $email,
            'IMAGE' => "default.png",
            'WALLET' => $wallet
        );
        if($this->Modelo1->checkUserName($user) && preg_match($regEx_pass, $pass1) && preg_match($regEx_pass, $pass2) && $pass1==$pass2 && preg_match($regEx_email, $email) )
		{
            $data['PASSWORD']=password_hash($data['PASSWORD'], PASSWORD_DEFAULT);
            $this->db->insert('USERS', $data);
			return true;
		}
		else
		{
			return false;
		}
    }

    function checkUserName($user)
    {
        // $orden="SELECT * FROM USERS WHERE USER=".$user."";
        $this->db->where('USER', $user);
        $query=$this->db->get('USERS');
        if($query->result())
        {
            return false;
        }
        return true;
    }

    function getUserNames()
    {
        // $orden="SELECT * FROM USERS WHERE USER=".$user."";
        $this->db->select('USER');
        $query=$this->db->get('USERS');
        $users=[];
        foreach($query->result() as $fila)
        { 
            array_push($users, $fila->USER);
        }
        return $users;
    }

    function loginUser($user, $pass)
    {
        $this->db->select('PASSWORD');
        $this->db->where('USER', $user);
        $query=$this->db->get('USERS');
        foreach($query->result() as $fila)
        { 
            if(password_verify($pass, $fila->PASSWORD))
            {
                return true;
            }
            else{
                return false;
            }
        }
        return false;
    }

    function getUserInfo($user)
    {
        $this->db->select('ID_USER, USER, EMAIL, IMAGE, WALLET, RANK, SUPER');
        $this->db->where('USER', $user);
        $query=$this->db->get('USERS');
        foreach($query->result() as $fila)
        { 
            $info['ID_USER']=$fila->ID_USER;
            $info['USER']=$fila->USER;
            $info['EMAIL']=$fila->EMAIL;
            $info['IMAGE']=$fila->IMAGE;
            $info['WALLET']=$fila->WALLET;
            $info['RANK']=$fila->RANK;
            $info['SUPER']=$fila->SUPER;
        }

        $this->db->where('ID_USER', $info["ID_USER"]);
        $this->db->where('VALID', 1);
        $info["NFTs"]=$this->db->get("NFT");
        $info["NFTs_total"]=$info["NFTs"]->num_rows();

        $this->db->where('ID_USER', $info["ID_USER"]);
        $this->db->where('VALID', 1);
        $info["SUBUSERS"]=$this->db->get("SUBUSERS");
        $info["subusers_total"]=$info["SUBUSERS"]->num_rows();

        return $info;
    }

    function modifyUser($pass1, $pass2, $email, $wallet, $idUser)
    {
        $regEx_pass = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/";
		$regEx_email = "/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/";

        if($_FILES['image']['type']=="image/png") $tipo=".png";
		else if ($_FILES['image']['type']=="image/jpeg") $tipo=".jpeg";
		else if ($_FILES['image']['type']=="image/gif") $tipo=".gif";
		else $tipo=null;

        $this->db->where('ID_USER', $idUser);
        if(preg_match($regEx_pass, $pass1) && preg_match($regEx_pass, $pass2) && $pass1==$pass2 )
        {
            $this->db->set('PASSWORD', $pass1);
        }
        if(preg_match($regEx_email, $email) )
        {
            $this->db->set('EMAIL', $email);
        }
        if($wallet!='')
        {
            $this->db->set('WALLET', $wallet);
        }
        if($tipo!=null && $_FILES['image']['size']<1000000)
        {
            $imageName=$idUser.$tipo;
            $this->db->set('IMAGE', $imageName);
            copy($_FILES['image']['tmp_name'], "images/users"."/".$imageName);
        }
        $this->db->update('USERS');

		return true;
    }

    function addNewNFT($name, $contract, $description, $user)
    {
        $data = array( 
            'NAME_NFT'=> $name,
            'CONTRACT_ID' => $contract,
            'DESCRIPTION' => $description,
            'ID_USER' => $user
        );
        $this->db->insert('NFT', $data);
    }

    function invalidNFT($nftID)
    {
        $this->db->where('ID_NFT', $nftID);
        $this->db->set('VALID', '0');
        $this->db->update('NFT');
    }
    
    function checkNFTName($nftID)
    {
        $this->db->where('NAME_NFT', $nftID);
        $this->db->where('VALID', 1);
        $query=$this->db->get('NFT');
        if($query->result())
        {
            return false;
        }
        return true;
    }

    function addNewsubUser($name, $password, $mail, $wallet, $info, $user)
    {
        $data = array( 
            'NAME_SUBUSER'=> $name,
            'PASSWORD' => $password,
            'MAIL' => $mail,
            'WALLET' => $wallet,
            'INFO' => $info,
            'ID_USER' => $user
        );
        $data['PASSWORD']=password_hash($data['PASSWORD'], PASSWORD_DEFAULT);
            
        $this->db->insert('SUBUSERS', $data);
    }

    function invalidSubUser($subuserID)
    {
        $this->db->where('ID_SUBUSER', $subuserID);
        $this->db->set('VALID', '0');
        $this->db->update('SUBUSERS');
    }
    
    function resetSubUserPass($nftID)
    {
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomPass=substr(str_shuffle($permitted_chars), 0, 10);
        $pass=password_hash($randomPass, PASSWORD_DEFAULT);
        //$pass=$randomPass;

        $this->db->where('ID_SUBUSER', $nftID);
        $this->db->set('PASSWORD', $pass);
        $this->db->update('SUBUSERS');

        return $randomPass;
    }
    
    function checkSubUserName($subuserName)
    {
        $this->db->where('NAME_SUBUSER', $subuserName);
        $this->db->where('VALID', 1);
        $query=$this->db->get('SUBUSERS');
        if($query->result())
        {
            return false;
        }
        return true;
    }

    function loginSubuser($user, $pass)
    {
        $this->db->select('PASSWORD, ID_SUBUSER');
        $this->db->where('NAME_SUBUSER', $user);
        $this->db->where('VALID', 1);
        $query=$this->db->get('SUBUSERS');
        foreach($query->result() as $fila)
        { 
            //D38R0HnePS
            // if(strcmp('KYNBOoZz13', $pass)==0)
            //     return true;

            // echo'<script type="text/javascript">
            // alert("'.$pass.'\n'.$fila->PASSWORD.'");
            // </script>';
            // echo'<script type="text/javascript">
            // alert("'.(password_verify($pass, $fila->PASSWORD)).'");
            // </script>';
            // return true;
            if(password_verify($pass, $fila->PASSWORD))
                return $fila->ID_SUBUSER;
            else
                return false;
        }
        return false;
    }

    function getSubUser($id)
    {
        $this->db->select('ID_SUBUSER, NAME_SUBUSER, MAIL, IMAGE, WALLET, INFO, VERIFIED, VALID, ID_USER');
        $this->db->where('ID_SUBUSER', $id);
        $query=$this->db->get('SUBUSERS');
        foreach($query->result() as $fila)
        { 
            $subUserInfo['ID_SUBUSER']=$fila->ID_SUBUSER;
            $subUserInfo['NAME_SUBUSER']=$fila->NAME_SUBUSER;
            $subUserInfo['MAIL']=$fila->MAIL;
            $subUserInfo['IMAGE']=$fila->IMAGE;
            $subUserInfo['WALLET']=$fila->WALLET;
            $subUserInfo['INFO']=$fila->INFO;
            $subUserInfo['VERIFIED']=$fila->VERIFIED;
            $subUserInfo['VALID']=$fila->VALID;
            $subUserInfo['ID_USER']=$fila->ID_USER;
        }

        $this->db->select('USER');
        $this->db->where('ID_USER', $subUserInfo['ID_USER']);
        $this->db->where('VALID', 1);
        $aux=$this->db->get("USERS");
        foreach ($aux->result() as $grantBoss) 
        // if ($aux->result()) 
        {
            $subUserInfo['GRANT_BOSS']=$grantBoss->USER;
        }
        
        $subUserInfo['LOGS']=123;
        $subUserInfo['NFTs']=4;
        $subUserInfo['PERCENT']=45;
        return $subUserInfo;
    }
}
?>