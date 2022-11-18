<html>

<head>
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://s3.amazonaws.com/codecademy-content/projects/bootstrap.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/register.css" />
</head>

<body>
  <div class="header">
    <div class="container">
      <img src="<?php echo base_url(); ?>images/pagina/logo.png" width="50"/>
    </div>
  </div>

  <div class="main">
    <div class="container">
          <?php echo form_open('Welcome/inicioError', 'id="atras"'); ?>
            <button type="submit" class="back"><i class="zmdi zmdi-long-arrow-left  zmdi-hc-5x"></i></button>
          <?php echo form_close(); ?>
      <div class="row">
        <div class="col-md-7">
          <h1>Registrarse en BecasNFT</h1>
          <?php echo form_open('Welcome/createUser', 'id="formulario"'); ?>
            <div class="form-group">
              <label for="user">Usuario</label>
              <p class="user-error"></p>
              <div class="user_container">
                <span id="userValid"><i class="zmdi zmdi-check"></i></span>
                <span id="userInvalid"><i class="zmdi zmdi-close"></i></span>
                <input type="text" class="form-control" name="user" id="user" onkeyup="checkUser()">
              </div>
            </div>
            <div class="form-group">
              <label for="pass1">Contraseña <p class="optional">* La contraseña tiene que tener entre 8 y 16 caracteres y debe contener una mayúscula, una minúscula, un numero y un símbolo ($@$!%*?&).</p></label>
              <p class="pass1-error"></p>
              <div class="pass1_container">
                <span id="pass1_show"><i class="zmdi zmdi-eye" onclick="pass1ViewChange()"></i></span>
                <span id="pass1_hide"><i class="zmdi zmdi-eye-off" onclick="pass1ViewChange()"></i></span>
                <input type="password" class="form-control" name="pass1" id="pass1">
              </div>
              <!-- <input type="password" class="form-control" id="pass1"> -->
            </div>
            <div class="form-group">
              <label for="pass2">Repite la contraseña</label>
              <p class="pass2-error"></p>
              <div class="pass2_container">
                <span id="pass2_show"><i class="zmdi zmdi-eye" onclick="pass1ViewChange()"></i></span>
                <span id="pass2_hide"><i class="zmdi zmdi-eye-off" onclick="pass1ViewChange()"></i></span>
                <input type="password" class="form-control" name="pass2" id="pass2">
              </div>
              <!-- <input type="password" class="form-control" id="pass2"> -->
            </div>
            <div class="form-group">
              <label for="" class="email-label">Email</label>
              <p class="email-error"></p>
              <input type="email" class="form-control" name="email" id="email" onkeyup='minus(this);'>
            </div>
            <div class="form-group">
              <label for="" class="wallet-label">Wallet<p class="optional">* Opcional</p></label>
              <p class="wallet"></p>
              <input type="wallet" class="form-control" name="wallet" id="wallet">
            </div>
            <button type="submit" class="btn">Crear cuenta</button>
            <!-- <button class="btn" onclick="validation()">Crear cuenta</button> -->
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>


  <!-- ////////////////////////////////////////////Scripts///////////////////////////////////////////////////////////////////////////////////////// -->

  <script src="https://s3.amazonaws.com/codecademy-content/projects/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>js/register.js"></script>
  <?php 
    echo "<script> users=[];";
    forEach($users as $i=>$j){;
      echo "users.push('".$j."');";
    }
    echo "</script>";
  ?>
</body>

</html>