$('document').ready(function() {
	var tbl_jenis = $("#table-jenis").DataTable({"sDom": 'ftp',"lengthChange": false,})

	$('#formModal').on('show.bs.modal', function(e){
		let id = $(e.relatedTarget).data('id')
		let url = $(e.relatedTarget).data('url')
		let idJenis = ''
		let namaJenis = ''

		if (id=='editJenis') {
			idJenis = $(e.relatedTarget).data('id-jenis')
			namaJenis = $(e.relatedTarget).data('jenis')
			$('.modal-title').text('Edit Jenis Paket')
		}

		let content = `
			<form id="${id}">
		      	<div class="modal-body">
			  		<input type="text" id="namaJenis" class="form-control" value="${namaJenis}" required>
			    </div>
		    	<div class="modal-footer">
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
		        	<button type="submit" class="btn btn-primary">Simpan</button>
		      	</div>
	      	</form>
		`
	
		if(id=='addJenis') $('.modal-title').text('Tambah Jenis Paket')
		$('.modal-content').append(content)
	
		$('#addJenis').submit(function(e){
			e.preventDefault()
			$('#addJenis button').prop('disabled', true)
			
			let url = '/services/jenis/'
			let data = {
				'nama_jenis': $('#namaJenis').val()
			}

			ajax(url, 'POST', data).then(result=>{
				let res = JSON.parse(result);
				$('#formModal').modal('hide')
				setTimeout(function(){
					Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status).then(()=>{window.location.reload(true)})
				}, 500)
			}).catch(err=>{
				$('#formModal').modal('hide')
				console.log(err)
			})
		})
		$('#editJenis').submit(function(e){
			e.preventDefault()
			$('#editJenis button').prop('disabled', true)

			let url = `/services/jenis/${idJenis}`
			let data = {
				'nama_jenis': $('#namaJenis').val()
			}

			ajax(url, 'PUT', data).then(result=>{
				let res = JSON.parse(result)
				$('#formModal').modal('hide')
				setTimeout(function(){
					Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status).then(()=>{window.location.reload(true)})
				}, 500)
			}).catch(err=>{
				$('#formModal').modal('hide')
				console.log(err)
			})

		})
	})

	$('#formModal').on('hidden.bs.modal', function(){
		$('form').detach()
	})

	$('#table-jenis').on('click', 'a', function(e){
		e.preventDefault()
		$(this).addClass('disabled')

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
					$(this).removeClass('disabled')
					let res = JSON.parse(result)
					Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status).then(()=>{window.location.reload(true)})
				}).catch(err=>{
					$(this).removeClass('disabled')
					console.log(err)
				})
			}else{
				$(this).removeClass('disabled');
			}
		})
	})
})
