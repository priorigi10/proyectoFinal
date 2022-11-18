<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Inicio</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/plantilla.css" />
 
</head>
<body>
<div class="grid">
  <header class="header">
    <i class="fas fa-bars header__menu"></i>
    <div class="header__text">
      <i class="zmdi zmdi-balance-wallet zmdi-hc-2x"></i>
      <span class=walletText>Wallet: <?=$WALLET?></span>
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
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-briefcase-medical"></i></span>
            <span class="navList__subheading-title">Gestionar NFTs</span>
          </div>
        </li>

        <li class="navList__heading">Becarios</li>
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-envelope"></i></span>
            <span class="navList__subheading-title">Gestionar becados</span>
          </div>
        </li>

        <li class="navList__heading">Becas</li>
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-mountain"></i></span>
            <span class="navList__subheading-title">Gestionar becas</span>
          </div>
        </li>

        <li class="navList__heading">Estadisticas</li>
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-credit-card"></i></span>
            <span class="navList__subheading-title">finances</span>
          </div>
          <!-- <ul class="subList subList--hidden">
            <li class="subList__item">mortgage</li>
            <li class="subList__item">investments</li>
            <li class="subList__item">spend log</li>
            <li class="subList__item">owed</li>
          </ul> -->
        </li>
        
      </ul>
    </div>
  </aside>

  <main class="main">
      <div class="container">
        <h1  class="principalTitle">Gestionar NFT's</h1>
        <hr>
        <div class="row">
          <!-- edit form column -->
          <div class="col-md-8 personal-info">
            <?php echo form_open('Welcome/backUser', 'id="back"'); ?>
              <button type="submit" class="back"><i class="zmdi zmdi-long-arrow-left  zmdi-hc-5x"></i></button>
            <?php echo form_close(); ?>

            <div class="content">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet sollicitudin dui, ac vulputate lacus sollicitudin vitae. Pellentesque mauris nibh, lacinia eu posuere eget, malesuada quis diam. Nam gravida ligula id placerat vehicula. Nam vulputate dolor velit, quis auctor tellus commodo sed. In tempus erat eget risus posuere, non elementum justo varius. Phasellus ultrices vehicula neque sed porta. Etiam tincidunt erat nec enim facilisis, vel condimentum metus placerat. Aliquam erat volutpat. Proin tempus nulla erat. Proin condimentum, leo a vestibulum dictum, nisi diam fringilla orci, vitae pellentesque lorem nisi ut nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus.
            </p>
          </div>

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
<script src="<?php echo base_url(); ?>js/plantilla.js"></script>

</body>
</html>