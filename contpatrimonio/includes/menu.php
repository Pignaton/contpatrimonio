
<?php 
//session_start();
include('includes/post-get.php');
include('includes/verificaacesso.php');
?>
<link rel="stylesheet" type="text/css" href="css/menu.css"/>

<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#"><img src="img/anexxa_group.png" width="130px"></a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <!--<div class="user-pic">
          <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
            alt="User picture">
        </div>-->
        <div class="user-info">
          <span class="user-name">
			  <?=$_SESSION['nome']?>
          </span>
          <span class="user-role"><?=$nivel?></span>
        </div>
      </div>
      <!-- sidebar-header  -->
      <div class="sidebar-search">
      </div>
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
		<?php if($dashboard == 1){?>
		  <li class="header-menu ">
			  <a href="dashboard.php">
             <i class="fas fa-home"></i>
              <span>home</span>
            </a>
          </li>
		  <?php } ?>
          <li class="header-menu">
            <span>Geral</span>
          </li>
		  <?php if($dashboard == 1){?>
          <li class="sidebar-dropdown <?=$active1?>"><!--active*/-->
            <a href="#">
			  <i class="fa fa-chart-line"></i>
              <span>Dashboard</span>
              <!--<span class="badge badge-pill badge-warning">New</span>-->
            </a>
            <div class="sidebar-submenu" <?=$block1?>><!--style="display:block;"-->
              <ul>
                <li>
                  <a <?=$color1?> href="dashboard.php">Dashboard
                    <!--<span class="badge badge-pill badge-success">Pro</span>-->
                  </a>
                </li>
              </ul>
            </div>
          </li>
			<?php } ?>
			<?php if($cadastro_ativo == 1){?>
		  <li class="sidebar-dropdown <?=$active2?>">
            <a href="#">
              <i class="fas fa-clipboard-check"></i>
              <span>Ativo</span>
            </a>
            <div class="sidebar-submenu" <?=$block2?>>
              <ul>
                <li>
                  <a <?=$color?> href="cadastro_ativo.php" >Tabela de Ativos</a>
                </li>
              </ul>
            </div>
          </li>
		  <?php } ?>
		  <?php if($tabela_baixa == 1){?>
          <li class="sidebar-dropdown <?=$active3?>">
            <a href="#">
              <i class="fas fa-eraser"></i>
              <span>Baixa</span>
            </a>
            <div class="sidebar-submenu" <?=$block3?>>
              <ul>
                <li>
                  <a <?=$color3?> href="baixa_ativo.php">Tabela de Baixa</a>
                </li>
              </ul>
            </div>
          </li>
		      <?php } ?>
		      <?php if($tabela_manutencao == 1){?>
          <li class="sidebar-dropdown <?=$active4?>">
            <a href="#">
              <i class="fas fa-retweet"></i>
              <span>Manutenção</span>
            </a>
            <div class="sidebar-submenu" <?=$block4?>>
              <ul>
                <li>
                  <a <?=$color4?> href="manutencao_tabela.php">Tabela de Manutenção</a>
                </li>
				        <li>
                  <a <?=$color5?> href="manutencao_ativo.php">Registrar Manutenção</a>
                </li>
              </ul>
            </div>
          </li>
		      <?php } ?>
          <li class="header-menu">
            <span>Extra</span>
          </li>
          <?php if($backup == 1){ ?>
          <li class="<?=$active4?>">
            <a <?=$color6?> href="backup.php">
              <i class="fas fa-copy"></i>
              <span>Cópia das notas</span>
            </a>
          </li>
          <?php } ?>
          <li>
            <a href="documentacao.php">
              <i class="fa fa-book"></i>
              <span>Documentação</span>
              <span class="badge badge-pill badge-primary">New</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-calendar"></i>
              <span>Calendario</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
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
