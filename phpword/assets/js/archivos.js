function ar_readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.archivo-upload-wrap').hide();

      $('.archivo-upload-content').show();

      $('.archivo-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function ar_removeUpload() {
  $('.archivo-upload-input').replaceWith($('.archivo-upload-input').clone());
  $('.archivo-upload-content').hide();
  $('.archivo-upload-wrap').show();
}
$('.archivo-upload-wrap').bind('dragover', function () {
		$('.archivo-upload-wrap').addClass('image-dropping');
	});
	$('.archivo-upload-wrap').bind('dragleave', function () {
		$('.archivo-upload-wrap').removeClass('image-dropping');
});