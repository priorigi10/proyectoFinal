<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/subuserDashboard.css" />

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="content-profile-page">
        <div class="profile-user-page card">
            <div class="img-user-profile">
                <img class="profile-bgHome" src="<?= base_url() . 'images/pagina/dashboardBackground.jpg'; ?>" />
                <img class="avatar" src="<?= base_url() . 'images/users/default.png'; ?>" alt="jofpin"/>
            </div>
            <button>Crear Registro</button>
            <div class="user-profile-data">
                <h1>Carlos Llorente</h1>
                <p>Becado por: Priorigi_10</p>
            </div>
            <ul class="data-user">
                <li><a><strong>120</strong><span>Registros</span></a></li>
                <li><a><strong>3</strong><span>NFT´s</span></a></li>
                <li><a><strong>40%</strong><span>Porcentaje</span></a></li>
            </ul>
        </div>
    </div>

    <footer>
        <h4>
            Hecho por: <a href="https://es.linkedin.com/in/carlos-llorente-llorente-43869a147" target="_blank">Carlos Ll.</a></a>
        </h4>
    </footer>

    <script src="<?php echo base_url(); ?>js/subuserDashboard.js"></script>
</body>

</html>