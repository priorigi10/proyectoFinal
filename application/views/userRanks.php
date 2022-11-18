<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/userRanks.css" />

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
                        <a href="<?php echo site_url(); ?>/welcome/loginUserEdit">
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
                <div class="wrapper">
                    <!-- PRICING-TABLE CONTAINER -->
                    <div class="pricing-table group">
                        <h1 class="heading">
                            Tu nivel actual es: 
                            <?php 
                                if($RANK==0) echo "Basic";
                                else if($RANK==1) echo "Personal";
                                else echo "Enterprise";

                            ?>
                        </h1>
                        <!-- PERSONAL -->
                        <div class="block personal fl">
                            <h2 class="title">Prueba</h2>
                            <!-- CONTENT -->
                            <div class="content">
                                <p class="price">
                                    <sup>€</sup>
                                    <span>0</span>
                                    <!-- <sub>/mo.</sub> -->
                                </p>
                                <p class="hint">Perfecto para hacer pruebas</p>
                            </div>
                            <!-- /CONTENT -->
                            <!-- FEATURES -->
                            <ul class="features">
                                <li><span class="fontawesome-cog"></span>20 NFTs Max.</li>
                                <li><span class="fontawesome-star"></span>5 Usuarios Max.</li>
                                <li><span class="fontawesome-dashboard"></span>5 Becas Max.</li>
                            </ul>
                            <!-- /FEATURES -->
                            <!-- PT-FOOTER -->
                            <!-- <div class="pt-footer">
                                <p>Mejorar</p>
                            </div> -->
                            <!-- /PT-FOOTER -->
                        </div>
                        <!-- /PERSONAL -->
                        <!-- PROFESSIONAL -->
                        <div class="block professional fl">
                            <h2 class="title">Normal</h2>
                            <!-- CONTENT -->
                            <div class="content">
                                <p class="price">
                                    <sup>€</sup>
                                    <span>30</span>
                                    <!-- <sub>/mo.</sub> -->
                                </p>
                                <p class="hint">Ideal para usuarios con pocas becas</p>
                            </div>
                            <!-- /CONTENT -->
                            <!-- FEATURES -->
                            <ul class="features">
                                <li><span class="fontawesome-cog"></span>50 NFTs Max.</li>
                                <li><span class="fontawesome-star"></span>10 Usuarios Max.</li>
                                <li><span class="fontawesome-dashboard"></span>10 Becas Max.</li>
                            </ul>
                            <!-- /FEATURES -->
                            <!-- PT-FOOTER -->
                            <?php 
                                if($RANK==0)
                                {?>
                                    
                                <div class='pt-footer'>
                                    <form id="realizarPago" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                        <input name="cmd" type="hidden" value="_cart" />
                                        <input name="upload" type="hidden" value="1" />
                                        <input name="business" type="hidden" value="carlosllorentellorente@gmail.com" />
                                        <input name="shopping_url" type="hidden" value="http://www.carlosllorente.es/index.php/welcome/userRanks" />
                                        <input name="currency_code" type="hidden" value="EUR" />
                                        <input name="return" type="hidden" value="http://www.carlosllorente.es/index.php/welcome/userRanks" />
                                        <input name="notify_url" type="hidden" value="http://www.carlosllorente.es/index.php/welcome/verifyPayment" />
                                        <input name="rm" type="hidden" value="2" />
                                        <input name="item_number_1" type="hidden" value="1" />
                                        <input name="item_name_1" type="hidden" value="rank 1" />
                                        <!-- <input name="amount_1" type="hidden" value="30" /> -->
                                        <input name="amount_1" type="hidden" value="1" />
                                        <input name="quantity_1" type="hidden" value="1" /> 
                                        <input name="submitPayment" type="submit" value="Mejorar">
                                    </form>
                                </div>
                            <?php } ?>
                            <!-- /PT-FOOTER -->
                        </div>
                        <!-- /PROFESSIONAL -->
                        <!-- BUSINESS -->
                        <div class="block business fl">
                            <h2 class="title">Profesional</h2>
                            <!-- CONTENT -->
                            <div class="content">
                                <p class="price">
                                    <sup>€</sup>
                                    <span>50</span>
                                    <!-- <sub>/mo.</sub> -->
                                </p>
                                <p class="hint">El mejor para empresas o ballenas</p>
                            </div>
                            <!-- /CONTENT -->

                            <!-- FEATURES -->
                            <ul class="features">
                                <li><span class="fontawesome-cog"></span>NFTs Ilimitados</li>
                                <li><span class="fontawesome-star"></span>Usuarios Ilimitados</li>
                                <li><span class="fontawesome-dashboard"></span>Becas Ilimitadas</li>
                            </ul>
                            <!-- /FEATURES -->

                            <!-- PT-FOOTER -->
                            <?php 
                            if($RANK==0)
                            {?>
                                <div class='pt-footer'>
                                    <form id="realizarPago" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                        <input name="cmd" type="hidden" value="_cart" />
                                        <input name="upload" type="hidden" value="1" />
                                        <input name="business" type="hidden" value="carlosllorentellorente@gmail.com" />
                                        <input name="shopping_url" type="hidden" value="http://www.carlosllorente.es/index.php/welcome/userRanks" />
                                        <input name="currency_code" type="hidden" value="EUR" />
                                        <input name="return" type="hidden" value="http://www.carlosllorente.es/index.php/welcome/userRanks" />
                                        <input name="notify_url" type="hidden" value="http://www.carlosllorente.es/index.php/welcome/verifyPayment" />
                                        <input name="rm" type="hidden" value="2" />
                                        <input name="item_number_1" type="hidden" value="1" />
                                        <input name="item_name_1" type="hidden" value="rank 1" />
                                        <input name="amount_1" type="hidden" value="1" />
                                        <!-- <input name="amount_1" type="hidden" value="50" /> -->
                                        <input name="quantity_1" type="hidden" value="1" /> 
                                        <input name="submitPayment" type="submit" value="Mejorar">
                                    </form>
                                </div>
                            <?php 
                            }
                            else if($RANK==1)
                            {?>
                                <div class='pt-footer'>
                                    <form id="realizarPago" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                        <input name="cmd" type="hidden" value="_cart" />
                                        <input name="upload" type="hidden" value="1" />
                                        <input name="business" type="hidden" value="carlosllorentellorente@gmail.com" />
                                        <input name="shopping_url" type="hidden" value="http://www.carlosllorente.es/index.php/welcome/userRanks" />
                                        <input name="currency_code" type="hidden" value="EUR" />
                                        <input name="return" type="hidden" value="http://www.carlosllorente.es/index.php/welcome/userRanks" />
                                        <input name="notify_url" type="hidden" value="http://www.carlosllorente.es/index.php/welcome/verifyPayment" />
                                        <input name="rm" type="hidden" value="2" />
                                        <input name="item_number_1" type="hidden" value="1" />
                                        <input name="item_name_1" type="hidden" value="rank 1" />
                                        <!-- <input name="amount_1" type="hidden" value="50" /> -->
                                        <input name="amount_1" type="hidden" value="1" />
                                        <input name="quantity_1" type="hidden" value="1" /> 
                                        <input name="submitPayment" type="submit" value="Mejorar">
                                    </form>
                                </div>
                            <?php 
                            }?>
                            <!-- /PT-FOOTER -->
                        </div>
                        <!-- /BUSINESS -->
                    </div>
                    <!-- /PRICING-TABLE -->
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
    <script src="<?php echo base_url(); ?>js/userRanks.js"></script>

</body>

</html>