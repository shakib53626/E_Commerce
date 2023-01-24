const accordion = document.getElementsByClassName('c-effict');

for (i = 0; i<accordion.length; i++){
    accordion[i].addEventListener('click', function(){
        this.classList.toggle('active');
    })
}



// Categoery image js code

var btnUpload = $("#upload_file"),
		btnOuter = $(".button_outer");
	btnUpload.on("change", function(e){
		var ext = btnUpload.val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
			$(".error_msg").text("Not an Image...");
		} else {
			$(".error_msg").text("");
			btnOuter.addClass("file_uploading");
			setTimeout(function(){
				btnOuter.addClass("file_uploaded");
			},3000);
			var uploadedFile = URL.createObjectURL(e.target.files[0]);
			setTimeout(function(){
				$("#uploaded_view").append('<img src="'+uploadedFile+'" />').addClass("show");
			},3500);
		}
	});
	$(".file_remove").on("click", function(e){
		$("#uploaded_view").removeClass("show");
		$("#uploaded_view").find("img").remove();
		btnOuter.removeClass("file_uploading");
		btnOuter.removeClass("file_uploaded");
	});


// Category Edite image Code....................
var editBtnUpload = $("#edit_upload_file"),
		editBtnOuter = $(".button_outer_edit");
	editBtnUpload.on("change", function(e){
		var extEdit = editBtnUpload.val().split('.').pop().toLowerCase();
		if($.inArray(extEdit, ['gif','png','jpg','jpeg']) == -1) {
			$(".edit_error_msg").text("Not an Image...");
		} else {
			$(".edit_error_msg").text("");
			editBtnOuter.addClass("file_uploading");
			setTimeout(function(){
				editBtnOuter.addClass("file_uploaded");
			},3000);
			var editUploadedFile = URL.createObjectURL(e.target.files[0]);
			setTimeout(function(){
				$("#edit_uploaded_view").append('<img src="'+editUploadedFile+'" />').addClass("show");
			},3500);
		}
	});
	$(".file_remove").on("click", function(e){
		$("#edit_uploaded_view").removeClass("show");
		$("#edit_uploaded_view").find("img").remove();
		btnOuter.removeClass("file_uploading");
		btnOuter.removeClass("file_uploaded");
	});





// Add new category button code here
$(document).ready(function(){
    $('#add_cat_btn').click(function(){
        $('.pupup-category').show();
    })
	// Add New Brand Code Here
    $('#add_brand_btn').click(function(){
        $('.popup-Brand').show();
    })
})
function clcAddNew(){
	// document.getElementById('popup-Brand').style.display="flex";
	document.getElementById('add-category').style.display="flex";
}



// Gallery Image Js code here
var imgUpload = document.getElementById('upload-img')
  , imgPreview = document.getElementById('img-preview')
  , imgUploadForm = document.getElementById('form-upload')
  , totalFiles
  , previewTitle
  , previewTitleText
  , img;

imgUpload.addEventListener('change', previewImgs, true);

function previewImgs(event) {
  totalFiles = imgUpload.files.length;
  
     if(!!totalFiles) {
    imgPreview.classList.remove('img-thumbs-hidden');
  }
  
  for(var i = 0; i < totalFiles; i++) {
    wrapper = document.createElement('div');
    wrapper.classList.add('wrapper-thumb');
    removeBtn = document.createElement("span");
    nodeRemove= document.createTextNode('x');
    removeBtn.classList.add('remove-btn');
    removeBtn.appendChild(nodeRemove);
    img = document.createElement('img');
    img.src = URL.createObjectURL(event.target.files[i]);
    img.classList.add('img-preview-thumb');
    wrapper.appendChild(img);
    wrapper.appendChild(removeBtn);
    imgPreview.appendChild(wrapper);
   
    $('.remove-btn').click(function(){
      $(this).parent('.wrapper-thumb').remove();
    });    

  }
  
  
}




