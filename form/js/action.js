function sep() {
    // allow numbers, a comma or a dot
    var v= $(this).val(), vc = v.replace(/[^0-9,\.]/, '');
    if (v !== vc)        
        $(this).val(vc);
}

// $("#jumlah_pegawai").on("input", sep);
$("#no_tlp").on("input", sep);
$("#tlp").on("input", sep);

$("#nilai_investasi_owner").number(true);
$("#nilai_gaji_pegawai").number(true);
$("#setting_investor").number(true);
$("#jumlah_pegawai").number(true);
$("#modal").number(true);