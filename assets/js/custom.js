$('#btn-cek-ongkir').click(function(e){
    var can_submit = true;
    e.preventDefault();
    
    if($(this).hasClass('disabled')){
        alert('Mohon tunggu...');
    }

    if(can_submit==true){
        $(this).addClass('disabled');
        $('#hasil-ongkir-wrapper').html('<b>Mohon tunggu...</b>');

        var a_id = $('#kota-asal > option:selected').val();
        var t_id = $('#kota-tujuan > option:selected').val();
        var b = $('#berat').val();

        if(a_id=="" || t_id=="" || b==""){
            $('#hasil-ongkir-wrapper').html('<div class="alert alert-danger"><h4>Semua field harus diisi!</h4></div>');
            $('#btn-cek-ongkir').removeClass('disabled');
        }
        else{
            // ajax
        	$.ajax({
                type : "POST",
                url : 'cek_ongkir',
                data : {kota_asal: a_id, kota_tujuan: t_id, berat: b}
            }).done(function (response, textStatus, jqXHR) {
            	if(response===""){
                    $("#hasil-ongkir-wrapper").html('<div class="alert alert-danger"><h4>Input berat barang tidak valid!</h4></div>');    
                }
                else{
                    $("#hasil-ongkir-wrapper").html(response);
                }
                $('#btn-cek-ongkir').removeClass('disabled');
            }).fail(function (jqXHR, textStatus, errorThrown) {
            	if(jqXHR.status==500){
                    err_sts = jqXHR.status + ' (' + jqXHR.statusText + ')';
                    err_msg = textStatus;
                }
                else{
                    err_sts = jqXHR.status + ' (' + jqXHR.statusText + ')';
                    err_msg = errorThrown;
                }
                
            	$("#hasil-ongkir-wrapper").html('Error Status: '+err_sts+'<br>'+'Error Message: '+'<br>'+err_msg);
                $('#btn-cek-ongkir').removeClass('disabled');
        	});
        }
    }
});


$('#btn-cek-resi').click(function(e){
    e.preventDefault();

    $(this).addClass('disabled');
    $('#hasil-resi-wrapper').html('<b>Mohon tunggu...</b>');

    var r = $('#resi').val();

    if(r==""){
        $('#hasil-resi-wrapper').html('<div class="alert alert-danger"><h4>Nomor resi harus diisi!</h4></div>');
        $('#btn-cek-resi').removeClass('disabled');
    }
    else{
        // ajax
        $.ajax({
            type : "POST",
            url : 'cek_resi',
            data : {nomor_resi: r}
        }).done(function (response, textStatus, jqXHR) {
            if(response===""){
                $("#hasil-resi-wrapper").html('<div class="alert alert-danger"><h4>Input nomor resi tidak valid!</h4></div>');    
            }
            else{
                $("#hasil-resi-wrapper").html(response);
            }
            $('#btn-cek-resi').removeClass('disabled');
        }).fail(function (jqXHR, textStatus, errorThrown) {
            if(jqXHR.status==500){
                err_sts = jqXHR.status + ' (' + jqXHR.statusText + ')';
                err_msg = textStatus;
            }
            else{
                err_sts = jqXHR.status + ' (' + jqXHR.statusText + ')';
                err_msg = errorThrown;
            }
            
            $("#hasil-resi-wrapper").html('Error Status: '+err_sts+'<br>'+'Error Message: '+'<br>'+err_msg);
            $('#btn-cek-resi').removeClass('disabled');
        });
    }
});