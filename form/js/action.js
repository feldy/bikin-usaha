// function saveDaftarBaru() {
// 	 $("").jqBootstrapValidation({
//         preventSubmit: true,
//         submitError: function($form, event, errors) {
//             // something to have when submit produces an error ?
//             // Not decided if I need it yet
//             console.log('error');
//         },
//         submitSuccess: function($form, event) {
//             event.preventDefault(); // prevent default submit behaviour  	
//             console.log('gak error');
// 			var nama = $("#nama").val();
// 			var email = $("#email_utama").val();
// 			var password = $("#password_utama").val();
// 			var ttl = $("#tempat").val()+", "+ $("#tgl_lahir").val();
// 			var jk = $("#jk").val();
// 			var tlp = $("#tlp").val();
// 			var alamat = $("#alamat").val();
// 			console.log(nama,email,password,ttl,jk,tlp,alamat);
//      //      	$.ajax({
// 		   //      url: "../system/daftar_baru_service.php",
// 		   //      type: "POST",
// 		   //      data: {
// 		   //          nama : nama,
// 					// email : email,
// 					// password : password,
// 					// ttl : ttl,
// 					// jk : jk,
// 					// tlp : tlp,
// 					// alamat : alamat
// 		   //      },
// 		   //      cache: false,
// 		   //      success: function() {
// 		   //      },
// 		   //      error: function() {
// 		   //      },
// 		   //  });
//         }
//     });
// }