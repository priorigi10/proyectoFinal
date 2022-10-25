<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	//contructor
	function __construct()
	{
		parent::__construct();
		$this->load->helper("funciones");
		$this->load->model('Modelo1');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->load->library('encryption');
	}
 
	public function index()
	{
		$matriz[0]=0;
		$this->session->info=0;
		$this->load->view('Inicio', $matriz);
		// $this->load->view('Register', $matriz);
	}

	public function inicioError($code)
	{
		switch($code)
		{
			case 0:
				$matriz['errorMsg']="Cuenta registrada con exito.";
				$matriz['msgColor']="GREEN";
			break;
			case 1:
				$matriz['errorMsg']="Ha habido algun problema creando la cuenta, vuelve a intentarlo.";
				$matriz['msgColor']="RED";
			break;
			case 2:
				$matriz['errorMsg']="Usuario o contraseña no valida.";
				$matriz['msgColor']="RED";
			break;
			case 3:
				$matriz['errorMsg']="False";
				$matriz['msgColor']="BLUE";
			break;
		}
		$matriz[0]=0;
		$this->load->view('startError', $matriz);
		// $this->load->view('Register', $matriz);
	}

	public function register()
	{
		$matriz['users']=$this->Modelo1->getUserNames();
		$this->load->view('Register', $matriz);
	}

	public function createUser()
	{
		$user =strtolower($this->input->post('user'));
		$pass1 =$this->input->post('pass1');
		$pass2 =$this->input->post('pass2');
		$email =strtolower($this->input->post('email'));
		$wallet = $this->input->post('wallet');
		
		if($this->Modelo1->createUser($user, $pass1, $pass2, $email, $wallet))
		{
			$this->inicioError(0);
		}
		else
		{
			$this->inicioError(1);
		}
	}

	public function getInfo($user)
	{
		$info=$this->Modelo1->getUserInfo($user);
		$this->session->info=$info;
		return $info;
	}

	public function loginUser()
	{
		$user =strtolower($this->input->post('user'));
		$pass =$this->input->post('pass');
		if($this->Modelo1->loginUser($user, $pass))
		{
			$info=$this->getInfo($user);
			// $this->session->set($info);
			// $this->load->view('userDashboardEdit', $info);
			$this->load->view('userDashboard', $info);
		}
		else{
			$this->inicioError(2);
		}
	}
	
	public function loginUserEdit()
	{
		$info=$this->session->info;
		$this->load->view('userDashboardEdit', $info);
	}
	
	public function logOutUser()
	{
		$matriz[0]=0;
		$this->session->info=0;
		$this->load->view('Inicio', $matriz);
	}
	
	public function backUser()
	{
		$info=$this->session->info;
		$info=$this->getInfo($info['USER']);
		$this->load->view('userDashboard', $info);
	}
	
	public function modifyUser()
	{
		$pass1 =$this->input->post('pass1');
		$pass2 =$this->input->post('pass2');
		$email =strtolower($this->input->post('email'));
		$wallet = $this->input->post('wallet');
		$idUser = $this->input->post('id');
		$user=$this->input->post('user');

		$this->Modelo1->modifyUser($pass1, $pass2, $email, $wallet, $idUser);
		
		$info=$this->Modelo1->getUserInfo($user);
		$this->session->info=$info;
		$this->load->view('userDashboard', $info);
	}

	public function userRanks()
	{
		$info=$this->session->info;
		$this->load->view('userRanks', $info);
	}

	public function plantilla()
	{
		$info=$this->session->info;
		$this->load->view('plantilla', $info);
	}

	public function manageNFT()
	{
		$info=$this->session->info;
		$info=$this->Modelo1->getUserInfo($info["USER"]);
		$this->load->view('manageNFT', $info);
	}

	public function addNewNFT()
	{
		$info=$this->session->info;
		$name=$this->input->post('name');
		$contract=$this->input->post('contract');
		$description=$this->input->post('description');

		
		if($this->Modelo1->checkNFTName($name))
		{
			$this->Modelo1->addNewNFT($name, $contract, $description, $info["ID_USER"]);
			$info=$this->session->info;
			$info=$this->Modelo1->getUserInfo($info["USER"]);
			$info['errorMsg']="NFT añadido con exito.";
			$info['msgColor']="GREEN";
		}
		else
		{
			$info=$this->session->info;
			$info=$this->Modelo1->getUserInfo($info["USER"]);
			$info['errorMsg']="Error: Nombre de NFT ya en uso.";
			$info['msgColor']="RED";
		}
		
		$this->load->view('manageNFT', $info);
	}

	public function invalidNFT()
	{
		$nftID=$this->input->post('nftID');

		$this->Modelo1->invalidNFT($nftID);

		$info=$this->session->info;
		$info=$this->Modelo1->getUserInfo($info["USER"]);
		$info['errorMsg']="NFT eliminado.";
		$info['msgColor']="RED";
		$this->load->view('manageNFT', $info);
	}

	public function changeNFTpage()
	{
		$info=$this->session->info;
		$info=$this->Modelo1->getUserInfo($info["USER"]);
		$info['PAGE']=$this->input->post('newPag');
		$this->load->view('manageNFT', $info);
	}

	public function searchNFT()
	{
		$info=$this->session->info;
		$info=$this->Modelo1->getUserInfo($info["USER"]);
		if($this->input->post('number')!=null)
			$info['searchNumber']=$this->input->post('number');
		if($this->input->post('name')!=null)
			$info['searchName']=$this->input->post('name');
		if($this->input->post('contract')!=null)
			$info['searchContract']=$this->input->post('contract');
		$this->load->view('manageNFT', $info);
	}

	public function manageSubUsers()
	{
		$info=$this->session->info;
		$info=$this->Modelo1->getUserInfo($info["USER"]);
		$this->load->view('manageSubUsers', $info);
	}


	public function addNewSubuser()
	{
		$info=$this->session->info;
		$name=strtolower($this->input->post('name'));
		$password=$this->input->post('password');
		$mail=$this->input->post('mail');
		$wallet=$this->input->post('wallet');
		$infoExtra=$this->input->post('info');

		if($this->Modelo1->checkSubUserName($name))
		{
			$this->Modelo1->addNewsubUser($name, $password, $mail, $wallet, $infoExtra,  $info["ID_USER"]);
			$info=$this->getInfo($info['USER']);
			$info=$this->Modelo1->getUserInfo($info["USER"]);
			$info['errorMsg']="Becario añadido con exito.";
			$info['msgColor']="GREEN";
		}
		else{
			$info=$this->getInfo($info['USER']);
			$info=$this->Modelo1->getUserInfo($info["USER"]);
			$info['errorMsg']="Error: Nombre de becario ya en uso.";
			$info['msgColor']="RED";
		}

		$this->load->view('manageSubUsers', $info);
	}

	public function invalidSubuser()
	{
		$nftSubuser=$this->input->post('nftSubuser');
		$info=$this->session->info;

		$this->Modelo1->invalidSubUser($nftSubuser);

		$info=$this->getInfo($info['USER']);
		$info=$this->Modelo1->getUserInfo($info["USER"]);
		$info['errorMsg']="Becado eliminado.";
		$info['msgColor']="BLUE";
		$this->load->view('manageSubUsers', $info);
	}

	public function changeSubuserpage()
	{
		$info=$this->session->info;
		$info=$this->Modelo1->getUserInfo($info["USER"]);
		$info['PAGE']=$this->input->post('newPag');
		$this->load->view('manageSubUsers', $info);
	}

	public function searchSubuser()
	{
		$info=$this->session->info;
		$info=$this->Modelo1->getUserInfo($info["USER"]);
		if($this->input->post('number')!=null)
			$info['searchNumber']=$this->input->post('number');
		if($this->input->post('name')!=null)
			$info['searchName']=$this->input->post('name');
		if($this->input->post('mail')!=null)
			$info['searchMail']=$this->input->post('mail');
		$this->load->view('manageSubUsers', $info);
	}

	public function resetSubUserPass()
	{
		$info=$this->session->info;
		$nftSubuser=$this->input->post('nftSubuser');

		
		$newPass=$this->Modelo1->resetSubUserPass($nftSubuser);

		$info=$this->Modelo1->getUserInfo($info["USER"]);
		$info['PAGE']=$this->input->post('newPag');
		$info['errorMsg']="La nueva contraseña es: ".$newPass;
		$this->load->view('manageSubUsers', $info);
	}

	public function newGrant()
	{
		$info=$this->session->info;
		$info=$this->Modelo1->getUserInfo($info["USER"]);
		$this->load->view('newGrant', $info);
	}

	public function createGrant()
	{
		$info=$this->session->info;
		$subuser=$this->input->post('subuser');
		$percent=$this->input->post('percent');
		$review=$this->input->post('review');
		$nftSubuser=$this->input->post('nftSubuser');
		$nftSubuser=$this->input->post('nftSubuser');
	}

	public function loginSubuser()
	{
		$user =strtolower($this->input->post('user'));
		$pass =$this->input->post('pass');
		$id=$this->Modelo1->loginSubuser($user, $pass);
		if($id)
		{
			$subUserInfo=$this->Modelo1->getSubUser($id);
			$this->load->view('subuserDashboard', $subUserInfo);
		}
		else
		{
			$this->inicioError(2);
		}
	}
	
	public function logOutSubUser()
	{
		$matriz[0]=0;
		$this->session->info=0;
		$this->load->view('Inicio', $matriz);
	}
}
