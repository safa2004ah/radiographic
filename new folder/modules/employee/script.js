$(document).on('change','.image_up', function() {

	

	if(this.files[0].size > 5000000){

		alert('Please select image with size no more then 1 MB!');

		$(this).val(null);

	}else{

		

		//loader

		start_loader();

		//loader

	

		let id = $(this).attr('id');

		id = id.replace('image_up_','');

		$('#image_inner_div_'+id).empty();



		if (this.files) {

			var reader = new FileReader();

			reader.onload = function(event) {

				$($.parseHTML('<img id="image_'+id+'" class="col-12">')).attr('src', event.target.result).appendTo('#image_div_'+id);



				var image = $('#image_'+id);

				var cropper = image.cropper({

					aspectRatio: 740 / 494,

					movable: false,

					zoomable: false,

					cropBoxResizable: false,

					// dragMode: 'none',

					toggleDragModeOnDblclick: false,

					checkCrossOrigin: false,

					// minCropBoxWidth: 100,

					// minCropBoxHeight: 100,

					crop: function (e) {

						$('#image_x_'+id).val(e.x);

						$('#image_y_'+id).val(e.y);

						$('#image_h_'+id).val(e.height);

						$('#image_w_'+id).val(e.width);

					}

				});



			}

			reader.readAsDataURL(this.files[0]);

			

			//loader

			stop_loader();

			//loader

			

		}

		

	}

});



$(document).on('click','.delete_image',function(){

	let id = $(this).attr('id').replace('delete_image_','');

	if($('#sub_img_old_'+id).val()){

		let old_data = $('#images_for_delete').val();

		$('#images_for_delete').val(old_data+$('#sub_img_old_'+id).val()+',');

	}

	$('#image_div_'+id).fadeOut(300, function() {

		$('#image_div_'+id).remove();

	});

});





$('#add_form').validate({

	rules: {

	  title_ar: {

		required: true

	  },

// 	  title_en: {

// 		required: true

// 	  },

// 	  title_fr: {

// 		required: true

// 	  },

// 	  title_it: {

// 		required: true

// 	  },

// 	  title_sp: {

// 		required: true

// 	  },

	  desc_ar: {

		required: true

	  },

// 	  desc_en: {

// 		required: true

// 	  },

// 	  desc_fr: {

// 		required: true

// 	  },

// 	  desc_it: {

// 		required: true

// 	  },

// 	  desc_sp: {

// 		required: true

// 	  },

	  date: {

		required: true

	  },

	  image_up_main: {

		required: true

	  },

	},

	messages: {

	  title_ar: {

		required: "This field is required"

	  },

// 	  title_en: {

// 		required: "This field is required"

// 	  },

// 	  title_fr: {

// 		required: "This field is required"

// 	  },

// 	  title_it: {

// 		required: "This field is required"

// 	  },

// 	  title_sp: {

// 		required: "This field is required"

// 	  },

	  desc_ar: {

		required: "This field is required"

	  },

// 	  desc_en: {

// 		required: "This field is required"

// 	  },

// 	  desc_fr: {

// 		required: "This field is required"

// 	  },

// 	  desc_it: {

// 		required: "This field is required"

// 	  },

// 	  desc_sp: {

// 		required: "This field is required"

// 	  },

	  date: {

		required: "This field is required"

	  },

	  image_up_main: {

		required: "This field is required"

	  },

	},

	errorElement: 'span',

	errorPlacement: function (error, element) {

	  error.addClass('invalid-feedback');

	  element.closest('.form-group').append(error);

	},

	highlight: function (element, errorClass, validClass) {

	  $(element).addClass('is-invalid');

	},

	unhighlight: function (element, errorClass, validClass) {

	  $(element).removeClass('is-invalid');

	}

});



$('#edit_form').validate({

	rules: {

	  title_ar: {

		required: true

	  },

// 	  title_en: {

// 		required: true

// 	  },

// 	  title_fr: {

// 		required: true

// 	  },

// 	  title_it: {

// 		required: true

// 	  },

// 	  title_sp: {

// 		required: true

// 	  },

	  desc_ar: {

		required: true

	  },

// 	  desc_en: {

// 		required: true

// 	  },

// 	  desc_fr: {

// 		required: true

// 	  },

// 	  desc_it: {

// 		required: true

// 	  },

// 	  desc_sp: {

// 		required: true

// 	  },

	  date: {

		required: true

	  },

	},

	messages: {

	  title_ar: {

		required: "This field is required"

	  },

// 	  title_en: {

// 		required: "This field is required"

// 	  },

// 	  title_fr: {

// 		required: "This field is required"

// 	  },

// 	  title_it: {

// 		required: "This field is required"

// 	  },

// 	  title_sp: {

// 		required: "This field is required"

// 	  },

	  desc_ar: {

		required: "This field is required"

	  },

// 	  desc_en: {

// 		required: "This field is required"

// 	  },

// 	  desc_fr: {

// 		required: "This field is required"

// 	  },

// 	  desc_it: {

// 		required: "This field is required"

// 	  },

// 	  desc_sp: {

// 		required: "This field is required"

// 	  },

	  date: {

		required: "This field is required"

	  },

	},

	errorElement: 'span',

	errorPlacement: function (error, element) {

	  error.addClass('invalid-feedback');

	  element.closest('.form-group').append(error);

	},

	highlight: function (element, errorClass, validClass) {

	  $(element).addClass('is-invalid');

	},

	unhighlight: function (element, errorClass, validClass) {

	  $(element).removeClass('is-invalid');

	}

});



$(document).on('click', '[data-toggle="lightbox"]', function(event) {

	event.preventDefault();

	$(this).ekkoLightbox({

		alwaysShowClose: true

	});

});



$('.filter-container').filterizr({gutterPixels: 3});

$('.btn[data-filter]').on('click', function() {

	$('.btn[data-filter]').removeClass('active');

	$(this).addClass('active');

});

