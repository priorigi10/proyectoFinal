<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/subuserDashboard.css" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="content-profile-page">
        <div class="profile-user-page card">
            <div class="img-user-profile">
                <img class="profile-bgHome" src="<?= base_url() . 'images/pagina/dashboardBackgroundCard.jpg'; ?>" />
                <img class="avatar" src="<?= base_url() . 'images/users/rand/'.$IMAGE.'.png'; ?>" alt="Error al mostrar la imagen"/>
            </div>
            <button class="newLog">Crear Registro</button>
            <button class="disconect">Desconectar</button>
            <?php echo form_open('Welcome/newLogLogSubUser', 'id="newLogLogSubUser"'); ?>
                <input type='hidden' name='idSubUser' id='idSubUser' value='<?=$ID_SUBUSER?>' />
                <button class="newLog">Crear Registro</button>
            <?php echo form_close(); ?>
            <?php echo form_open( site_url(), 'id="atras"'); ?>
                <button type="submit" class="disconect">Desconectar</button>
            <?php echo form_close(); ?>
            <div class="user-profile-data">
                <h1><?=$NAME_SUBUSER?></h1>
                <p>Becado por: <?=$GRANT_BOSS?></p>
            </div>
            <ul class="data-user">
                <!-- <li><a><strong><?=$NFTsTotal?></strong><span>NFT´s</span></a></li> -->
                <li><a><strong><?=$logsTotal?></strong><span>Registros</span></a></li>
                <li>
                    <a>
                    <div ng-app="popUp" ng-controller="mainCtrl">
                        <button id="pop-up-btn" ng-click="openPopUp()"><strong><?=$NFTsTotal?></strong><span>NFT´s</span></button>
                        <div id="pop-up" <?php if($logsTotal==0) echo "class='cero'"; else if($logsTotal==1) echo "class='uno'"; else if($logsTotal==2) echo "class='dos'";else echo "class='tres'"; ?>>
                            <div class="content-wrap">
                                <div class='card'>
                                    <div class='slider'>
                                        <div class="icon-close" ng-click="closePopUp()"><h1>x</h1></div>
                                        <div class='content'>
                                            <?php
                                                foreach ($NFTs->result() as $nft) 
                                                {
                                                    echo "<div class='sliderItem'>
                                                        <div class='title'>".$nft->NAME_NFT."</div>
                                                        <div class='icon'>
                                                            
                                                        </div>
                                                        <div class='contentText'>
                                                            <h2>Descripcion:</h2>
                                                            <p>
                                                                ".$nft->DESCRIPTION."
                                                            </p>
                                                            <h2>Direccion de contrato:</h2>
                                                            <p>
                                                                ".$nft->CONTRACT_ID."
                                                            </p>
                                                        </div>
                                                    </div>";
                                                }
                                            ?>
                                        </div>
                                        <div class='buttons'>
                                            <div class='controls'>
                                                <a href="#" class='prevButton'><i class="zmdi zmdi-chevron-left"></i></a>
                                                <a href="#" class='nextButton'><i class="zmdi zmdi-chevron-right"></i></a>
                                                <a></a>
                                            </div>
                                            <div class='pagination'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="pop-up-bg"></div>
                    </div>
                    </a>
                </li>
                <li><a><strong><?=$PERCENT?>%</strong><span>Porcentaje</span></a></li>
            </ul>
            <div class=logCard>
            <?php
# Cuántos productos mostrar por página
$productosPorPagina = 3;
// Por defecto es la página 1; pero si está presente en la URL, tomamos esa
$pagina = 1;
if (isset($_GET["pagina"])) {
    $pagina = $_GET["pagina"];
}
# Necesitamos el conteo para saber cuántas páginas vamos a mostrar
$conteo = $logsTotal;
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
                    foreach ($LOGS->result() as $log) 
                    {
                        if($cont>$min && $cont<=$max)
                        {
                            echo "<div class='log'>
                                <div class='logTitle'><h2>".$log->GAME."</h2></div>
                                <div class='logIcon'>
                                    
                                </div>
                                <div class='logContent'>
                                <div class=logDate>".$log->DATE_LOG."</div>
                                    <dl>
                                        <dt><h3>Asunto:</h3></dt>
                                        <p>
                                            <dd>".$log->SUBJECT."</dd>
                                        </p>
                                        <dt><h3>Mensage:</h3></dt>
                                        <p>
                                            <dd>".$log->MESSAGE."</dd>
                                        </p>
                                    </dl>
                                </div>
                            </div>";
                        }
                        $cont++; 
                    }
                ?>
                <nav>
            <div class="row pagInfo">
                <div class="col-xs-12 col-sm-6">
                    <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
                </div>
            </div>
            <table class="pagination">
            <tr>
                <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
                <?php if ($pagina > 1) { ?>
                    <td>
                        <?php echo form_open('Welcome/changeSubuserLogPage', 'id="changeSubuserLogPage"'); ?>
                            <input type='hidden' class='changeSubuserLogPage' name='newPag' id='newPag' value='<?= $prevPag ?>' />
                            <input type='hidden' class='changeSubuserLogPage' name='idSubUser' id='idSubUser' value='<?= $ID_SUBUSER ?>' />
                            <button type="submit" class="changeSubuserLogPage"> &laquo; </button>
                        <?php echo form_close(); ?>
                    </td>
                <?php } ?>

                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                    <td class="<?php if ($x == $pagina) echo "active" ?>">
                        <?php echo form_open('Welcome/changeSubuserLogPage', 'id="changeSubuserLogPage"'); ?>
                            <input type='hidden' class='changeSubuserLogPage' name='newPag' id='newPag' value='<?= $x ?>' />
                            <input type='hidden' class='changeSubuserLogPage' name='idSubUser' id='idSubUser' value='<?= $ID_SUBUSER ?>' />
                            <button type="submit" class="changeSubuserLogPage"> <?= $x ?> </button>
                        <?php echo form_close(); ?>
                    </td>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                    <td>
                        <?php echo form_open('Welcome/changeSubuserLogPage', 'id="changeSubuserLogPage"'); ?>
                            <input type='hidden' class='changeSubuserLogPage' name='newPag' id='newPag' value='<?= $nextPag ?>' />
                            <input type='hidden' class='changeSubuserLogPage' name='idSubUser' id='idSubUser' value='<?= $ID_SUBUSER ?>' />
                            <button type="submit" class="changeSubuserLogPage"> &raquo; </button>
                        <?php echo form_close(); ?>
                    </td>
                <?php } ?>
            </tr>
            </table>
        </nav>
            </div>
        </div>
        
    </div>

    <footer>
        <h4>
            <p>
                Hecho por: <a href="https://es.linkedin.com/in/carlos-llorente-llorente-43869a147" target="_blank">Carlos Ll.</a>
            </p>
        </h4>
    </footer>

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

    <script src='//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js'></script>
    <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
    <script src="<?php echo base_url(); ?>js/subuserDashboard.js"></script>
</body>

</html>