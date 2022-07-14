<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script>
  $( "#aduan-pic" ).autocomplete({
      source: <?= $autocomplete ?>,
      autoFocus: true,
      delay: 100
  });
  $('#form-pengaduan-edit').submit(function(e) {

  });
</script>