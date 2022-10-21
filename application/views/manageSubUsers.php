<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>GestionNFT</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/manageSubUsers.css" />

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
        <?php
# Cuántos productos mostrar por página
$productosPorPagina = 10;
// Por defecto es la página 1; pero si está presente en la URL, tomamos esa
$pagina = 1;
if (isset($_GET["pagina"])) {
    $pagina = $_GET["pagina"];
}
# Necesitamos el conteo para saber cuántas páginas vamos a mostrar
$conteo = $subusers_total;
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
  $min=(int)$PAGE*10-10;
}
$max=(int)$PAGE*10;
$pagina=$PAGE;
$nextPag=(int)$PAGE+1;
$prevPag=(int)$PAGE-1;


?>

    <div class="col-xs-12">
        <h1 class="principalTitle">Mis becarios<?= $PAGE ?></h1>
        <table class="table table-bordered principalTable">
            <thead>
            <tr>
                <th>Nº</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Wallet</th>
                <th>Info</th>
                <th>Verificado</th>
                <th>En beca</th>
                <th>Baja</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($SUBUSERS->result() as $subuser) 
            { 
              if(isset($searchNumber))
              {
                if(!strcmp($searchNumber, $cont))
                {
                  echo "<tr>";
                    echo "<td>".$cont."</td>";
                    echo "<td>".$subuser->NAME_SUBUSER."</td>";
                    echo "<td>".$subuser->MAIL."</td>";
                    echo "<td>".$subuser->WALLET."</td>";
                    echo "<td>".$subuser->INFO."</td>";
                    echo "<td>";
                    if($subuser->VERIFIED==0)
                      echo "<img src=".base_url()."images/pagina/false.png width='30' height='30'>";
                    else
                      echo "<img src=".base_url()."images/pagina/true.png width='30' height='30'>";
                    echo "</td>";
                    echo "<td>";
                    if(1==1)
                      echo "<img src=".base_url()."images/pagina/false.png width='30' height='30'>";
                    else
                      echo "<img src=".base_url()."images/pagina/true.png width='30' height='30'>";
                    echo "</td>";
                    echo "<td>";
                      echo form_open('Welcome/invalidSubuser', 'id="invalidSubuser"');
                        echo "<input type='hidden' class='invalidSubuser' name='nftSubuser' id='nftSubuser' value='".$subuser->ID_SUBUSER."' />";
                        echo "<button type='submit' class='invalidSubuser'> Dar de baja </button>";
                      echo form_close(); 
                      echo form_open('Welcome/resetSubUserPass', 'id="resetSubUserPass"');
                        echo "<input type='hidden' class='resetSubUserPass' name='nftSubuser' id='nftSubuser' value='".$subuser->ID_SUBUSER."' />";
                        echo "<button type='submit' class='resetSubUserPass'> Resetear </button>";
                      echo form_close(); 
                    echo "</td>";
                  echo "</tr>";
                }
              }
              else if(isset($searchName))
              {
                if(!strcmp(strtolower($searchName), strtolower($subuser->NAME_SUBUSER)))
                {
                  
                  echo "<tr>";
                    echo "<td>".$cont."</td>";
                    echo "<td>".$subuser->NAME_SUBUSER."</td>";
                    echo "<td>".$subuser->MAIL."</td>";
                    echo "<td>".$subuser->WALLET."</td>";
                    echo "<td>".$subuser->INFO."</td>";
                    echo "<td>";
                    if($subuser->VERIFIED==0)
                      echo "<img src=".base_url()."images/pagina/false.png width='30' height='30'>";
                    else
                      echo "<img src=".base_url()."images/pagina/true.png width='30' height='30'>";
                    echo "</td>";
                    echo "<td>";
                    if(1==1)
                      echo "<img src=".base_url()."images/pagina/false.png width='30' height='30'>";
                    else
                      echo "<img src=".base_url()."images/pagina/true.png width='30' height='30'>";
                    echo "</td>";
                    echo "<td>";
                      echo form_open('Welcome/invalidSubuser', 'id="invalidSubuser"');
                        echo "<input type='hidden' class='invalidSubuser' name='nftSubuser' id='nftSubuser' value='".$subuser->ID_SUBUSER."' />";
                        echo "<button type='submit' class='invalidSubuser'> Dar de baja </button>";
                      echo form_close(); 
                      echo form_open('Welcome/resetSubUserPass', 'id="resetSubUserPass"');
                        echo "<input type='hidden' class='resetSubUserPass' name='nftSubuser' id='nftSubuser' value='".$subuser->ID_SUBUSER."' />";
                        echo "<button type='submit' class='resetSubUserPass'> Resetear </button>";
                      echo form_close(); 
                    echo "</td>";
                  echo "</tr>";
                }
              }
              else if(isset($searchMail))
              {
                if(!strcmp($searchMail, $subuser->MAIL))
                {
                  
                  echo "<tr>";
                    echo "<td>".$cont."</td>";
                    echo "<td>".$subuser->NAME_SUBUSER."</td>";
                    echo "<td>".$subuser->MAIL."</td>";
                    echo "<td>".$subuser->WALLET."</td>";
                    echo "<td>".$subuser->INFO."</td>";
                    echo "<td>";
                    if($subuser->VERIFIED==0)
                      echo "<img src=".base_url()."images/pagina/false.png width='30' height='30'>";
                    else
                      echo "<img src=".base_url()."images/pagina/true.png width='30' height='30'>";
                    echo "</td>";
                    echo "<td>";
                    if(1==1)
                      echo "<img src=".base_url()."images/pagina/false.png width='30' height='30'>";
                    else
                      echo "<img src=".base_url()."images/pagina/true.png width='30' height='30'>";
                    echo "</td>";
                    echo "<td>";
                      echo form_open('Welcome/invalidSubuser', 'id="invalidSubuser"');
                        echo "<input type='hidden' class='invalidSubuser' name='nftSubuser' id='nftSubuser' value='".$subuser->ID_SUBUSER."' />";
                        echo "<button type='submit' class='invalidSubuser'> Dar de baja </button>";
                      echo form_close(); 
                      echo form_open('Welcome/resetSubUserPass', 'id="resetSubUserPass"');
                        echo "<input type='hidden' class='resetSubUserPass' name='nftSubuser' id='nftSubuser' value='".$subuser->ID_SUBUSER."' />";
                        echo "<button type='submit' class='resetSubUserPass'> Resetear </button>";
                      echo form_close(); 
                    echo "</td>";
                  echo "</tr>";
                }
              }
              else if($cont>$min && $cont<=$max)
              {
                echo "<tr>";
                  echo "<td>".$cont."</td>";
                  echo "<td>".$subuser->NAME_SUBUSER."</td>";
                  echo "<td>".$subuser->MAIL."</td>";
                  echo "<td>".$subuser->WALLET."</td>";
                  echo "<td>".$subuser->INFO."</td>";
                  echo "<td>";
                  if($subuser->VERIFIED==0)
                    echo "<img src=".base_url()."images/pagina/false.png width='30' height='30'>";
                  else
                    echo "<img src=".base_url()."images/pagina/true.png width='30' height='30'>";
                  echo "</td>";
                  echo "<td>";
                  if(1==1)
                    echo "<img src=".base_url()."images/pagina/false.png width='30' height='30'>";
                  else
                    echo "<img src=".base_url()."images/pagina/true.png width='30' height='30'>";
                  echo "</td>";
                  echo "<td>";
                  echo form_open('Welcome/invalidSubuser', 'id="invalidSubuser"');
                    echo "<input type='hidden' class='invalidSubuser' name='nftSubuser' id='nftSubuser' value='".$subuser->ID_SUBUSER."' />";
                    echo "<button type='submit' class='invalidSubuser'> Dar de baja </button>";
                  echo form_close(); 
                  echo form_open('Welcome/resetSubUserPass', 'id="resetSubUserPass"');
                    echo "<input type='hidden' class='resetSubUserPass' name='nftSubuser' id='nftSubuser' value='".$subuser->ID_SUBUSER."' />";
                    echo "<input type='hidden' class='resetSubUserPass' name='newPag' id='newPag' value='".$PAGE."' />";
                    echo "<button type='submit' class='resetSubUserPass'> Resetear </button>";
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
          if(!isset($searchNumber) && !isset($searchName) && !isset($searchContract)) 
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
                        <?php echo form_open('Welcome/changeSubuserpage', 'id="changeSubuserpage"'); ?>
                          <input type='hidden' class='changeSubuserpage' name='newPag' id='newPag' value='<?= $prevPag ?>' />
                          <button type="submit" class="changeSubuserpage"> &laquo; </button>
                        <?php echo form_close(); ?>
                    </td>
                <?php } ?>

                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                    <td class="<?php if ($x == $pagina) echo "active" ?>">
                        <?php echo form_open('Welcome/changeSubuserpage', 'id="changeSubuserpage"'); ?>
                          <input type='hidden' class='changeSubuserpage' name='newPag' id='newPag' value='<?= $x ?>' />
                          <button type="submit" class="changeSubuserpage"> <?= $x ?> </button>
                        <?php echo form_close(); ?>
                    </td>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                    <td>
                        <?php echo form_open('Welcome/changeSubuserpage', 'id="changeSubuserpage"'); ?>
                          <input type='hidden' class='changeSubuserpage' name='newPag' id='newPag' value='<?= $nextPag ?>' />
                          <button type="submit" class="changeSubuserpage"> &raquo; </button>
                        <?php echo form_close(); ?>
                    </td>
                <?php } ?>
            </tr>
            </table>
        </nav>
        <?php 
          }
        ?> 
    </div>
    
              <!-- ////////////////////////////////////////////////////////////////////////////////// -->
            <hr>
            <h1 class="secondaryTitle">Gestionar Becados</h1>
        

            <div class="content">
            
        
        <table class="table table-bordered otherTable">
            <thead>
            <tr>
                <th colspan="6" class="titleTable">Nuevo Becado</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                  <th>Nombre</th>
                  <th>Contraseña</th>
                  <th>Email</th>
                  <th>Wallet</th>
                  <th>Info</th>
                  <th></th>
              </tr>
                <tr>
                  <?php echo form_open('Welcome/addNewSubuser', 'id="addNewSubuser"'); ?>
                    <td>
                        <input type="text" class="addNewSubuser" name="name" id="name">
                    </td>
                    <td>
                        <input type="text" class="addNewSubuser" name="password" id="password">
                    </td>
                    <td>
                        <input type="text" class="addNewSubuser" name="mail" id="contract">
                    </td>
                    <td>
                        <input type="text" class="addNewSubuser" name="wallet" id="contract">
                    </td>
                    <td>
                        <textarea class="addNewSubuser" name="info" id="info" rows="3" cols="21"> </textarea>
                    </td>
                    <td>
                        <button type="submit" class="addNewSubuser"> Añadir </button>
                    </td>
                  <?php echo form_close(); ?>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-bordered otherTable">
            <thead>
            <tr>
                <th colspan="5" class="titleTable">Buscar Becado</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                  <th>Numero</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th></th>
              </tr>
                <tr>
                  <?php echo form_open('Welcome/searchSubuser', 'id="searchSubuser"'); ?>
                    <td>
                        <input type="text" class="searchSubuser" name="number" id="number">
                    </td>
                    <td>
                        <input type="text" class="searchSubuser" name="name" id="name">
                    </td>
                    <td>
                        <input type="text" class="searchSubuser" name="mail" id="contract">
                    </td>
                    <td>
                        <button type="submit" class="searchSubuser"> Buscar </button>
                    </td>
                  <?php echo form_close(); ?>
                </tr>
            </tbody>
        </table>
              <!-- ////////////////////////////////////////////////////////////////////// -->
          </div>

          <!-- </div> -->
        <!-- </div> -->
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
  <script src="<?php echo base_url(); ?>js/manageSubUsers.js"></script>

</body>

</html>