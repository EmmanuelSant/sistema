<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>SISTEMA</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/plantilla/seismexico.png">
<!--
PLUGINS CSS
-->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Data tables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!--responsive-->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
<!--
PLUGINS JS
-->
  <!-- jQuery 3 -->
<script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>
<!-- data tables -->
<script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!--responsive-->
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
<!--sweet alert 2-->
<script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

</head>
<!--
CUERPO DEL DOCUMENTO
para el skin
https://adminlte.io/docs/2.4/layout
-->
<body class="hold-transition skin-black sidebar-mini login-page">

  <?php
    echo '<div class="wrapper">';
  

  /*HEADER*/
    include "modulos/header.php";
  /*MENU*/
    include "modulos/menu.php";
  /*CONTENIDO*/
  if(isset($_GET["ruta"])){

    if($_GET["ruta"]=="inicio"||
      $_GET["ruta"]=="backup"||
      $_GET["ruta"]=="log"||
      $_GET["ruta"]=="salir"){
      include "modulos/".$_GET["ruta"].".php";
    } else{
      include "modulos/404.php";
    }
  }else{
    include "modulos/inicio.php";
  }

  /*FOOTER*/
  include "modulos/footer.php";
 
  echo '</div>';

?>  
<!-- ./wrapper -->
<script src="vistas/js/plantilla.js"></script>
</body>
</html>
