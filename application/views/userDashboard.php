<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Inicio</title>
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/main.css"> -->
    <!-- <link rel="shortcut icon" type="image/png" href="#"><link rel="stylesheet" href="./style.css"> -->
  <!-- <link rel="stylesheet" href="https://s3.amazonaws.com/codecademy-content/projects/bootstrap.min.css"> -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/userDashboard.css" />
 
</head>
<body>
<!-- partial:index.partial.html -->
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
      <img src="<?php echo base_url(); ?>images/pagina/logo.png" width="30"/>
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
    <div class="main-header">
      <div class="main-header__intro-wrapper">
        <div class="main-header__welcome">
          <div class="main-header__welcome-title text-light">Bienvenido, <strong><?=$USER?></strong></div>
          <div class="main-header__welcome-subtitle text-light">¿Como van tus becas?</div>
        </div>
        <div class="quickview">
          <div class="quickview__item">
            <div class="quickview__item-total"><?=$NFTs_total?></div>
            <div class="quickview__item-description">
              <i class="zmdi zmdi-memory"></i>
              <span class="text-light">NFT</span>
            </div>
          </div>
          <div class="quickview__item">
            <div class="quickview__item-total"><?=$subusers_total?></div>
            <div class="quickview__item-description">
              <i class="zmdi zmdi-account"></i>
              <span class="text-light">Usuarios</span>
            </div>
          </div>
          <div class="quickview__item">
            <div class="quickview__item-total"><?=$grants_total?></div>
            <div class="quickview__item-description">
              <i class="zmdi zmdi-balance"></i>
              <span class="text-light">Becas</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main__cards">
      <div class="card">
        <div class="card__header">
          <div class="card__header-title text-light"> <strong>Ultimos movimientos</strong>
          </div>
        </div>
        <div class="card__main">
          <?php 
          
          $logCount=0;
          foreach ($LOGS->result() as $log) 
          {
            if($logCount==5)
              break;
            echo "<div class='card__row'>";
              echo "<div class='card__icon'><i class='zmdi zmdi-pin-account'></i></div>";
              echo "<div class='card__time'>";
                echo "<div>".$log->DATE_LOG."</div>";
              echo "</div>";
              echo "<div class='card__detail'>";
                echo "<div class='card__source text-bold'>".$log->NAME_SUBUSER."</div>";
                echo "<div class='card__description'>".$log->SUBJECT." (".$log->GAME.")</div>";
                echo "<div class='card__note'>".$log->MESSAGE."</div>";
                echo "<div class='card__amount'>".$log->AMOUNT."-";
                if($log->TYPE==0) echo "Criptomonedas";
                else if($log->TYPE==1) echo "NFTs";
                else if($log->TYPE==2) echo "Otro";
                echo "</div>";
              echo "</div>";
            echo "</div>";
            $logCount++;
            }
          ?>
          
        </div>
      </div>
      <!-- <div class="card">
        <div class="card__header">
          <div class="card__header-title text-light">Ultimos <strong>documentos</strong>
          </div>
        </div>
        <div class="card">
          <div class="documents">
            <?php 
              for($i=0;$i<5;$i++)
              {
                echo "<div class='document'>";
                  echo "<div class='document__img'></div>";
                  echo "<div class='document__title'>Nombre</div>";
                  echo "<div class='document__date'>Fecha</div>";
                echo "</div>";
              }
            ?>
          </div>
        </div>
      </div> -->
      <div class="card card--finance">
        <div class="card__header">
          <div class="card__header-title text-light"><strong>Ganancias generales</strong>
          </div>
        </div>
        <div id="chartdiv"></div>
      </div>
    </div> <!-- /.main-cards -->
    <?php 
    if ($SUPER)
    {
    ?>
      <p>Base de datos: <a href="https://my.ionos.es/webhosting/5e867936-f0c0-441f-8089-ab9a637eb291/databases/2de92b28-7491-4257-9508-4c89598be1d5/open">DATABASE</a> </p>
      <p>Proyecto de GitHub: <a href="https://github.com/priorigi10/proyectoFinal">GitHub</a> </p>
    <?php 
      } 
    ?>
  </main>

  <footer class="footer">
    <p><span class="footer__copyright">&copy;</span> 2022</p>
    <p>Hecho por <a href="https://es.linkedin.com/in/carlos-llorente-llorente-43869a147" target="_blank" class="footer__signature">Carlos Ll.</a></p>
  </footer>
</div>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
<script src='https://www.amcharts.com/lib/3/amcharts.js'></script>
<script src='https://www.amcharts.com/lib/3/serial.js'></script>
<script src='https://www.amcharts.com/lib/3/themes/light.js'></script>
<script src="<?php echo base_url(); ?>js/userDashboard.js"></script>
<?php
  echo "
  <script> 
    let amount = [];
    let month = [];";
    
    forEach($GRAPH->result() as $graph)
    {
      echo "amount.push('".$graph->TOTAL."');";
      // echo "alert('".substr($graph->DATE_LOG, 5, 2)."*');";
      echo "month.push('".substr($graph->DATE_LOG, 5, 2)."');";
    }
    echo "
    renderChart(amount, month);
  </script>";


  
  // let amount = [];
  // let month = [];
  // graph.forEach(element => {
  //     amount.push(element[TOTAL]);
  //     month.push(element[DATE_LOG].toLocaleString('default', { month: 'long' }));
  // });
?>
</body>
</html>