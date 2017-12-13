$('#file2').change(function() {
  var file = $('#file2')[0].files[0].name;
  $('#lbl').text(file);
});