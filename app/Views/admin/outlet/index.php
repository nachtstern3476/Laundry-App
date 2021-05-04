<?= $this->extend('index'); ?>

<?= $this->section('content'); ?>
	<main>
        <div class="content-main card p-4">
            <div class="mb-4 d-flex justify-content-between align-items-center">
                <div>
                    <h4>Outlet</h4>
                    <span>Dafta outlet yang terdaftar </span>
                </div>
                <a href="<?= route_to('tambah-outlet') ?>" class="btn btn-primary">Tambah Outlet</a>
            </div>
            <div class="table-responsive">
                <table id="table-outlet" class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Telp</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($outlet as $item): ?>
                        <tr data-list="listItem<?= $item->id_outlet?>">
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= ucwords($item->nama_outlet) ?></td>
                            <td><?= ucwords($item->alamat) ?></td>
                            <td><?= $item->telp ?></td>
                            <td><?= $item->email ?></td>
                            <td>
                                <a href="<?= route_to('edit-outlet', $item->id_outlet) ?>" class="btn btn-warning text-white">Edit</a>
                                <a data-id="deleteOutlet" href="<?= route_to('delete-outlet', $item->id_outlet) ?>" class="btn btn-danger">Hapus</a>
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
<script type="text/javascript" src="<?= base_url('assets/js/crud/form-outlet.js') ?>"></script>
<?= $this->endSection(); ?>