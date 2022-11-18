<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>GestionNFT</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/manageLogs.css" />

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
        
      <?php echo form_open('Welcome/backUser', 'id="back"'); ?>
              <button type="submit" class="back"><i class="zmdi zmdi-long-arrow-left  zmdi-hc-5x"></i></button>
            <?php echo form_close(); ?>
        <?php
# Cuántos productos mostrar por página
$productosPorPagina = 20;
// Por defecto es la página 1; pero si está presente en la URL, tomamos esa
$pagina = 1;
if (isset($_GET["pagina"])) {
    $pagina = $_GET["pagina"];
}
# Necesitamos el conteo para saber cuántas páginas vamos a mostrar
$conteo = $LOGS_total;
# Para obtener las páginas dividimos el conteo entre los productos por página, y redondeamos hacia arriba
$paginas = ceil($conteo / $productosPorPagina);

$cont=1;
if(!isset($PAGE))
{
  $PAGE=1;
  $min=0;
}
else
{
  $min=(int)$PAGE*$productosPorPagina-$productosPorPagina;
}
$max=(int)$PAGE*$productosPorPagina;
$pagina=$PAGE;
$nextPag=(int)$PAGE+1;
$prevPag=(int)$PAGE-1;

?>

    <!-- <div class="col-xs-12"> -->
        <h1 class="principalTitle">Consultar Logs de los becarios</h1>
        <table class="table table-bordered principalTable">
            <thead>
            <tr>
                <th>Nº</th>
                <th>Nombre</th>
                <th>Juego</th>
                <th>Asunto</th>
                <th>Mensaje</th>
                <th>Cantidad</th>
                <th>Fecha</th>
                <th>Cancelar</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($LOGS->result() as $log) 
            { 
              if(isset($searchNumber))
              {
                if(!strcmp($searchNumber, $cont))
                {
                  echo "<tr>";
                    echo "<td>".$cont."</td>";
                    echo "<td>".$log->NAME_SUBUSER."</td>";
                    echo "<td>".$log->GAME."</td>";
                    echo "<td>".$log->SUBJECT."</td>";
                    echo "<td>".$log->MESSAGE."</td>";
                    echo "<td>".$log->AMOUNT."-";
                      if($log->TYPE==0) echo "Criptomonedas";
                      else if($log->TYPE==1) echo "NFTs";
                      else if($log->TYPE==2) echo "Otro";
                    echo "</td>";
                    echo "<td>".$log->DATE_LOG."</td>";
                    echo "<td>";
                      echo form_open('Welcome/invalidLog', 'id="invalidLog"');
                        echo "<input type='hidden' class='invalidLog' name='logID' id='logID' value='".$log->ID_SUBUSERLOGS."' />";
                        echo "<button type='submit' class='invalidLog'> Dar de baja </button>";
                      echo form_close(); 
                    echo "</td>";
                  echo "</tr>";
                }
              }
              else if(isset($searchName))
              {
                if(!strcmp(strtolower($searchName), strtolower($nft->NAME_NFT)))
                {
                  echo "<tr>";
                    echo "<td>".$cont."</td>";
                    echo "<td>".$log->NAME_SUBUSER."</td>";
                    echo "<td>".$log->GAME."</td>";
                    echo "<td>".$log->SUBJECT."</td>";
                    echo "<td>".$log->MESSAGE."</td>";
                    echo "<td>".$log->AMOUNT."-";
                      if($log->TYPE==0) echo "Criptomonedas";
                      else if($log->TYPE==1) echo "NFTs";
                      else if($log->TYPE==2) echo "Otro";
                    echo "</td>";
                    echo "<td>".$log->DATE_LOG."</td>";
                    echo "<td>";
                      echo form_open('Welcome/invalidLog', 'id="invalidLog"');
                        echo "<input type='hidden' class='invalidLog' name='logID' id='logID' value='".$log->ID_SUBUSERLOGS."' />";
                        echo "<button type='submit' class='invalidLog'> Dar de baja </button>";
                      echo form_close(); 
                    echo "</td>";
                  echo "</tr>";
                }
              }
              else if(isset($searchGame))
              {
                if(!strcmp($searchGame, $nft->CONTRACT_ID))
                {
                  echo "<tr>";
                    echo "<td>".$cont."</td>";
                    echo "<td>".$log->NAME_SUBUSER."</td>";
                    echo "<td>".$log->GAME."</td>";
                    echo "<td>".$log->SUBJECT."</td>";
                    echo "<td>".$log->MESSAGE."</td>";
                    echo "<td>".$log->AMOUNT."-";
                      if($log->TYPE==0) echo "Criptomonedas";
                      else if($log->TYPE==1) echo "NFTs";
                      else if($log->TYPE==2) echo "Otro";
                    echo "</td>";
                    echo "<td>".$log->DATE_LOG."</td>";
                    echo "<td>";
                      echo form_open('Welcome/invalidLog', 'id="invalidLog"');
                        echo "<input type='hidden' class='invalidLog' name='logID' id='logID' value='".$log->ID_SUBUSERLOGS."' />";
                        echo "<button type='submit' class='invalidLog'> Dar de baja </button>";
                      echo form_close(); 
                    echo "</td>";
                  echo "</tr>";
                }
              }
              else if($cont>$min && $cont<=$max)
              {
                echo "<tr>";
                  echo "<td>".$cont."</td>";
                  echo "<td>".$log->NAME_SUBUSER."</td>";
                  echo "<td>".$log->GAME."</td>";
                  echo "<td>".$log->SUBJECT."</td>";
                  echo "<td>".$log->MESSAGE."</td>";
                  echo "<td>".$log->AMOUNT."-";
                    if($log->TYPE==0) echo "Criptomonedas";
                    else if($log->TYPE==1) echo "NFTs";
                    else if($log->TYPE==2) echo "Otro";
                  echo "</td>";
                  echo "<td>".$log->DATE_LOG."</td>";
                  echo "<td>";
                    echo form_open('Welcome/invalidLog', 'id="invalidLog"');
                      echo "<input type='hidden' class='invalidLog' name='logID' id='logID' value='".$log->ID_SUBUSERLOGS."' />";
                      echo "<button type='submit' class='invalidLog'> Dar de baja </button>";
                    echo form_close(); 
                  echo "</td>";
                echo "</tr>";
              }
              $cont++; 
            } 
          ?>
            </tbody>
        </table>
        <?php 
          if(!isset($searchNumber) && !isset($searchName) && !isset($searchGame)) 
          {
        ?> 
        <nav>
            <div class="row pagInfo">
                <div class="col-xs-12 col-sm-6">

                    <p>Mostrando <?php echo $productosPorPagina ?> de <?php echo $conteo ?> productos disponibles, &nbsp</p>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
                </div>
            </div>
            <table class="pagination">
            <tr>
                <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
                <?php if ($pagina > 1) { ?>
                    <td>
                        <?php echo form_open('Welcome/changeLogsPage', 'id="changeLogsPage"'); ?>
                          <input type='hidden' class='changeLogsPage' name='newPag' id='newPag' value='<?= $prevPag ?>' />
                          <button type="submit" class="changeLogsPage"> &laquo; </button>
                        <?php echo form_close(); ?>
                    </td>
                <?php } ?>

                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                    <td class="<?php if ($x == $pagina) echo "active" ?>">
                        <?php echo form_open('Welcome/changeLogsPage', 'id="changeLogsPage"'); ?>
                          <input type='hidden' class='changeLogsPage' name='newPag' id='newPag' value='<?= $x ?>' />
                          <button type="submit" class="changeLogsPage"> <?= $x ?> </button>
                        <?php echo form_close(); ?>
                    </td>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                    <td>
                        <?php echo form_open('Welcome/changeLogsPage', 'id="changeLogsPage"'); ?>
                          <input type='hidden' class='changeLogsPage' name='newPag' id='newPag' value='<?= $nextPag ?>' />
                          <button type="submit" class="changeLogsPage"> &raquo; </button>
                        <?php echo form_close(); ?>
                    </td>
                <?php } ?>
            </tr>
            </table>
        </nav>
        <?php 
          }
        ?> 
    <!-- </div> -->
    
              <!-- ////////////////////////////////////////////////////////////////////////////////// -->
            <hr>
            <h1 class="secondaryTitle">Buscar logs</h1>
        

            <div class="content">
            
        <table class="table table-bordered otherTable">
            <thead>
            <tr>
                <th colspan="4" class="titleTable">Buscar log</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                  <th>Numero</th>
                  <th>Nombre</th>
                  <th>Contrato</th>
                  <th></th>
              </tr>
                <tr>
                  <?php echo form_open('Welcome/searchLog', 'id="searchLog"'); ?>
                    <td>
                        <input type="text" class="searchLog" name="number" id="number">
                    </td>
                    <td>
                        <input type="text" class="searchLog" name="name" id="name">
                    </td>
                    <td>
                        <input type="text" class="searchLog" name="game" id="game">
                    </td>
                    <td>
                        <button type="submit" class="searchLog"> Buscar </button>
                    </td>
                  <?php echo form_close(); ?>
                </tr>
            </tbody>
        </table>
        <br>
        
          </div>

      </div>
    </main>

    <footer class="footer">
      <p><span class="footer__copyright">&copy;</span> 2022</p>
      <p>Hecho por <a href="https://es.linkedin.com/in/carlos-llorente-llorente-43869a147" target="_blank" class="footer__signature">Carlos Ll.</a></p>
    </footer>
  </div>

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


  <!-- partial -->
  <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
  <script src="<?php echo base_url(); ?>js/manageLogs.js"></script>

</body>

</html>