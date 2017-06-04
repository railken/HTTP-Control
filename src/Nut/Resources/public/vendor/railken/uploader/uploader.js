File = {};
File.files = {};

File.loadEvent = function(container, input, x, name, files){

	var f = files[x];



	var reader = new FileReader();
    reader.onload = function(e){  
 
        var bin = btoa(e.target.result);

        var type = f.type;


        container.show();
        container.html("<img src='data:"+type+";base64,"+bin+"'>");
        var image = container.find("img");

       	image.on('load', function(e) {
	        var width = image.width();
	        var height = image.height();


	        var ratio = width/height;


	        container.css('width', width);
	        container.css('height', height);


	        image = image.get(0);

			var cropper = new Cropper(image, {
				aspectRatio: 1 / 1,
				rotable: false,
				zoomable: false,
				crop: function(e) {



				}
			});


	        if (width > height) {
	        	cropper.setCropBoxData({
	        		height: height
	        	});
	        }



	        if (height > width) {
	        	cropper.setCropBoxData({
	        		width: width
	        	});
	        }

	        File.files[name].push({
	        	name: f.name,
	        	file: bin,
	        	cropper: cropper,
	        	input: input
	        });
			
		});
    }
	 
	reader.readAsBinaryString(f);
}

File.onLoad = function(name, callback)
{
	var f = File.files[name][0];
	var cropper = f.cropper;

	cropper.getCroppedCanvas().toBlob(function (blob) {
	  	var formData = new FormData();

	  	formData.append('croppedImage', blob);

		var reader = new window.FileReader();
		reader.readAsDataURL(blob); 

		reader.onloadend = function() {
	       base64data = reader.result;
	       //f.input.attr('value', base64data);
	       callback(base64data);
		}

	});
}

$('body').on('change', "input[type='file'][data-uploader-image]", function(e){

	var input = $($(this).attr('data-input'));

	var name = input.attr('name');

	var files = $(this)[0].files;
	File.files[name] = [];

	for(var x = 0; x < files.length; x++){

		File.loadEvent($($(this).attr('data-preview')), input, x , name ,files);


	}
});

File.read = function(name){
	return File.files[name];
};