<?= $this->extend('index'); ?>

<?= $this->section('content'); ?>
	<main>
        <div class="container-main card p-4">
            <div class="d-flex mb-4 justify-content-between align-items-center">
                <div>
                    <h4>Paket</h4>
                    <span>Daftar paket yang terdaftar</span>
                </div>
                <a href="<?= route_to('tambah-paket') ?>" class="btn btn-primary">Tambah Paket</a>
            </div>
            <div class="table-responsive">
                <table id="table-paket" class="table table-bordered">
                    <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Outlet</th>
                          <th scope="col">Harga/kg</th>
                          <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($paket as $item): ?>
                            <tr data-list="listItem<?=$item->id_paket?>">
                                <th scope="row"><?=$i++?></th>
                                <td><?= $item->nama_paket ?></td>
                                <td><?= ucwords($item->nama_outlet) ?></td>
                                <td><?= number_format($item->harga, 0,',','.') ?></td>
                                <td>
                                    <a href="<?= route_to('edit-paket', $item->id_paket) ?>" class="btn btn-warning text-white">Edit</a>
                                    <a data-id="deletePaket" href="<?= route_to('delete-paket', $item->id_paket) ?>" class="btn btn-danger">Hapus</a>
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
<script type="text/javascript" src="<?= base_url('assets/js/crud/form-paket.js') ?>"></script>
<?= $this->endSection(); ?>