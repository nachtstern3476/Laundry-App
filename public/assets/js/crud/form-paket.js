$('document').ready(function(){
	var tbl_paket = $("#table-paket").DataTable({"sDom": 'ftp',"lengthChange": false,"pageLength":5})
	let namaError = $('#nama-error')
	let hargaError = $('#harga-error')
	let paketError = $('#paket-error')

	$('#addPaket').submit(function(e){
		$('#addPaket').prop('disabled', true)
		e.preventDefault()
		removeError()

		let checkList = ''
		$('input[name="paket[]"]:checked').each(function(){checkList+= `${this.value},`})

		let url = $(this).attr('action')
		let data = {
			'nama_paket': $('#namaPaket').val(),
			'harga': $('#harga').val(),
			'jenis_paket': checkList.substring(0, checkList.length-1),
		}

		ajax(url, 'POST', data).then(result=>{
			$('#addPaket').prop('disabled', false)
			let res = JSON.parse(result)
            if (res.error) {
                if (res.errorItem.nama_paket) namaError.html(`<small><span class='text-danger'>* </span>${res.errorItem.nama_paket}</small>`) 
                if (res.errorItem.harga) hargaError.html(`<small><span class='text-danger'>* </span>${res.errorItem.harga}</small>`) 
                if (res.errorItem.jenis_paket) paketError.html(`<small><span class='text-danger'>* </span>${res.errorItem.jenis_paket}</small>`) 
            }else{
                Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status)
                .then(()=>{
                    window.location = res.url
                })
            }
		}).catch(err=>{
			$('#addPaket').prop('disabled', false)
			console.log(err)
		})
	})

	$('#editPaket').submit(function(e){
		$('#editPaket').prop('disabled', true)
		e.preventDefault()
		removeError()

		let checkList = ''
		$('input[name="paket[]"]:checked').each(function(){checkList+= `${this.value},`})

		let url = $(this).attr('action')
		let data = {
			'nama_paket': $('#namaPaket').val(),
			'harga': $('#harga').val(),
			'jenis_paket': checkList.substring(0, checkList.length-1),
		}

		ajax(url, 'PUT', data).then(result=>{
			$('#editPaket').prop('disabled', false)
			let res = JSON.parse(result)
            if (res.error) {
                if (res.errorItem.nama_paket) namaError.html(`<small><span class='text-danger'>* </span>${res.errorItem.nama_paket}</small>`) 
                if (res.errorItem.harga) hargaError.html(`<small><span class='text-danger'>* </span>${res.errorItem.harga}</small>`) 
                if (res.errorItem.jenis_paket) paketError.html(`<small><span class='text-danger'>* </span>${res.errorItem.jenis_paket}</small>`) 
            }else{
                Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status)
                .then(()=>{
                    window.location = res.url
                })
            }
		}).catch(err=>{
			$('#editPaket').prop('disabled', false)
			console.log(err)
		})
	})

	function removeError() {
		namaError.html('')
		hargaError.html('')
		paketError.html('')
	}
})
$('a[data-id="deletePaket"]').on('click', function(e){
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
	            if (res.error) return Swal.fire('Error', 'Terjadi kesalahan, harap coba lagi', 'error')
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