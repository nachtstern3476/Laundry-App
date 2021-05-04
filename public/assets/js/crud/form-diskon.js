$('document').ready(function(){
	var table_diskon = $("#table-diskon").DataTable({"sDom": 'ftp',"lengthChange": false,"pageLength":5})
	$('#diskonPopover').popover({placement: 'top', container: 'body', trigger: 'hover', content: 'Masukan jumlah potongan harga yang ingin diterapkan tanpa menggunakan simbol % dibelakangnya', title: 'Diskon'})
	$('#syaratPopover').popover({placement: 'top', container: 'body', trigger: 'hover', content: 'Potongan harga akan diterapkan apabila total dari pembayaran melebihi atau sama dengan syarat yang diterapkan', title: 'Syarat Diskon'})

	let namaError = $('#nama-error')
	let kodeError = $('#kode-error')
	let keteranganError = $('#keterangan-error')
	let tanggalmError = $('#tanggalM-error')
	let tanggalsError = $('#tanggalS-error')
	let diskonError = $('#diskon-error')
	let syaratError = $('#syarat-error')

	$('#addDiskon').submit(function(e){
		$('#addDiskon button').prop('disabled', true)
		e.preventDefault()
		removeError()

		let url = $(this).attr('action')
		let data ={
			'nama_diskon': $('#namaDiskon').val(),
			'kode_diskon': $('#kode').val().toUpperCase(),
			'diskon': $('#diskon').val(),
			'syarat': $('#syarat').val(),
			'keterangan': $('#keterangan').val(),
			'tgl_mulai': $('#waktuMulai').val(),
			'tgl_selesai': $('#waktuSelesai').val()
		}

		ajax(url, 'POST', data).then(result=>{
			$('#addDiskon button').prop('disabled', false)
			let res = JSON.parse(result)
			if (res.error) {
                if (res.errorItem.nama_diskon) namaError.html(`<small><span class='text-danger'>* </span>${res.errorItem.nama_diskon}</small>`) 
                if (res.errorItem.kode_diskon) kodeError.html(`<small><span class='text-danger'>* </span>${res.errorItem.kode_diskon}</small>`) 
                if (res.errorItem.keterangan) keteranganError.html(`<small><span class='text-danger'>* </span>${res.errorItem.keterangan}</small>`) 
                if (res.errorItem.tgl_mulai) tanggalmError.html(`<small><span class='text-danger'>* </span>${res.errorItem.tgl_mulai}</small>`) 
                if (res.errorItem.tgl_selesai) tanggalsError.html(`<small><span class='text-danger'>* </span>${res.errorItem.tgl_selesai}</small>`) 
                if (res.errorItem.diskon) diskonError.html(`<small><span class='text-danger'>* </span>${res.errorItem.diskon}</small>`) 
                if (res.errorItem.syarat) syaratError.html(`<small><span class='text-danger'>* </span>${res.errorItem.syarat}</small>`) 
            }else{
                Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status)
                .then(()=>{
	                Swal.fire({
					  	title: `Info penting`,
					  	icon: 'info',
					  	html: `Pastikan untuk menghapus diskon yang telah mencapai tanggal selesai`,
					}).then(()=>{
						window.location = res.url
					})
                })
            }

		}).catch(err=>{
			$('#addDiskon button').prop('disabled', false)
			console.log(err)
		})
	})

	$('#editDiskon').submit(function(e){
		$('#editDiskon button').prop('disabled', true)
		e.preventDefault()
		removeError()

		let url = $(this).attr('action')
		let data ={
			'nama_diskon': $('#namaDiskon').val(),
			'kode_diskon': $('#kode').val().toUpperCase(),
			'diskon': $('#diskon').val(),
			'syarat': $('#syarat').val(),
			'keterangan': $('#keterangan').val(),
			'tgl_mulai': $('#waktuMulai').val(),
			'tgl_selesai': $('#waktuSelesai').val()
		}

		ajax(url, 'PUT', data).then(result=>{
			$('#editDiskon button').prop('disabled', false)
			let res = JSON.parse(result)
			if (res.error) {
                if (res.errorItem.nama_diskon) namaError.html(`<small><span class='text-danger'>* </span>${res.errorItem.nama_diskon}</small>`) 
                if (res.errorItem.kode_diskon) kodeError.html(`<small><span class='text-danger'>* </span>${res.errorItem.kode_diskon}</small>`) 
                if (res.errorItem.keterangan) keteranganError.html(`<small><span class='text-danger'>* </span>${res.errorItem.keterangan}</small>`) 
                if (res.errorItem.tgl_mulai) tanggalmError.html(`<small><span class='text-danger'>* </span>${res.errorItem.tgl_mulai}</small>`) 
                if (res.errorItem.tgl_selesai) tanggalsError.html(`<small><span class='text-danger'>* </span>${res.errorItem.tgl_selesai}</small>`) 
                if (res.errorItem.diskon) diskonError.html(`<small><span class='text-danger'>* </span>${res.errorItem.diskon}</small>`) 
                if (res.errorItem.syarat) syaratError.html(`<small><span class='text-danger'>* </span>${res.errorItem.syarat}</small>`) 
            }else{
                Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status)
                .then(()=>{
	                Swal.fire({
					  	title: `Info penting`,
					  	icon: 'info',
					  	html: `Pastikan untuk menghapus diskon yang telah mencapai tanggal selesai`,
					}).then(()=>{
						window.location = res.url
					})
                })
            }

		}).catch(err=>{
			$('#editDiskon button').prop('disabled', false)
			console.log(err)
		})
	})

	function removeError() {
        namaError.html('')
        kodeError.html('')
        keteranganError.html('')
        tanggalmError.html('')
        tanggalsError.html('')
        diskonError.html('')
        syaratError.html('')
    }
})

$('a[data-id="deleteDiskon"]').on('click', function(e){
	$(this).addClass('disabled')
	e.preventDefault() 

	let url = $(this).attr('href') 

	Swal.fire({
	  	title: 'Apa anda yakin',
	  	text: "Data yang dihapus tidak bisa dikembalikan",
	  	icon: 'warning',
	  	showCancelButton: true,
	  	confirmButtonColor: '#3085d6',
	  	cancelButtonColor: '#d33',
	  	confirmButtonText: 'Hapus',
	  	cancelButtonText: 'Batal',
	  	reverseButtons: true,
	}).then((result) => {
		if (!result.dismiss) {
	        ajax(url, 'DELETE').then(result=>{
	            $(this).removeClass('disabled');
	            let res = JSON.parse(result) 
	            Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status)
	            .then(()=>{
	            	window.location.reload(true)
	            })
	        }).catch(err=>{
	            $(this).removeClass('disabled');
	            console.log(err) 
	        })
		}else{
			$(this).removeClass('disabled');
		}
	})
})

