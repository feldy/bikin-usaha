var dataUndangan = [];
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
	$("#supplier").change(function(value) {
		$("#jmlOrang").html($('option:selected', this).attr('value2'));
	});
	$("#kategori_usaha").change(function(value) {
	  	$.ajax({
	        url: "system/service_impl.php",
	        type: "POST",
	        data: {
	            type: "supplier",
	            kategori_jenis: $("#kategori_usaha").val()
	        },
	        cache: false,
	        dataType : "json",
	        success: function(e) {
	        	// console.log(e);

				var result = "<option value=''>Pilih</option>";
	         	for (var i = 0; i < e.length; i++) {
	         		result += '<option value2="'+e[i].max_jumlah_pegawai+'" value="'+e[i].id+'">'+ e[i].nama+'</option>';
	         	}	

	         	$('#supplier').find('option').remove().end().append(result);
	        },
	        error: function() {
	            // Fail message
	        },
	    });
	});
	$('#myModal').on('shown.bs.modal', function() {
	    $('#msgEmail').html("");
	    $('#msgEmail').attr('class', "");
	    $("#emailEntrepreneur").val("");
	})
	$("#kirim_undangan").click(function() {
	  	$.ajax({
	        url: "system/service_impl.php",
	        type: "POST",
	        data: {
	            type: "kirim_undangan",
	            email: $("#emailEntrepreneur").val()
	        },
	        cache: false,
	        dataType : "json",
	        success: function(e) {
	        	function bersih() {
	        		$('#msgEmail').html("");
	        		$('#msgEmail').attr('class', "");
	        	}
	        	if (parseInt(e.jumlah_result) > 0) {
	        		if ($.inArray(e.id, dataUndangan) > -1) {
	        			$('#myModal').modal('toggle');
	        			return;
					}

	        		dataUndangan.push(e.id);
	  				$.unique(dataUndangan);

	        		$('#msgEmail').html("Berhasil ! <strong>"+$("#emailEntrepreneur").val()+"</strong> Telah Diundang !");
	        		$('#msgEmail').attr('class', 'alert alert-success');
	        		setTimeout(function() {
	        			$('#myModal').modal('toggle');
	        			$('#add_image').append('<img width="128px" src="upload/photo_profile/'+e.file_photo+'" alt="" class="img-thumbnail size" />');
	        			// $('#add_image').append('<button type="button" class="btn btn-default btn-circle btn-lg"><img width="64" src="upload/photo_profile/'+e.file_photo+'" alt="" /></button>');
	        		}, 1000);

	        	} else {
	        		$('#msgEmail').html("Email <strong>"+$("#emailEntrepreneur").val()+"</strong> tidak Ditemukan !");
	        		$('#msgEmail').attr('class', 'alert alert-danger');
	        	}
	        },
	        error: function() {
	            // Fail message
	        },
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