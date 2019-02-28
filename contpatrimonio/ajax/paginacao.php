<?php

function paginate($pagina, $tpages, $adjacente) {
	$anterior = "&lsaquo; Anterior";
	$proximo = "Proximo &rsaquo;";
	$out = '<ul class="pagination  pull-right">';
	
	// anterior

	if($pagina==1) {
		$out.= "<li class='page-item disabled'><a>$anterior</a></li>";
	} else if($pagina==2) {
		$out.= "<li class='page-item'><a href='javascript:void(0);' onclick='load(1)'>$anterior</a></li>";
	}else {
		$out.= "<li class='page-item'><a href='javascript:void(0);' onclick='load(".($pagina-1).")'>$anterior</a></li>";

	}
	
	// primeiro label
	if($pagina>($adjacente+1)) {
		$out.= "<li class='page-item'><a href='javascript:void(0);' onclick='load(1)'>1</a></li>";
	}
	// interval
	if($pagina>($adjacente+2)) {
		$out.= "<li class='page-item'><a>...</a></li>";
	}

	// paginas

	$pmin = ($pagina>$adjacente) ? ($pagina-$adjacente) : 1;
	$pmax = ($pagina<($tpages-$adjacente)) ? ($pagina+$adjacente) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$pagina) {
			$out.= "<li class='active page-item'><a>$i</a></li>";
		}else if($i==1) {
			$out.= "<li class='page-item'><a href='javascript:void(0);' onclick='load(1)'>$i</a></li>";
		}else {
			$out.= "<li class='page-item'><a href='javascript:void(0);' onclick='load(".$i.")'>$i</a></li>";
		}
	}

	// interval

	if($pagina<($tpages-$adjacente-1)) {
		$out.= "<li class='page-item'><a>...</a></li>";
	}

	// antes

	if($pagina<($tpages-$adjacente)) {
		$out.= "<li class='page-item'><a href='javascript:void(0);' onclick='load($tpages)'>$tpages</a></li>";
	}

	// proximo

	if($pagina<$tpages) {
		$out.= "<li class='page-item'><a href='javascript:void(0);' onclick='load(".($pagina+1).")'>$proximo</a></li>";
	}else {
		$out.= "<li class='disabled page-item'><a>$proximo</a></li>";
	}
	
	$out.= "</ul>";
	return $out;
}
?>