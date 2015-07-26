	var data;

$(document).ready(function(){
	var files;
	$('input[type=file]').on('change', uploadprepare);
	//$('form').on('submit', upload);

	function uploadprepare(event){
		files = event.target.files;
		console.log(files);
		upload();
	}

	function baseurl() {
		pathArray = location.href.split( '/' );
		protocol = pathArray[0];
		host = pathArray[2];
		url = protocol + '//' + host;

		return url;
	}

	function upload(){
		if ($('form span.status').length){
			$('form span.status').remove();
		}
		event.stopPropagation();
		event.preventDefault();
		if (typeof files != "undefined"){
			var userfile = new FormData();
			$.each(files, function(key, val){
				userfile.append(key, val);
			});

			$.ajax({
				url: baseurl() + "/upload/do_upload",
				type: 'POST',
				dataType: "json",
				data: userfile,
				mimeType: "multipart/form-data",
				cache: false,
				processData: false,
				contentType: false,
				success: function(jdata){
					data = jdata;
					console.log(jdata);
					if (jdata['status'] == 'error') {

					} else {
						$('div.photo_sel').append(get_thumbcode(jdata['msg']['file_name'], jdata['msg']['file_ext']));
					/*
					<form type='hidden' name='xx[]' value='yy'/>
					*/
					}
					/*$('form i').remove();
					if (typeof jdata['error'] == "undefined"){
						console.log(jdata['info']);
						$('input.btn').after($('<span>').append('file uploaded!'));
						$('form span').addClass('status');
						update_contentlist(jdata);
					} else {
						$('input.btn').after($('<span>').append('catch error! Please try again'));
						$('form span').addClass('status');
					}*/
					console.log('uploaded');
				},
				error: function(){
					/*$('form i').remove();
					$('input.btn').after($('<span>').append('catch error! Please try again'));
					$('form span').addClass('status');*/
					console.log('error');
				}
			});
		} else {
			$('input.btn').after($('<span>').append('Please select a file to upload first!'));
			$('form span').addClass('status');
		}
	}

	function get_thumbcode(file_name, file_ext) {
		var return_code = '';
		var thumb_text = '-thumb';

		// generate img url
		return_code += '<label>';
		return_code += '<input type="radio" name="img_cover" value="' + file_name + file_ext + '"> ';
		return_code += '<img src="' + baseurl() +'/img/' + file_name + thumb_text + file_ext + '"/>';
		return_code += '<input type="hidden" value="' + file_name + file_ext + '" name="product_pic[]">';
		return_code += '</label>';



		return return_code;
	}

});