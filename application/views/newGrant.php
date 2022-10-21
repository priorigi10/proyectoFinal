<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Inicio</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/newGrant.css" />

</head>

<body>
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
            <a href="<?php echo site_url(); ?>/welcome/loginUserEdit">
              <li class="dropdown__list-item">
                <span class="dropdown__icon"><i class="zmdi zmdi-assignment zmdi-hc-2x"></i></span>
                <span class="dropdown__title">Mi cuenta</span>
              </li>
            </a>
            <a href="<?php echo site_url(); ?>/welcome/userRanks">
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
        <div class="sidenav__profile-avatar" style="background-image: url('<?= base_url() . 'images/users/' . $IMAGE; ?>');"></div>
        <div class="sidenav__profile-title text-light"><?= $USER ?></div>
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
          </li>

        </ul>
      </div>
    </aside>

    <main class="main">
      <div class="container">
        <?php echo form_open('Welcome/backUser', 'id="back"'); ?>
          <button type="submit" class="back"><i class="zmdi zmdi-long-arrow-left  zmdi-hc-5x"></i></button>
        <?php echo form_close(); ?>
      <h1 class="principalTitle">Crear Becas</h1>
        <hr>
        <!-- <div class="row"> -->
        <!-- edit form column -->
        <!-- <div class="col-md-8 personal-info"> -->
        

        <!-- ////////////////////////////////////////////////////////////////////// -->
        <div class="content">


          <div class="drag-and-drop" x-data="{ adding: false, removing: false }">
            <div class="subcontiner1">
                <h3 class="drag-and-drop__title">NFT´s disponibles</h3>
              <div class="drag-and-drop__container drag-and-drop__container--from">
                <ul class="drag-and-drop__items" :class="{ 'drag-and-drop__items--removing': removing }" x-on:drop="removing = false" x-on:drop.prevent="
                const target = event.target.closest('ul');
                const element = document.getElementById(event.dataTransfer.getData('text/plain'));
                target.appendChild(element);
            " x-on:dragover.prevent="removing = true" x-on:dragleave.prevent="removing = false">
                  <!--items -->
                  <?php
                  $cont = 1;
                  foreach ($NFTs->result() as $nft) {
                    if($nft->ID_GRANT==NULL )
                    {
                    ?>

                      <li id="item-<?= $cont ?>" class="drag-and-drop__item" :class="{ 'drag-and-drop__item--dragging': dragging }" x-on:dragstart.self="
                      dragging = true;
                      event.dataTransfer.effectAllowed='move';
                      event.dataTransfer.setData('text/plain', event.target.id);
                  " x-on:dragend="dragging = false" x-data="{ dragging: false }" draggable="true">
                        <!-- nombre -->
                        <?= $nft->NAME_NFT ?>
                        <?= "<input type='hidden' class='grantNFT' name='".$cont."' id='".$cont."' value='".$nft->ID_NFT."' />"; ?>
                      </li>

                    <?php
                    $cont++;
                    }
                  }
                  ?>
                </ul>
              </div>
            </div>
            <div class="drag-and-drop__divider">⇄</div>
              <?php echo form_open('Welcome/createGrant', 'id="newGrant" class="newGrant"'); ?>
            <div class="subcontiner2">
                <h3 class="drag-and-drop__title">NFT´s en beca</h3>
              <div class="drag-and-drop__container drag-and-drop__container--to">
                <ul class="drag-and-drop__items" :class="{ 'drag-and-drop__items--adding': adding }" x-on:drop="adding = false" x-on:drop.prevent="
                  const target = event.target.closest('ul');
                  const element = document.getElementById(event.dataTransfer.getData('text/plain'));
                  target.appendChild(element);
              " x-on:dragover.prevent="adding = true" x-on:dragleave.prevent="adding = false">
                  <!-- loop through the already selected items -->
                </ul>
              </div>
            </div>
          </div>
          <div class="subcontiner3">
            <div class="left">
              <div class="option1">
                <p>
                  Selecciona a quien quieres conceder la beca: 
                </p>
                <select name="select">
                  <?php 
                    foreach ($SUBUSERS->result() as $subuser) 
                    { 
                      echo "<option id='subuser' name='subuser' value='".$subuser->ID_SUBUSER."'>".$subuser->NAME_SUBUSER."</option>";
                    }
                  ?>
                </select>
              </div>
              
              <div class="option2">
                <p>
                  Cual sera el porcentaje de beneficios que recibira el becado: 
                </p>
                  <input type="number" id="percent" name="percent" min="0" max="100">
              </div>
            </div>
            <div class="rigth">
              <div class="option3">
                <p>
                  Cada cuando se revisara la duracion de la beca: 
                </p>
                  <select name="review" id="review">
                    <option value='day'>Diariamente</option>
                    <option value='month'>Semanalmente</option>
                    <option value='year'>Anualmente</option>
                  </select>
              </div>
              <div class="send">
                <p>
                  <button type="submit" class="sendButton">Crear Beca</button>
                </p>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>

        <!-- ////////////////////////////////////////////////////////////////////// -->
        <!-- </div> -->
        <!-- </div> -->



        <?php
        if(isset($errorMsg))
        {
          if(isset($msgColor) & !strcmp($msgColor, "RED"))
            echo "<div class='banner-container red'>";
          else if(isset($msgColor) & !strcmp($msgColor, "GREEN"))
            echo "<div class='banner-container green '>";
          else
            echo "<div class='banner-container blue'>";

            echo "<div class='banner'>";
              echo "<h2>".$errorMsg."</h2>";
            echo "</div>";
          echo "</div>";
        }
    ?>

      </div>
    </main>

    <footer class="footer">
      <p><span class="footer__copyright">&copy;</span> 2022</p>
      <p>Hecho por <a href="https://es.linkedin.com/in/carlos-llorente-llorente-43869a147" target="_blank" class="footer__signature">Carlos Ll.</a></p>
    </footer>
  </div>
  <!-- partial -->
  <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
  <script src="<?php echo base_url(); ?>js/newGrant.js"></script>

</body>

</html>