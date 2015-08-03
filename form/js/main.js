var dataUndangan = [];
var dataUndanganProposalku = [];
var dataTambahKaryawan = [];

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
$(function() {
	$('.carousel').carousel({
        interval: 5000 //changes the speed
    });
	$('#alamat_proposal_baru').summernote({
		height: 300,
		toolbar: [
		    ['height', ['height']],
		]
	});
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
	$('#tanggalSchedule').datepicker({
	    format: "yyyy-mm-dd"
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
	});
	$('#myModal2').on('shown.bs.modal', function() {
	    $('#msgEmail2').html("");
	    $('#msgEmail2').attr('class', "");
	    $("#emailKaryawan").val("");
	});
	$('#myModalProposalkuAjukanKaryawan').on('shown.bs.modal', function() {
		dataUndanganProposalku = [];
	    $('#msgEmailProposalku').html("");
	    $('#rowAddKaryawanProposalku').html("");
	    $('#msgEmailProposalku').attr('class', "");
	    $("#emailEntrepreneurProposalku").val("");
	});
	$('#myModalProposalkuAjukanInvestor').on('shown.bs.modal', function() {
		dataUndanganProposalku = [];
	    $('#msgEmailProposalkuInvestor').html("");
	    $('#rowAddKaryawanProposalkuInvestor').html("");
	    $('#msgEmailProposalkuInvestor').attr('class', "");
	    $("#emailEntrepreneurProposalkuInvestor").val("");
	});
	$('#myModalProposalkuAddSchedule').on('shown.bs.modal', function() {
	    // $("#formAddSchedule").reset();
	    document.getElementById("formAddSchedule").reset();
	});
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
	        			$('#add_image').append('<div class="col-md-3 text-center"><div class="thumbnail"><img width="128px" src="upload/photo_profile/'+e.file_photo+'" alt="" /><div class="caption"><h3>'+e.nama+'</h3></div></div></div>');
	        			// $('#add_image').append('<img width="128px" src="upload/photo_profile/'+e.file_photo+'" alt="" class="img-thumbnail size" />');
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
	$("#setting_investor").change(function(event) {
		var value = parseInt($("#setting_investor").val());
		var result = "";

		for (var i = 0; i < value; i++) {
			result += '<div class="form-group input-group"><input id="nilaiInvest'+i+'" name="nilaiInvest[]" type="number" min="1" max="100" class="form-control" data-validation-number-message="Isi harus angka !" placeholder="%" ><span class="input-group-addon">%</span></div>';
		}
		$('#insert_input_investasi').find('div').remove().end().append(result);
		// console.log(value);
	});
	$("#btn_save_proposal").click(function() {
		var nilaiPersentase = [];
		var jumlahInvestor = parseInt($('#setting_investor').val());
		for (var i = 0; i < jumlahInvestor; i++) {
			nilaiPersentase.push($('#nilaiInvest'+i).val());
		}
		var dataSaveProposal = {
			type 			: "tambah_proposal",
			nama_proposal	: $('#nama_proposal').val(),
			supplier 		: $('#supplier').val(),
			alamat 			: $('#alamat_proposal_baru').code(),
			kota 			: $('#kota').val(),
			deskripsi 		: $('#deskripsi_proposal_baru').code(),
			data_undangan 	: dataUndangan.toString(),
			max_jumlah_investor : jumlahInvestor,
			nilai_persentase_investor : nilaiPersentase.toString(),
			nilai_gaji_pegawai : $('#nilai_gaji_pegawai').val(),
			nilai_persentase_owner : $('#nilai_investasi_owner').val()
		}
		var btnNode = this;
	   $.ajax({
	        url: "system/buat_proposal_baru_service.php",
	        type: "POST",
	        data: dataSaveProposal,
	        cache: false,
	        // dataType : "json",
	        success: function(e) {
	        	if (e.length > 0) {
	        		alert(e);
	        	} else {
		 			var nextId = $(btnNode).parents('.tab-pane').next().attr("id");
		 			// console.log(btnNode);
	  				$('[href=#'+nextId+']').tab('show');
	        	}
	        },
	        error: function() {
	            // Fail message
	        },
	    });
	});
	$("#add_undangan_karyawan_proposalku").click(function() {
	  	$.ajax({
	        url: "system/service_impl.php",
	        type: "POST",
	        data: {
	            type: "add_undangan_proposalku",
	            email: $("#emailEntrepreneurProposalku").val(),
	            proposal_id: $("#proposal_id").val()
	        },
	        cache: false,
	        dataType : "json",
	        success: function(e) {
	        	function bersih() {
	        		$('#msgEmailProposalku').html("");
	        		$('#msgEmailProposalku').attr('class', "");
	        	}
	        	console.log('e>>>>', e);
	        	if (e.status == "sudah_ditambahkan") {
	        		$('#msgEmailProposalku').html("<strong>"+$("#emailEntrepreneurProposalku").val()+"</strong> Sudah pernah mengajukan, Silahkan menunggu persetujuan !");
	        		$('#msgEmailProposalku').attr('class', 'alert alert-warning');
	        	} else {
		        	if (parseInt(e.jumlah_result) > 0) {
		        		if ($.inArray(e.id, dataUndanganProposalku) > -1) {
		        			// $('#myModal').modal('toggle');
		        			$('#msgEmailProposalku').html("<strong>"+$("#emailEntrepreneurProposalku").val()+"</strong> Telah Ditambahkan sebelumnya !");
		        			$('#msgEmailProposalku').attr('class', 'alert alert-warning');
		        			return;
						}

		        		dataUndanganProposalku.push(e.id);
		  				$.unique(dataUndanganProposalku);

		        		$('#msgEmailProposalku').html("Berhasil ! <strong>"+$("#emailEntrepreneurProposalku").val()+"</strong> Telah Diundang !");
		        		$('#msgEmailProposalku').attr('class', 'alert alert-success');
		        		setTimeout(function() {
		        			// $('#myModal').modal('toggle');
		        			$('#rowAddKaryawanProposalku').append('<div class="col-lg-3" style="max-width: 150px;"><div class="thumbnail"><img src="upload/photo_profile/'+e.file_photo+'" alt="" /><div class="caption">'+e.nama+'</div></div></div>');
		        		}, 1000);

		        	} else {
		        		$('#msgEmailProposalku').html("Email <strong>"+$("#emailEntrepreneurProposalku").val()+"</strong> tidak Ditemukan !");
		        		$('#msgEmailProposalku').attr('class', 'alert alert-danger');
		        	}
	        	}
	        },
	        error: function() {
	            // Fail message
	        },
	    });
	});
	$("#add_undangan_investor_proposalku").click(function() {
	  	$.ajax({
	        url: "system/service_impl.php",
	        type: "POST",
	        data: {
	            type: "add_undangan_investor_proposalku",
	            email: $("#emailEntrepreneurProposalkuInvestor").val(),
	            proposal_id: $("#proposal_id").val()
	        },
	        cache: false,
	        dataType : "json",
	        success: function(e) {
	        	function bersih() {
	        		$('#msgEmailProposalkuInvestor').html("");
	        		$('#msgEmailProposalkuInvestor').attr('class', "");
	        	}
	        	console.log('e>>>>', e);
	        	if (e.status == "sudah_ditambahkan") {
	        		$('#msgEmailProposalkuInvestor').html("<strong>"+$("#emailEntrepreneurProposalkuInvestor").val()+"</strong> Sudah pernah mengajukan, Silahkan menunggu persetujuan !");
	        		$('#msgEmailProposalkuInvestor').attr('class', 'alert alert-warning');
	        	} else {
		        	if (parseInt(e.jumlah_result) > 0) {
		        		if ($.inArray(e.id, dataUndanganProposalku) > -1) {
		        			// $('#myModal').modal('toggle');
		        			$('#msgEmailProposalkuInvestor').html("<strong>"+$("#emailEntrepreneurProposalkuInvestor").val()+"</strong> Telah Ditambahkan sebelumnya !");
		        			$('#msgEmailProposalkuInvestor').attr('class', 'alert alert-warning');
		        			return;
						}

		        		dataUndanganProposalku.push(e.id);
		  				$.unique(dataUndanganProposalku);

		        		$('#msgEmailProposalkuInvestor').html("Berhasil ! <strong>"+$("#emailEntrepreneurProposalkuInvestor").val()+"</strong> Telah Diundang !");
		        		$('#msgEmailProposalkuInvestor').attr('class', 'alert alert-success');
		        		setTimeout(function() {
		        			// $('#myModal').modal('toggle');
		        			$('#rowAddKaryawanProposalkuInvestor').append('<div class="col-lg-3" style="max-width: 150px;"><div class="thumbnail"><img src="upload/photo_profile/'+e.file_photo+'" alt="" /><div class="caption">'+e.nama+'</div></div></div>');
		        		}, 1000);

		        	} else {
		        		$('#msgEmailProposalkuInvestor').html("Email <strong>"+$("#emailEntrepreneurProposalkuInvestor").val()+"</strong> tidak Ditemukan !");
		        		$('#msgEmailProposalkuInvestor').attr('class', 'alert alert-danger');
		        	}
	        	}
	        },
	        error: function() {
	            // Fail message
	        },
	    });
	});
	$("#kirim_undangan_karyawan_proposalku").click(function() {
		if (dataUndanganProposalku.length == 0) {
			alert('Belum ada User yang di pilih');
			return;
		}
	  	$.ajax({
	        url: "system/service_impl.php",
	        type: "POST",
	        data: {
	            type: "kirim_undangan_proposalku",
	            email: dataUndanganProposalku,
	            tipe: "PEGAWAI",
	            owner: $('#id_owner').val(),
	            proposal_id: $('#proposal_id').val()
	        },
	        cache: false,
	        // dataType : "json",
	        success: function(e) {
	        	// console.log("<>><><><><><><><><><><<><><><><><><><><", e.length);
	        	if (e.length > 0) { //gagal
	        		alert("Proses gagal");
	        	} else {
	        		alert("Entrepreneur berhasil di ajukan !");
	        		window.location.reload()
	        	}
	        },
	        error: function(e) {
	        	// console.log("<GAGAL>><><><><><><><><><><<><><><><><><><><", e);
	            // Fail message
	        }
	    });
	});
	$("#kirim_undangan_investor_proposalku").click(function() {
		if (dataUndanganProposalku.length == 0) {
			alert('Belum ada User yang di pilih');
			return;
		}
	  	$.ajax({
	        url: "system/service_impl.php",
	        type: "POST",
	        data: {
	            type: "kirim_undangan_investor_proposalku",
	            email: dataUndanganProposalku,
	            tipe: "INVESTOR",
	            owner: $('#id_owner').val(),
	            proposal_id: $('#proposal_id').val()
	        },
	        cache: false,
	        // dataType : "json",
	        success: function(e) {
	        	// console.log("BERHASIL >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>", e);
	        	if (e.length > 0) { //gagal
	        		alert("Proses gagal");
	        	} else {
	        		alert("Entrepreneur berhasil di undang !");
	        		window.location.reload()
	        	}
	        },
	        error: function(e) {
	            // Fail message
	            console.log("ERROR>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>", e);
	        }
	    });
	});
	$("#download_draft_proposalku").click(function(e) {
		// console.log($("#doc_id").val());
	    e.preventDefault();  //stop the browser from following
	    window.location.href = 'upload/document/'+$("#doc_id").val();
	});
	$("#input-chat").keypress(function(event) {
		if (event.which == 13 ) {
		    $('#btn-chat').click()
		 }
	});
	$("#btn-chat").click(function() {
	  	$.ajax({
	        url: "system/service_impl.php",
	        type: "POST",
	        data: {
	            type: "chat",
	            message: $('#input-chat').val(),
	            proposal_id: $('#proposal_id').val()
	        },
	        cache: false,
	        dataType : "json",
	        success: function(e) {
	            // Successed message
	            // console.log('Y: ', e);
	            $('#input-chat').val('');
	            $('#input-chat').focus();
	            var position = "left";
	            var count = 0;
	            var content = "";
	            for (var i = 0; i < e.length; i++) {
					count++;
					if (count % 2 == 0) {
						//genap
						position = "left";
					} else {
						position = "right";
					}

					content += "<li tabindex='1' class='"+position+" clearfix'>"+
								    "<span class='chat-img pull-"+position+"'>"+
								        "<img width='50' src='upload/photo_profile/"+e[i].file_photo+"' alt='User Avatar' class='img-circle' />"+
								    "</span>"+
								    "<div class='chat-body clearfix'>"+
								        "<div class='header'>"+
								            "<strong class='primary-font'>"+e[i].nama_entrepreneur+"</strong>"+
								            "<small class='pull-right text-muted'>"+
								                // "<i class='fa fa-clock-o fa-fw'></i> <span data-livestamp='"+e[i].tanggal+"'></span>"+
								            "</small>"+
								        "</div>"+
								        "<p>"+e[i].message+"</p>"+
								    "</div>"+
								"</li>"; 
					
	            }
				$('#content_chat_proposalku').html("");
				$('#content_chat_proposalku').html(content);

				var u =  $('li.clearfix').last()[0];
				u.scrollIntoViewIfNeeded();
	        },
	        error: function(e) {
	            // Fail message
	            console.log('N: ', e);
	        }
	    });
	});
});

