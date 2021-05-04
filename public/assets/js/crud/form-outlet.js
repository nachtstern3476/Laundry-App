$('document').ready(function(){
	var tbl_outlet = $("#table-outlet").DataTable({"sDom": 'ftp',"lengthChange": false,"pageLength":5})
	let namaError = $('#nama-error')
	let telpError = $('#telp-error')
	let emailError = $('#email-error')
	let alamatError = $('#alamat-error')

	$('#addOutlet').submit(function(e) {
		$('#addOutlet button').prop('disabled', true)
		e.preventDefault()
		removeError()

		let url = $(this).attr('action')
		let data = {
			'nama_outlet': $('#namaOutlet').val(),
			'telp': $('#noTelp').val(),
			'email': $('#email').val(),
			'alamat': $('#alamat').val(),
		}

		ajax(url, 'POST', data).then(result=>{
			$('#addOutlet button').prop('disabled', false)
			let res = JSON.parse(result)
			if (res.error) {
				if (res.errorItem.nama_outlet) namaError.html(`<small><span class='text-danger'>* </span>${res.errorItem.nama_outlet}</small>`)
                if (res.errorItem.telp) telpError.html(`<small><span class='text-danger'>* </span>${res.errorItem.telp}</small>`) 
                if (res.errorItem.email) emailError.html(`<small><span class='text-danger'>* </span>${res.errorItem.email}</small>`) 
                if (res.errorItem.alamat) alamatError.html(`<small><span class='text-danger'>* </span>${res.errorItem.alamat}</small>`) 
            }else{
                Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status)
                .then(()=>{
                    window.location = res.url
            	})
            }
		}).catch(err=>{
			$('#addOutlet button').prop('disabled', false)
			console.log(err)
		})
	})

	$('#editOutlet').submit(function(e) {
		$('#editOutlet button').prop('disabled', true)
		e.preventDefault()
		removeError()

		let url = $(this).attr('action')
		let data = {
			'nama_outlet': $('#namaOutlet').val(),
			'telp': $('#noTelp').val(),
			'email': $('#email').val(),
			'alamat': $('#alamat').val(),
		}

		ajax(url, 'PUT', data).then(result=>{
			$('#editOutlet button').prop('disabled', false)
			let res = JSON.parse(result)
			if (res.error) {
				if (res.errorItem.nama_outlet) namaError.html(`<small><span class='text-danger'>* </span>${res.errorItem.nama_outlet}</small>`)
                if (res.errorItem.telp) telpError.html(`<small><span class='text-danger'>* </span>${res.errorItem.telp}</small>`) 
                if (res.errorItem.email) emailError.html(`<small><span class='text-danger'>* </span>${res.errorItem.email}</small>`) 
                if (res.errorItem.alamat) alamatError.html(`<small><span class='text-danger'>* </span>${res.errorItem.alamat}</small>`) 
            }else{
                Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status)
                .then(()=>{
                    window.location = res.url
            	})
            }
		}).catch(err=>{
			$('#editOutlet button').prop('disabled', false)
			console.log(err)
		})
	})

	function removeError() {
		namaError.html('')
		telpError.html('')
		emailError.html('')
		alamatError.html('')
	}
})

$('a[data-id="deleteOutlet"]').on('click', function(e) {
	$(this).addClass('disabled')
	e.preventDefault()

	let url = $(this).attr('href')

	Swal.fire({
	  	title: 'Apa anda yakin',
	  	text: "Semua data yang berhubungan dengan outlet ini akan dihapus dan tidak bisa dikembalikan",
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
				$(this).removeClass('disabled')
				let res = JSON.parse(result) 
				if (res.error) return Swal.fire('Error', 'Terjadi kesalahan, harap coba lagi', 'error')
	            Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status)
	            .then(()=>{
	            	window.location.reload(true)
	            })
			}).catch(err=>{
				$(this).removeClass('disabled')
				console.log(err)
			})
		}else{
			$(this).removeClass('disabled')
		}
	})
})