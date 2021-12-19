<script src="<?= base_url('assets/') ?>js/plugin/chart.js/chart.min.js"></script>
<script type="text/javascript">
	var multipleLineChart = document.getElementById('multipleLineChart').getContext('2d');
	var myMultipleLineChart = null;
	$(document).ready(function(){
		initializeChart();
		initializeData();
	});

	$("#periode").change(function(){
		initializeData();
	});

	$("#pic").change(function(){
		initializeData();
	});

	function initializeData(){
		var periode = $("#periode").val();
		var pic = $("#pic").val();

		var form = new FormData();
        form.append("periode", periode);
        form.append("pic", pic);

		$.ajax({
            type: "POST",
            url: "<?= base_url('dashboard/chartdata') ?>",
            data: form,
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
            	setMediaTerbanyak(result.data.media_terbanyak);
                setAduanTerbanyak(result.data.aduan_terbanyak);
                setJumlahPengaduan(result.data.jumlah_pengaduan);
                setPengaduanDitanggapi(result.data.aduan_ditanggapi);

                myMultipleLineChart.data.datasets[0].data = result.data.chart.active;
                myMultipleLineChart.data.datasets[1].data = result.data.chart.non_active;
                myMultipleLineChart.data.labels = result.data.chart.labels;
                myMultipleLineChart.update();
            },
            error: function(error) {
                if (error.status == 400) {
                    Swal.fire("Gagal", error.responseJSON.message, "error");
                    return;
                }
                Swal.fire("Gagal", "Maaf server sedang sibuk, silahkan coba lagi nanti.", "error");
            }
        });
	}

	function setJumlahPengaduan(val){
		$("#jumlah-pengaduan").html(val + " Pengaduan");
	}

	function setAduanTerbanyak(val){
		$("#aduan-terbanyak").html(val.pic_nama + " <i>(" + val.jumlah + " pengaduan)</i>");
	}

	function setPengaduanDitanggapi(val){
		$("#jumlah-pengaduan-ditanggapi").html(val + " Pengaduan");
	}

	function setMediaTerbanyak(val){
		$("#icon-media").html("<i class='"+val.media_icon+"'></i>");
		$("#nama-media").html(val.media_nama);
	}

	function initializeChart(){
		myMultipleLineChart = new Chart(multipleLineChart, {
			type: 'line',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
				datasets: [{
					label: "DITANGGAPI",
					borderColor: "#59d05d",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#59d05d",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
				}, {
					label: "BELUM DITANGGAPI",
					borderColor: "#f3545d",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#f3545d",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
				}]
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position: 'top',
				},
				tooltips: {
					bodySpacing: 4,
					mode:"nearest",
					intersect: 0,
					position:"nearest",
					xPadding:10,
					yPadding:10,
					caretPadding:10
				},
				layout:{
					padding:{left:15,right:15,top:15,bottom:15}
				}
			}
		});
	}
</script>