
<!-- Required Js -->
<script src="<?= base_url()?>assets/template/dist/assets/js/vendor-all.min.js"></script>
<script src="<?= base_url()?>assets/template/dist/assets/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/template/dist/assets/js/ripple.js"></script>
<script src="<?= base_url()?>assets/template/dist/assets/js/pcoded.js"></script>

<?php if($title == 'dashboard'):?>
<script src="<?= base_url()?>assets/template/dist/assets/js/plugins/apexcharts.min.js"></script>
<?php endif?>
<!-- Datatable -->
<script src="<?= base_url()?>assets/datatables.min.js"></script>

<!-- Pnotify -->
<script src="<?= base_url()?>assets/toastr-master/toastr.js"></script>

<!-- Apex Chart -->
<!-- <script src="<?= base_url()?>assets/template/dist/assets/js/plugins/apexcharts.min.js"></script> -->

<!-- jquery ui -->
<script src="<?= base_url()?>assets/jqueryui/jquery-ui.js"></script>
<!-- select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(function() {
	$('.fixed-button').hide();
});

<?php if($title == 'dashboard'):?>
	$(function() {
		var options = {
			showAlways: true,
			decimalsInFloat: undefined,
			series: [{
				data: [
					<?php foreach($data_grafik_jumlah_mahasiswa as $data):?>
						"<?php echo $data->jumlah?>",
					<?php endforeach;?>
				]
			}],
			chart: {
				type: 'bar',
				height: 350
			},
			plotOptions: {
				bar: {
					borderRadius: 4,
					horizontal: true,
				}
			},
			dataLabels: {
				enabled: false
			},
			xaxis: {
				categories: [
					<?php foreach($data_grafik_jumlah_mahasiswa as $data):?>
						"<?php echo $data->nama_jurusan?>",
					<?php endforeach;?>
				],
			}
		};
		var chart = new ApexCharts(
			document.querySelector("#bar-chart-1"),
			options
		);
		chart.render();

	});
<?php endif;?>
</script>

</body>

</html>
