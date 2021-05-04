$('document').ready(function(){
	var tbl_transaksi = $("#table-transaksi").DataTable({"sDom": 'ftp',"lengthChange": false,"pageLength":5})
	$('#paket').select2({theme: 'bootstrap4'});
	$('#diskon').select2({theme: 'bootstrap4', placeholder: 'Pilih', allowClear: true, debug:true});
	$('#diskonPopover').popover({placement: 'top', container: 'body', trigger: 'hover', content: 'Kosongi apabila tidak menggunakan diskon', title: 'Diskon'})

	$('#paket').change(function() {
		$('input[type="checkbox"]').prop('checked', false)
		let checkbox = $(this).find(':selected').data('paket')
		let harga = $(this).find(':selected').data('harga')
		if (checkbox.toString().length == 1) {
			$("input[type='checkbox'][value='" + checkbox + "']").prop('checked', true);
		}else{
			$("input[type='checkbox']").prop('checked', false);
			$.each(checkbox.split(','), function(i, val){
				$("input[type='checkbox'][value='" + val + "']").prop('checked', true);
			})
		}
		$('#hargaPaket').val(harga)
		hitungTotal()
	})

	$('#beratLaundry').on('keyup', function(){
		hitungTotal()
	})

	$('input[name="bayar"]').change(function(){
		if ($(this).val() == 0) {
			$('#jumlahBayar').val(null)
			$('#jumlahBayar').prop('disabled', true)
		}else{
			$('#jumlahBayar').prop('disabled', false)
		}
	})

	$('#checkDiskon').on('click', function(){
		if ($('#totalHarga').val().length) {
			let url = '/services/diskon/check'
			let kode = $('#diskon').val()
			ajax(url, 'POST', kode).then(result=>{
				let res = JSON.parse(result)
				if ($('#totalHarga').val() <= parseInt(res.syarat)) {
					return Swal.fire('Gagal', `Gagal memasangkan diskon. Syarat pemakaian diskon adalah total harga diatas ${rupiahFormat(res.syarat)}`, 'error')
					.then(()=>{
						$('#diskon').val('').trigger('change');
					})
				}
				diskon = parseFloat(res.diskon/100)
				Swal.fire('Success', `Berhasil memasangkan diskon sebesar ${res.diskon}% ke transaksi`, 'success')
				.then(()=>{
					hitungTotal()
				})
			})
		}else{
			Swal.fire('Form tidak valid', 'Harap periksa inputan form dan coba lagi', 'error')
		}
	})

	$("#diskon").change(function() {
	    if (!$(this).val()) {
	    	diskon = 0
	        hitungTotal()
	    }
	});

	$('#formTransaksi').submit(function(e){
		e.preventDefault()
		$('#formTransaksi button').prop('disabled', true)
		let data
		if($(`input[name="select"]:checked`).val() == 1){
			data = {
				'idMember': $('#namaMember').val()
			}
		}else{
			data = {
				'nama': $('#namaMember').val(),
				'alamat': $('#alamat').val(),
				'telp': $('#noTelp').val(),
				'gender': $('#jenisKelamin').val(),
			}
		}
		let url = $(this).attr('action')
		let dataLaundry = {
			'idPaket': $('#paket').val(),
			'waktuAmbil': $('#waktuAmbil').val(),
			'beratLaundry': $('#beratLaundry').val(),
			'totalHarga': $('#totalHarga').val(),
			'jumlahBayar': $('#jumlahBayar').val(),
			'keterangan': $('#keterangan').val(),
			'diskon': diskon*100,
			'pajak': pajak*100,
			'kembalian': $('#jumlahBayar').val()-$('#totalHarga').val()
		}

		ajax(url, 'POST', data, dataLaundry).then(result=>{
			$('#formTransaksi button').prop('disabled', false)
			let res = JSON.parse(result)
			Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status)
			.then(()=>{
                window.location = res.url
            })
		}).catch(err=>{
			$('#formTransaksi button').prop('disabled', false)
            console.log(err) 
		})
	})


	// ------------------------- Detail Transaksi -------------------------
	$('#bayar').attr('min', $('#hargaTotal').val())

	$('#formBayar').on('hidden.bs.modal', function (e) {
		$('#bayar').val('')
	})

	$('#editProses').on('click', function(e){
		$(this).addClass('disabled')
		e.preventDefault()

		let url = $(this).attr('href')
		if ($('#editBayar').length && $(this).data('id')==4) {			
			$(this).removeClass('disabled')
			return Swal.fire('Error', 'Harap lakukan pembayaran terlebih dahulu sebelum pengambilan laundry', 'error')
		}
		ajax(url, 'PUT').then(result=>{
			$(this).removeClass('disabled')
			let res = JSON.parse(result)
			Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status)
			.then(()=>{
				window.location.reload()
			})
		})
	})

	$('#editBayar').submit(function(e){
		$('#editBayar').prop('disabled', true)
		e.preventDefault()

		let url = $(this).attr('action')

		ajax(url, 'PUT').then(result=>{
			$('#editBayar').prop('disabled', false)
			$('#formBayar').modal('hide')
			let res = JSON.parse(result)
			Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status)
			.then(()=>{
				window.location.reload()
			})
		})
	})
})

function hitungTotal() {
    let berat = $('#beratLaundry').val()
    let hargaPaket = $('#hargaPaket').val()
    let totalElement = $('#totalHarga')
	if (berat.length && hargaPaket.length) {
	    let totalHarga = hargaPaket*berat
	    let pajakFinal = totalHarga*pajak
		if (diskon) {
			let diskonFinal = totalHarga*diskon
			totalElement.val(totalHarga-diskonFinal+pajakFinal)
		    $('#jumlahBayar').attr('min', totalElement.val()) 
		}else{
		    totalElement.val(totalHarga+pajakFinal)
		    $('#jumlahBayar').attr('min', totalElement.val()) 
		}
	}
}