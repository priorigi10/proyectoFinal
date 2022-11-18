<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Inicio</title>
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="css/main.css"> -->
  <!-- <link rel="shortcut icon" type="image/png" href="#"><link rel="stylesheet" href="./style.css"> -->
  <!-- <link rel="stylesheet" href="https://s3.amazonaws.com/codecademy-content/projects/bootstrap.min.css"> -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/userDashboardEdit.css" />

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="grid">
    <header class="header">
      <i class="fas fa-bars header__menu"></i>
      <div class="header__text">
        <i class="zmdi zmdi-balance-wallet zmdi-hc-2x"></i>
        <span class=walletText>Wallet: <?= $WALLET ?></span>
      </div>
      <div class="header__avatar" style="background-image: url('<?= base_url() . 'images/users/' . $IMAGE; ?>');">
        <div class="dropdown">
          <ul class="dropdown__list">
            <a href="<?php echo site_url();?>/welcome/loginUserEdit">
              <li class="dropdown__list-item">
                <span class="dropdown__icon"><i class="zmdi zmdi-assignment zmdi-hc-2x"></i></span>
                <span class="dropdown__title">Mi cuenta</span>
              </li>
            </a>
            <a href="<?php echo site_url();?>/welcome/userRanks">
              <li class="dropdown__list-item">
                <span class="dropdown__icon"><i class="zmdi zmdi-account-o zmdi-hc-2x"></i></span>
                <span class="dropdown__title">Nivel <?= $RANK ?></span>
              </li>
            </a>
            <a href="<?= site_url(); ?>">
              <li class="dropdown__list-item">
                <span class="dropdown__icon"><i class="zmdi zmdi-square-right zmdi-hc-2x"></i></span>
                <span class="dropdown__title">Desconectarse</span>
              </li>
            </a>
          </ul>
        </div>
      </div>
    </header>

    <aside class="sidenav">
    <div class="sidenav__brand">
      <i class="zmdi zmdi-memory zmdi-hc-2x"></i>
        <a class="sidenav__brand-link" href="<?php echo site_url(); ?>/welcome/backUser">NFT<span class="text-light">becas</span></a>
      <i class="fas fa-times sidenav__brand-close"></i>
    </div>
    <div class="sidenav__profile">
      <div class="sidenav__profile-avatar"  style="background-image: url('<?= base_url().'images/users/'.$IMAGE; ?>');"></div>
      <div class="sidenav__profile-title text-light"><?=$USER?></div>
    </div>
    <div class="row row--align-v-center row--align-h-center">
      <ul class="navList">
        <li class="navList__heading">NFTs</li>
        <li>
          <a href="<?php echo site_url(); ?>/welcome/manageNFT">
            <div class="navList__subheading row row--align-v-center">
              <span class="navList__subheading-icon"><i class="fas fa-briefcase-medical"></i></span>
              <span class="navList__subheading-title">Gestionar NFTs</span>
            </div>
          </a>
        </li>

        <li class="navList__heading">Becarios</li>
        <li>
          <a href="<?php echo site_url(); ?>/welcome/manageSubUsers">
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-envelope"></i></span>
            <span class="navList__subheading-title">Gestionar becados</span>
          </div>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>/welcome/manageLogs">
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-clipboard-list"></i></span>
            <span class="navList__subheading-title">Consultar logs</span>
          </div>
          </a>
        </li>

        <li class="navList__heading">Becas</li>
        <li>
          <a href="<?php echo site_url(); ?>/welcome/manageGrants">
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-mountain"></i></span>
            <span class="navList__subheading-title">Gestionar becas</span>
          </div>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>/welcome/newGrant">
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-mountain"></i></span>
            <span class="navList__subheading-title">Crear beca</span>
          </div>
          </a>
        </li>

        <li class="navList__heading">Estadisticas</li>
        <li>
          <a href="<?php echo site_url(); ?>/welcome/manageFinances">
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-credit-card"></i></span>
            <span class="navList__subheading-title">finances</span>
          </div>
          </a>
        </li>
        
      </ul>
    </div>
  </aside>

    <main class="main">
      <div class="container">
        <h1>Editar perfil</h1>
        <hr>
        <div class="row">
          <!-- edit form column -->
          <div class="col-md-8 personal-info">
            <?php echo form_open('Welcome/backUser', 'id="back"'); ?>
              <button type="submit" class="back"><i class="zmdi zmdi-long-arrow-left  zmdi-hc-5x"></i></button>
            <?php echo form_close(); ?>
            <?php echo form_open_multipart('Welcome/modifyUser', 'id="formulario"'); ?>
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
                <input type="email" class="form-control" name="email" id="email" value=<?=$EMAIL?> onkeyup='minus(this);'>
              </div>
              <div class="form-group">
                <label for="" class="wallet-label">Wallet<p class="optional">* Opcional</p></label>
                <p class="wallet-error"></p>
                <input type="wallet" class="form-control" name="wallet" id="wallet" value=<?=$WALLET?>>
              </div>
              <!-- <button class="btn" onclick="validation()">Crear cuenta</button> -->
              <!-- left column -->
              <div class="text-center">
                <img src=<?= base_url() . 'images/users/' . $IMAGE; ?> class="avatar img-circle" alt="avatar">
                <h6>sube una foto (.png / .jpeg / .gif) y de menos de 1Mb</h6>
                <?php 
                  $image=array('name'=>'image');
                  echo form_upload($image);
                ?>
              </div>
              <button type="submit" class="btn">Modificar cuenta</button>
              <?= form_hidden('id', $ID_USER);?>
              <?= form_hidden('user', $USER);?>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </main>

    <footer class="footer">
      <p><span class="footer__copyright">&copy;</span> 2022</p>
      <p>Hecho por <a href="https://es.linkedin.com/in/carlos-llorente-llorente-43869a147" target="_blank" class="footer__signature">Carlos Ll.</a></p>
    </footer>
  </div>
  <!-- partial -->
  <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
  <script src="<?php echo base_url(); ?>js/userDashboardEdit.js"></script>

</body>

</html>