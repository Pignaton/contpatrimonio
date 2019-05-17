<?php 
include_once('includes/header.php'); 
include("includes/valortabela.php"); 
include("includes/grafico/quantidade.php"); 

?>
<br>
<br>
<div class="container-fluid">
	<div class="row pt-5">
		<div class="col-md-3 col-sm-4 col-xs-6">
			<div class="modal-dashboard pt-2">
				<p class="text-center" style="line-height: 1.5em"><i class="fa fa-archive fa-icon-medium"></i> Número de Ativos &nbsp;<br>
				<?= $quant_ativo ?><br>
				<span <?=$color?>>
				 	&nbsp;
				</span>
			</div>
		</div>
		<div class="col-md-3 col-sm-4 col-xs-6">
			<div class="modal-dashboard pt-2">
				<p class="text-center" style="line-height: 1.5em">
					<i class="fas fa-dollar-sign pt-1"></i> 
					 Total em Ativos<br>
					 R$ <?= number_format($soma_ativo, 2, ',', '.') ?><br>
				  <span <?=$color?>>
					 <?=$icon?>&nbsp;
					 <?= round($valor_ativo, 2) . " % "; ?>
				  </span>
				</p>
			</div>
		</div>
		<div class="col-md-3 col-sm-4 col-xs-6">
			<div class="modal-dashboard pt-2">
				<p class="text-center" style="line-height: 1.5em">
					<i class="fas fa-dollar-sign pt-1"></i> 
					 Total em Baixa<br>
					R$ <?= number_format($soma_baixa, 2, ',', '.') ?><br>
					<span <?=$color2?>>
					   <?=$icon2?>&nbsp;
					   <?= round($valor_baixa, 2) . " % "; ?>
					</span>
				</p>
			</div>
		</div>
		<div class="col-md-3 col-sm-4 col-xs-6">
			<div class="modal-dashboard pt-2">
				<p class=" text-center" style="line-height: 1.5em">
					<i class="fas fa-dollar-sign pt-1"></i> Total em Manutenção</br>
					R$ <?= number_format($soma_manutencao, 2, ',', '.') ?><br>
					<span  <?=$color3?>>
					   <?=$icon3?>&nbsp;
					   <?= round($valor_manu, 2) . " % "; ?>
					</span>
				</p>
			</div>
		</div>
	</div>
