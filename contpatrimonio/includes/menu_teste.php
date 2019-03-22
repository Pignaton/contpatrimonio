
<?php 
//session_start();
//include('post-get.php');
//include('verificaacesso.php');

include("../../_conn/conn.php");
$query_menu = "SELECT id_pagina,categoria, nome_pagina, arquivo FROM pagina";
  $query_user = $patrimonio->prepare($query_menu);
  $query_user->execute();
  $qnt_linhas = $query_user->rowCount();

 } 
 ?>
<link rel="stylesheet" type="text/css" href="css/menu.css"/>

<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper"> 
      <div class="sidebar-menu">
        <ul>
    <?php ?>
      <li class="header-menu ">
        <a href="dashboard.php">
             <i class="fas fa-home"></i>
              <span><?php $manutencao_menu ?></span>
            </a>
          </li>
      <?php  ?>
          <li class="header-menu">
            <span>Geral</span>
          </li>
      <?php  
        $sub_patrimonio = $patrimonio->prepare("SELECT * FROM registro_manutencao WHERE id_patrimonio = $id_patrimonio ORDER BY id_manutencao DESC");
      $sub_patrimonio->execute();
      $total_patrimonio = $sub_patrimonio->fetchAll(PDO::FETCH_ASSOC);
      $final++;?>
          <li class="sidebar-dropdown"><!--active*/-->
            <a href="#">
        <i class="fa fa-chart-line"></i>
              <span>Dashboard</span>
              <!--<span class="badge badge-pill badge-warning">New</span>-->
            </a>
            <div class="sidebar-submenu"><!--style="display:block;"-->
              <ul>
                <li>
                  <a  href="dashboard.php">Dashboard
                    <!--<span class="badge badge-pill badge-success">Pro</span>-->
                  </a>
                </li>
              </ul>
            </div>
          </li>
      <?php  ?>
      </div>
  </nav>
  <!-- sidebar-wrapper  -->

<script>
	$(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});

$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
});

</script>
