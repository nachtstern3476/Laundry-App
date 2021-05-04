<?= $this->extend('index'); ?>

<?= $this->section('content'); ?>
	<main>
        <div class="container-main card p-4">
            <div class="d-flex mb-4 justify-content-between align-items-center">
                <div>
                    <h4>Jenis Paket</h4>
                    <span>Daftar jenis paket yang terdaftar</span>
                </div>
                <button class="btn btn-primary" data-id="addJenis" data-toggle="modal" data-target="#formModal">Tambah Jenis</button>
            </div>
            <div class="table-responsive">
                <table id="table-jenis" class="table table-bordered">
                    <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $i=1; foreach ($jenis as $item): ?>
                        <tr data-list="listItem<?=$item->id_jenis?>">
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $item->nama_jenis ?></td>
                            <td>
                                <button class="btn btn-warning text-white" 
                                data-id="editJenis" 
                                data-toggle="modal" 
                                data-id-jenis="<?= $item->id_jenis ?>"
                                data-jenis="<?= $item->nama_jenis ?>"
                                data-target="#formModal">Edit</button>
                                <a data-id="deleteJenis" href="<?= route_to('delete-jenis', $item->id_jenis) ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    	<?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main> 
    <div class="modal fade" id="formModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered">
		    <div class="modal-content">
			    <div class="modal-header">
		    	    <h5 class="modal-title" id="exampleModalLabel"></h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		    </div>
	  	</div>
	</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script type="text/javascript" src="<?= base_url('assets/js/crud/form-jenis.js') ?>"></script>
<?= $this->endSection(); ?>