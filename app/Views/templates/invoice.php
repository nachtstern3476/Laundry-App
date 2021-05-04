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
		main{
			margin-top: 2rem;
		}
		main header{
			display: flex;
		}
		.right-content{
			float: right;
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
			<h3 class="font-weight-bold">Invoice Laundry <?= ucwords($response->nama_outlet) ?></h3>
	    	<p><?= $response->alamat_outlet ?></p>
	    	<p>Telp. <?= $response->telp_outlet ?></p>
	    </header>
	    <hr>
	    <main>
	    	<header>
	    		<div class="left-content">
		    		<table>
		    			<tr>
		    				<th><h5>Kode Invoice</h5></th>
		    				<td><h5>:</h5></td>
		    				<td><h5><?= $response->kode_invoice ?></h5></td>
		    			</tr>
		    			<tr>
		    				<td>Kasir</td>
		    				<td>:</td>
		    				<td><?= $response->kasir ?></td>
		    			</tr>
		    			<tr>
		    				<td>Tanggal Ambil</td>
		    				<td>:</td>
		    				<td><?= date('d-m-Y', strtotime($response->tgl_ambil)) ?></td>
		    			</tr>
		    			<tr>
		    				<td>Tanggal Transaksi</td>
		    				<td>:</td>
		    				<td><?= date('d-m-Y', strtotime($response->created_at)) ?></td>
		    			</tr>
		    		</table>
		    	</div>
		    	<div class="right-content">
		    		<table>
		    			<tr>
		    				<th><h5>Member</h5></th>
		    			</tr>
		    			<tr>
		    				<td>Nama</td>
		    				<td>:</td>
		    				<td><?= $response->nama ?></td>
		    			</tr>
		    			<tr>
		    				<td>No Telp</td>
		    				<td>:</td>
		    				<td><?= $response->telp ?></td>
		    			</tr>
		    			<tr>
		    				<td>Alamat</td>
		    				<td>:</td>
		    				<td><?= $response->alamat ?></td>
		    			</tr>
		    		</table>
		    	</div>
	    	</header>
		    <table class="table table-bordered" style="margin-top: 1rem;">
		    	<thead>
		    		<tr>
		    			<th>No</th>
		    			<th>Paket Laundry</th>
		    			<th>Berat / Kg</th>
		    			<th>Diskon</th>
		    			<th>Pajak</th>
		    			<th>Harga</th>
		    			<th>Total Harga</th>
		    		</tr>
		    	</thead>
		    	<tbody>
		    		<tr>
		    			<td>1</td>
		    			<td><?= $response->nama_paket ?></td>
		    			<td><?= $response->qty ?></td>
		    			<td><?= $response->diskon?$response->diskon.'%':'-' ?></td>
		    			<td><?= $response->pajak ?></td>
		    			<td>Rp. <?= number_format($response->harga_paket,0,',','.') ?></td>
		    			<td>Rp. <?= number_format($response->harga_total,0,',','.') ?></td>
		    		</tr>
		    	</tbody>
			</table>
	    </main>
	</div>
</body>
</html>