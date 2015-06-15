$(function() {
	$('#summernote').summernote({
		height: 300,
		toolbar: [
		    //[groupname, [button list]]
		     
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['font', ['strikethrough', 'superscript', 'subscript']],
		    ['fontsize', ['fontsize']],
		    ['color', ['color']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['height', ['height']],
		]
	});
	$('#deskripsi_proposal_baru').summernote({
		height: 300,
		toolbar: [
		    //[groupname, [button list]]
		     
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['font', ['strikethrough', 'superscript', 'subscript']],
		    ['fontsize', ['fontsize']],
		    ['color', ['color']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['height', ['height']],
		]
	});
	$('#tanggal').datepicker({
	    format: "dd/mm/yyyy",
	    language: "id"
	});

	$(document).on('change', '.btn-file :file', function() {
	  	var input = $(this),
	     	numFiles = input.get(0).files ? input.get(0).files.length : 1,
	      	label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	  		input.trigger('fileselect', [numFiles, label]);
	});

	$(document).ready( function() {
	    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
	        
	        var input = $(this).parents('.input-group').find(':text'),
	            log = numFiles > 1 ? numFiles + ' files selected' : label;
	        
	        if( input.length ) {
	            input.val(log);
	        } else {
	            if( log ) alert(log);
	        }
	        
	    });
	});

});

function toStep1() {
	document.getElementById("_step1").className = "active";
	document.getElementById("_step2").className = "";
	document.getElementById("_step3").className = "";
	document.getElementById("_step4").className = "";
}
function toStep2() {
	document.getElementById("_step1").className = "";
	document.getElementById("_step2").className = "active";
	document.getElementById("_step3").className = "";
	document.getElementById("_step4").className = "";
}
function toStep3() {
	document.getElementById("_step1").className = "";
	document.getElementById("_step2").className = "";
	document.getElementById("_step3").className = "active";
	document.getElementById("_step4").className = "";
}
function toFinish() {
	document.getElementById("_step1").className = "";
	document.getElementById("_step2").className = "";
	document.getElementById("_step3").className = "";
	document.getElementById("_step4").className = "active";
}