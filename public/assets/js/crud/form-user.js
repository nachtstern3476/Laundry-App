$('document').ready(function(){
	var tbl_user = $("#table-user").DataTable({"sDom": 'ftp',"lengthChange": false,"pageLength":5})
	$('#outlet').select2({theme: 'bootstrap4'});
	let namaError = $('#nama-error')
	let usernameError = $('#username-error')
	let passwordError = $('#password-error')
	let outletError = $('#outlet-error')
	let roleError = $('#role-error')


	$('#addUser').submit(function(e){
		$('#addUser button').prop('disabled', true)
		e.preventDefault();
		removeError()

		let url = $(this).attr('action')
		let data = {
			'nama': $('#namaUser').val(),
			'username': $('#username').val(),
			'password': $('#password').val(),
			'id_outlet': $('#outlet').val(),
			'role': $('#role').val(),
		}
		
		ajax(url, 'POST', data).then(result=>{
			$('#addUser button').prop('disabled', false)
			let res = JSON.parse(result);
			if (res.error) {
                if (res.errorItem.nama) namaError.html(`<small><span class='text-danger'>* </span>${res.errorItem.nama}</small>`) 
                if (res.errorItem.username) usernameError.html(`<small><span class='text-danger'>* </span>${res.errorItem.username}</small>`) 
                if (res.errorItem.password) passwordError.html(`<small><span class='text-danger'>* </span>${res.errorItem.password}</small>`) 
                if (res.errorItem.id_outlet) id_outletError.html(`<small><span class='text-danger'>* </span>${res.errorItem.id_outlet}</small>`) 
                if (res.errorItem.role) roleError.html(`<small><span class='text-danger'>* </span>${res.errorItem.role}</small>`) 
            }else{
                Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status)
                .then(()=>{
                    window.location = res.url
                })
            }
		}).catch(err=>{
			$('#addUser button').prop('disabled', false)
			console.log(err);
		})
	})

	$('#editUser').submit(function(e){
		$('#editUser button').prop('disabled', true)
		e.preventDefault();
		removeError()

		let url = $(this).attr('action')
		let data = {
			'nama': $('#namaUser').val(),
			'username': $('#username').val(),
			'password': $('#password').val(),
			'id_outlet': $('#outlet').val(),
			'role': $('#role').val(),
		}

		ajax(url, 'PUT', data).then(result=>{
			$('#editUser button').prop('disabled', false)
			let res = JSON.parse(result);
			if (res.error) {
                if (res.errorItem.nama) namaError.html(`<small><span class='text-danger'>* </span>${res.errorItem.nama}</small>`) 
                if (res.errorItem.username) usernameError.html(`<small><span class='text-danger'>* </span>${res.errorItem.username}</small>`) 
                if (res.errorItem.password) passwordError.html(`<small><span class='text-danger'>* </span>${res.errorItem.password}</small>`) 
                if (res.errorItem.id_outlet) id_outletError.html(`<small><span class='text-danger'>* </span>${res.errorItem.id_outlet}</small>`) 
                if (res.errorItem.role) roleError.html(`<small><span class='text-danger'>* </span>${res.errorItem.role}</small>`) 
            }else{
                Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status)
                .then(()=>{
                    window.location = res.url
                })
            }
		}).catch(err=>{
			$('#editUser button').prop('disabled', false)
		})
	})


	function removeError() {
		namaError.html('')
		usernameError.html('')
		passwordError.html('')
		outletError.html('')
		roleError.html('')
	}
})
$('a[data-id="deleteUser"]').on('click', function(e){
	$(this).addClass('disabled');
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