</div>
	<div class="container-fluid">
	<br>
	<div class="row">
	<div style="padding-left:15px;"></div>
	<div class="col-sm modal-dashboard div-table">
	<div id="loader"></div>
	</div>
	<div>&nbsp;</div>
			<?php 
		
				$sql_exibi = "SELECT departamento FROM departamento";
				$sql_exibe = $patrimonio->prepare($sql_exibi);
				$sql_exibe->execute();
				$rows = $sql_exibe->rowCount();
				while ($tbl2 = $sql_exibe->fetch( PDO::FETCH_OBJ )) {
				}
			?>
		 
			<div class="col-sm modal-dashboard">
				&nbsp;
				<div>
					<p class="font-titulo"><i class="fas fa-chart-bar"></i>&nbsp; Gráfico - Quantidade de ativos por setor</p>
					<hr>
				</div>
				<style type="text/css">
					@-webkit-keyframes chartjs-render-animation {
						from {
							opacity: 0.99
						}
						to {
							opacity: 1
						}
					}
					
					@keyframes chartjs-render-animation {
						from {
							opacity: 0.99
						}
						to {
							opacity: 1
						}
					}
					
					.chartjs-render-monitor {
						-webkit-animation: chartjs-render-animation 0.001s;
						animation: chartjs-render-animation 0.001s;
					}
				</style>
				<div id="canvas-holder" style="width:;">
					<div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
						<div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
							<div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
						</div>
						<div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
							<div style="position:absolute;width:300%;height:300%;left:0; top:0"></div>
						</div>
					</div>
					<canvas id="chart-area" class="chartjs-render-monitor" style="display: block;"></canvas>
				</div>
				<script>
					var randomScalingFactor = function () {
						return Math.round( Math.random() * 100 );
					};
					var config = {
						type: 'pie',
						data: {
							datasets: [ {
								data: [<?=$quant2?>],
								backgroundColor: [
									'#73a6c9',
									'#00acff',
									'#dbecf8',
									'#B5E1FF',
									'#6492B2',
									'#76DDFB',
									'#486D87'
								],
								label: 'Quantidade de potes'
							} ],
							labels: [ 'Desenvolvimento', 'Desenvolvimento web', 'operacional', 'Suporte', 'Infraestrutura', 'RH', 'Limpeza', 'Copa' ]
						},
						options: {
							responsive: true,
							maintainAspectRatio: false,
							tooltips: {}
						}
					};

					window.onload = function () {
						var ctx = document.getElementById('chart-area').getContext('2d');
						window.myPie = new Chart( ctx, config );
					};

					//var colorNames = Object.keys( window.chartColors );
					document.getElementById( 'addDataset' ).addEventListener( 'click', function () {
						var newDataset = {
							backgroundColor: [],
							data: [],
							label: 'New dataset ' + config.data.datasets.length,
						};
						
						config.data.datasets.push( newDataset);
						window.myPie.update();
					});
				</script>
			</div>
			<div>&nbsp;</div>
			<div class="col-sm modal-dashboard">
				&nbsp;
				<div>
				<p class="font-titulo"><i class="fas fa-chart-bar"></i>&nbsp; Gráfico - Total por patrimônio</p>
				<hr>
				</div>
				<section class="view-window">
					<div class="screen">
						<canvas id="myChart"></canvas>
					</div>
				</section>
			</div>
			<div style="padding-right:15px;"></div>
		</div>
	</div>

<?php 
include('html/modal_dashboard.php');
include_once('includes/footer.php'); 
?>
<script src="js/script.js"></script>
<script src="js/dashboard.js"></script>
<script>
var ctx = document.getElementById('myChart').getContext("2d");

var barStroke = ctx.createLinearGradient(700, 0, 120, 0);
barStroke.addColorStop(0, 'rgba(0, 255, 188, 0.6)');
barStroke.addColorStop(1, 'rgba(0, 205, 194, 0.6)');

var barFill = ctx.createLinearGradient(700, 0, 120, 0);
barFill.addColorStop(0, "rgba(0, 255, 188, 0.6)");
barFill.addColorStop(1, "rgba(0, 205, 194, 0.6)");

var barFillHover = ctx.createLinearGradient(700, 0, 120, 0);
barFillHover.addColorStop(0, "rgba(0, 255, 188, 0.8)");
barFillHover.addColorStop(1, "rgba(0, 205, 194, 0.6)");

var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: ["Ativo", "Baixa", "Manutenção"],
        datasets: [{
            label: "total",
            borderColor: barStroke,
			borderWidth: 1,
            fill: true,
            backgroundColor: barFill,
			hoverBackgroundColor: barFillHover,
            data: [<?=$quant?>]
        }]
    },
    options: {
        animation: {
            easing: "easeOutQuart"
        },
        legend: {
            position: "bottom",
			display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    fontColor: "#000",
                    fontStyle: "bold",
                    beginAtZero: true,
                    padding: 15,
					//display: false - remove this and commenting to display: false
                },
                gridLines: {
                    drawTicks: false,
                    display: false,
					color: "transparent",
					zeroLineColor: "transparent"
                }
            }],
            xAxes: [{
                gridLines: {
					display: false,
					color: "transparent",
					zeroLineColor: "transparent"
                },
                ticks: {
                    padding: 15,
					beginAtZero: true,
                    fontColor: "#000",
                    fontStyle: "bold",
					maxTicksLimit: 20,
					//display: false - remove this and commenting to display: false
                }
            }]
        }
    }
});
	</script>
