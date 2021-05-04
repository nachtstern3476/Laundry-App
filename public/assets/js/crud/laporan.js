$('document').ready(function() {
	$('#findLaporan').submit(function(e){
		$('#findLaporan').prop('disabled', true)
		e.preventDefault()
		removeTable()

		let url = $(this).attr('action')
		let data = {
			'startDate': $('#startDate').val(),
			'endDate': $('#endDate').val(),
		}

		ajax(url, 'POST', data).then(result=>{
			let res = JSON.parse(result)
			if (res.error) {
				return Swal.fire('Error', 'Data tidak ditemukan, harap masukan jenjang waktu dengan benar', 'error')
			}

			if (!res.length) {
				return Swal.fire('Error', 'Tidak ada transaksi di rentang tanggal tersebut', 'error')
			}

			let totalHarga = 0
			let tableHeader = `
				<tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Invoice</th>
                    <th scope="col">Paket</th>
                    <th scope="col">Waktu Bayar</th>
                    <th scope="col">Diskon</th>
                    <th scope="col">Total Harga</th>
                </tr>
			`
			let tableFooter = `
                <tr>
                    <th colspan="5">Total Penghasilan</th>
                    <td>Rp. 0</td>
                </tr>
			`
			let button = `
				<div class="row justify-content-end mt-3 mt-sm-3 mt-md-0">
                	<div class="col-12 col-md-4 col-lg-3">
	                    <a href="laporan/unduh-laporan?startDate=${data.startDate}&endDate=${data.endDate}" class="btn btn-block btn-success">Unduh Pdf</a>
	                </div>
	            </div>
			`
			$('#table-laporan thead').append(tableHeader)
			$('#table-laporan tfoot').append(tableFooter)
			$('.content-main').append(button)
			let j = 1
			res.forEach(function(val, i) {
				let content = `
					<tr>
						<th scope="row">${j++}</th>
                        <td>${val.kode_invoice}</td>
                        <td>${val.nama_paket}</td>
                        <td>${val.tgl_bayar}</td>
                        <td>${val.diskon?val.diskon+'%':'-'}</td>
                        <td>Rp. ${rupiahFormat(val.harga_total)}</td>
					</tr>
				`
				totalHarga+=parseInt(val.harga_total)
				$('#table-laporan tfoot td').text('Rp. '+rupiahFormat(totalHarga))
				$('#table-laporan tbody').append(content)
				console.log(val)
			})

			$('#findLaporan').prop('disabled', false)
		}).catch(err=>{
			$('#findLaporan').prop('disabled', false)
			Swal.fire('Error', 'Data tidak ditemukan', 'error')
			console.log(err)
		})
	})

	function removeTable() {
		$('#table-laporan thead').empty()
		$('#table-laporan tbody').empty()
		$('#table-laporan tfoot').empty()
		if ($('.content-main').children().length == '3') {			
			$('.content-main').children().last().remove()
		}
	}
})