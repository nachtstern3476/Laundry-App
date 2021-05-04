<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>	
	<style type="text/css">
		p{
			margin: 0;
		}
		hr{
			border: 2px solid black;
		}
		h3,h5{
			margin-top: 0;
			margin-bottom: .5rem;
			line-height: 1.2;
		}
		h3{
			font-size: 1.5rem;
		}
		h5{
			font-size: 1.25rem;
		}
		main{
			margin-top: 2rem;
		}
		table{
			border-collapse: collapse;
		}
		.p-4 {
		    padding: 1.5rem !important;
		}
		.text-center{
			text-align: center;
		}
		.font-weight-bold{
			font-weight: bold;
		}
		.table{
		    width: 100%;
		    margin-bottom: 1rem;
		    color: #212529;
		}
		.table-bordered {
		    border: 1px solid #000;
		}

		.table-bordered td, .table-bordered th {
		    border: 1px solid #000;
	        border-bottom-color: #000;
	        border-bottom-style: solid;
	        border-bottom-width: 1px;
		}
		.table td, .table th {
		    padding: .75rem;
		    vertical-align: top;
		    border-top: 1px solid #000;
		}
		th {
		    text-align: inherit;
		    text-align: -webkit-match-parent;
		}
	</style>
</head>
<body>
	<div class="p-4">
		<header class="text-center">
			<h3 class="font-weight-bold">Laporan Keuangan <?= ucwords($response[0]->nama_outlet) ?></h3>
			<h5> <?= $start ?> - <?= $end ?></h5>
	    	<p><?= $response[0]->alamat_outlet ?></p>
	    	<p>Telp. <?= $response[0]->telp_outlet ?></p>
	    </header>
	    <hr>
	    <main>
	    	<table class="table table-bordered">
	    		<thead>
	    			<tr>
	                    <th scope="col">No</th>
	                    <th scope="col">Kode Invoice</th>
	                    <th scope="col">Paket</th>
	                    <th scope="col">Waktu Bayar</th>
	                    <th scope="col">Diskon</th>
	                    <th scope="col">Total Harga</th>
                	</tr>
	    		</thead>
	    		<tbody>
	    			<?php $hargaTotal=0; $i=1; foreach ($response as $item): ?>
	    				<tr>
							<th scope="row"><?= $i++ ?></th>
	                        <td><?= $item->kode_invoice ?></td>
	                        <td><?= $item->nama_paket ?></td>
	                        <td><?= date('d/m/Y', strtotime($item->tgl_bayar)) ?></td>
	                        <td><?= $item->diskon? $item->diskon.'%': '-' ?></td>
	                        <td>Rp. <?= number_format($item->harga_total,0,',','.') ?></td>
						</tr>
	    			<?php $hargaTotal+=$item->harga_total; endforeach ?>
	    		</tbody>
	    		<tfoot>
	    			<tr>
	                    <th colspan="5">Total Penghasilan</th>
	                    <td>Rp. <?= number_format($hargaTotal,0,',','.') ?></td>
	                </tr>
	    		</tfoot>
	    	</table>
	    </main>
	</div>
</body>
</html>