<?php
/*ini_set ( 'display_errors' , 1 );
ini_set ( 'display_startup_errors' , 1 );
error_reporting ( E_ALL ); */
include('../../_conn/conn.php');

$acesso = "";
$query_pagina1 = $patrimonio->prepare("SELECT DISTINCT pagina, categoria, class, checkbox FROM pagina_categoria WHERE categoria NOT IN(0)");
$query_pagina1->execute();
$query_pagina = $patrimonio->prepare("SELECT DISTINCT nome_pagina, categoria, name, checkbox FROM pagina WHERE 1");
$query_pagina->execute();
//$rows = $query_pagina->rowCount();

// $final = 0;

foreach($query_pagina->fetchAll(PDO::FETCH_ASSOC) AS $p)
	{
	$nome = $p['nome_pagina'];
	$txtname = $p['name'];
	$categoria = $p['categoria'];

	if ($categoria == "0")
		{
		$acesso.= "<div class='col-sm-4'>                                
                    <section class='boxe'>
                        <div class='checkbox c-checkbox'>
                        <label class='desativa'>
                            <input type='checkbox' name='" . $txtname . "' id='" . $txtname . "' value='1' />
                            <span class='fa fa-check'></span>
                             &nbsp; $nome
                        </label>
                    </div>                                        
                </section>
            </div>";
		}

	foreach($query_pagina1->fetchAll(PDO::FETCH_ASSOC) AS $tbl)
		{
		$categorianome = $tbl['pagina'];
		$categoriapagina = $tbl['categoria'];
		$class = $tbl['class'];
		$checkbox = $tbl['checkbox'];
		$sub_categoria = $patrimonio->prepare("SELECT nome_pagina, categoria, name, checkbox FROM pagina WHERE categoria = $categoriapagina AND categoria NOT IN(0)");
		$sub_categoria->execute();
		$total_categoria = $sub_categoria->fetchAll(PDO::FETCH_ASSOC);

		// $final++;

		if ($categoria != "0")
			{
			$acesso.= "<div class='col-sm-4'>
                      		<span class='msg'></span>
                      			<section class='boxe'>
                      			<div class='sidebar-dropdown'>
                        		<a href='#'>
                        			<div class='checkbox c-checkbox'>
                          			<label class='desativa'>
                            		<input type='checkbox' class='" . $checkbox . "' id='" . $checkbox . "' />
                            		<span class='fa fa-check'></span>
                           			<i data-toggle='' class='link'> &nbsp; <strong>$categorianome<strong></i>
                          		</label>
                        	</div>
                        </a> ";
			}

		if ($categoria != "0")
			{
			$acesso.= "<div class='fundo'>
                            <div class='corfundo'>";
			}
		  else
			{
			$acesso.= "";
			}

		foreach($total_categoria as $s)
			{
			$txtname2 = $s['name'];
			$nome_pagina = $s['nome_pagina'];
			$categoria2 = $s['categoria'];

			$acesso.= " <div class='checkbox c-checkbox'>
                            <label>
                                <input type='checkbox' class='" . $class . "' name='" . $txtname2 . "' id='" . $txtname2 . "' value='1'/>
                                  <span class='fa fa-check'></span>
                                  &nbsp; $nome_pagina 
                            </label>
                        </div>";
			}

		$acesso.= "        </div>
						</div>
                    </section>
                </div>";
		}
	}

echo $acesso;
?>