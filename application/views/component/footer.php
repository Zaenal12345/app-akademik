
<!-- Required Js -->
<script src="<?= base_url()?>assets/template/dist/assets/js/vendor-all.min.js"></script>
<script src="<?= base_url()?>assets/template/dist/assets/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/template/dist/assets/js/ripple.js"></script>
<script src="<?= base_url()?>assets/template/dist/assets/js/pcoded.js"></script>

<script src="<?= base_url()?>assets/template/dist/assets/js/plugins/apexcharts.min.js"></script>

<!-- Datatable -->
<script src="<?= base_url()?>assets/datatables.min.js"></script>

<!-- Pnotify -->
<script src="<?= base_url()?>assets/toastr-master/toastr.js"></script>

<!-- Apex Chart -->
<!-- <script src="<?= base_url()?>assets/template/dist/assets/js/plugins/apexcharts.min.js"></script> -->

<!-- custom-chart js -->
<script src="<?= base_url()?>assets/template/dist/assets/js/pages/dashboard-main.js"></script>
<!-- jquery ui -->
<script src="<?= base_url()?>assets/jqueryui/jquery-ui.js"></script>
<!-- select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
	$(function() {
		$('.fixed-button').hide();
	});

	$(function() {
		var options = {
			chart: {
				height: 320,
				type: 'donut',
			},
			series: [44, 55, 41, 17, 15],
			colors: ["#4680ff", "#0e9e4a", "#00acc1", "#ffba57", "#ff5252"],
			legend: {
				show: true,
				position: 'bottom',
			},
			plotOptions: {
				pie: {
					donut: {
						labels: {
							show: true,
							name: {
								show: true
							},
							value: {
								show: true
							}
						}
					}
				}
			},
			dataLabels: {
				enabled: true,
				dropShadow: {
					enabled: false,
				}
			},
			responsive: [{
				breakpoint: 480,
				options: {          
					legend: {
						position: 'bottom'
					}
				}
			}]
		}
		var chart = new ApexCharts(
			document.querySelector("#pie-chart-2"),
			options
		);
		chart.render();
	});
</script>

</body>

</html>
