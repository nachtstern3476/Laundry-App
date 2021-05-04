<?= $this->extend('index'); ?>

<?= $this->section('content'); ?>
	<main>
        <div class="container-main card p-4">
            <div class="d-flex mb-4 justify-content-between align-items-center">
                <div>
                    <h4>Diskon</h4>
                    <span>Daftar diskon yang terdaftar</span>
                </div>
                <a href="<?= route_to('tambah-diskon') ?>" class="btn btn-primary">Tambah Diskon</a>
            </div>
            <div class="table-responsive">
                <table id="table-diskon" class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Diskon</th>
                            <th scope="col">Kode Diskon</th>
                            <th scope="col">Diskon</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Selesai</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $i=1; foreach ($diskon as $item): ?>
                        <tr data-list="listItem<?=$item->id_diskon?>">
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $item->nama_diskon ?></td>
                            <td><?= $item->kode_diskon ?></td>
                            <td><?= $item->diskon ?>%</td>
                            <td><?= date('d-m-Y', strtotime($item->tgl_mulai)) ?></td>
                            <td><?= date('d-m-Y', strtotime($item->tgl_selesai)) ?></td>
                            <td>
                                <a href="<?= route_to('edit-diskon', $item->id_diskon) ?>" class="btn btn-warning text-white">Edit</a>                                
                                <a data-id="deleteDiskon" href="<?= route_to('delete-diskon', $item->id_diskon) ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    	<?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main> 
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script type="text/javascript" src="<?= base_url('assets/js/crud/form-diskon.js') ?>"></script>
<?= $this->endSection(); ?>