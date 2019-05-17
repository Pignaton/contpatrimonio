<?php
//session_start();
include('includes/post-get.php');
include('includes/verificaacesso.php');

include("../../_conn/conn.php");
$retorna = "";
$acesso = "";
$query_pagina1 = $patrimonio->prepare("SELECT DISTINCT menu, pagina, name, icon FROM menu WHERE menu NOT IN(0)");
$query_pagina1->execute();

$query_pagina = $patrimonio->prepare("SELECT DISTINCT nome_pagina, menu, arquivo, icon FROM pagina WHERE  id_pagina NOT IN (2,10)");
$query_pagina->execute();

$query_acesso = $patrimonio->prepare("SELECT * FROM pagina_acesso WHERE  id_pagina NOT IN (2,10)");
$query_acesso->execute();
$total_acesso = $query_acesso->fetchAll(PDO::FETCH_ASSOC);

$acesso ="
  <div class='page-wrapper chiller-theme toggled'>
    <a id='show-sidebar' class='btn btn-sm btn-dark' href='#'>
      <i class='fas fa-bars'></i>
    </a>
    <nav id='sidebar' class='sidebar-wrapper'>
      <div class='sidebar-content'>
        <div class='sidebar-brand'>
        <a href='dashboard.php'><img src='img/anexxa_group.png' width='130px'></a>
          <div id='close-sidebar'>
            <i class='fas fa-times'></i>
          </div>
        </div>
        <div class='sidebar-header'>
          <div class='user-info'>
            <span class='user-name'>
              ".$_SESSION['nome']."
            </span>
            <span class='user-role'>".$nivel."</span>
          </div>
        </div>
        <div class='sidebar-search'>
        </div>
        <div class='sidebar-menu'>
        <ul>";

$acesso .= "<li class='header-menu'>
              <span>Geral</span>
            </li>";

foreach($query_pagina->fetchAll(PDO::FETCH_ASSOC) AS $p)
  {
  $nome = $p['nome_pagina'];
  $menu = $p['menu'];
  $arquivo = $p['arquivo'];
  $icon = $p['icon']; 

  if ($menu == "0") 
    { 

    $acesso .=  "<li>
                <a href='$arquivo'>
                  <i class='$icon'></i>
                  <span>$nome</span>
                </a>
              </li>";
    }
  
  foreach($query_pagina1->fetchAll(PDO::FETCH_ASSOC) AS $tbl)
    {
    $menunome = $tbl['pagina'];
    $menupagina = $tbl['menu'];
    $iconmenu = $tbl['icon'];

    $sub_categoria = $patrimonio->prepare("SELECT nome_pagina, menu, arquivo FROM pagina WHERE menu = $menupagina AND menu NOT IN(0)");
    $sub_categoria->execute();
    $total_categoria = $sub_categoria->fetchAll(PDO::FETCH_ASSOC);
  
    if ($menu != "0")
      {
      $acesso.= "<li class='sidebar-dropdown' >
                    <a href='#'>
                      <i class='$iconmenu'></i>
                      <span>$menunome</span>
                    </a>
                    <div class='sidebar-submenu'>
                    <ul>";
      }

    foreach($total_categoria as $s)
      {
      $nome_pagina = $s['nome_pagina'];
      $menu2 = $s['menu'];
      $arquivo2 = $s['arquivo'];

      $acesso.= "
                        <li>
                          <a href='$arquivo2'>$nome_pagina
                          </a>
                        </li>";
      }
$acesso .="            </ul>
                    </div>
                  </li> ";
    }
  }

$acesso .="  

                </ul>
              </div>
            </div>
            <div class='sidebar-footer'>
            </div>
          </nav>";
echo $acesso;
?>