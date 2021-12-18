<!-- jQuery Scrollbar -->
<script src="<?= base_url('assets/') ?>js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Datatables -->
<script src="<?= base_url('assets/') ?>js/plugin/datatables/datatables.min.js"></script>
<script type="text/javascript">
	var table = $('#multi-filter-select').DataTable({
		"sDom": "ftipr"
	});

	function searchData(column, val){
		table.columns(column).search(val ? val : '', true, false).draw();
	}
</script>