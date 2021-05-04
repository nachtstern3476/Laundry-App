<?= $this->extend('index'); ?>

<?= $this->section('content'); ?>
	<main>
        <div class="content-main card p-4">
            <div class="mb-4 d-flex justify-content-between align-items-center">
                <div>
                    <h4>Users</h4>
                    <span>Dafta user yang terdaftar </span>
                </div>
                <a href="<?= route_to('tambah-user') ?>" class="btn btn-primary">Tambah User</a>
            </div>
            <div class="table-responsive">
                <table id="table-user" class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Outlet </th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($user as $item): ?>
                          <tr data-list='listItem<?= $item->id_user ?>'>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= ucfirst($item->username) ?></td>
                            <td><?= ucwords(str_replace('_', ' ', $item->nama)) ?></td>
                            <td><?= ucwords(str_replace('_', ' ', $item->nama_outlet)) ?></td>
                            <td>
                                <?php if ($item->role == 'kasir'): ?>
                                    <p class="text-success"><?= ucfirst($item->role) ?></p>
                                <?php else: ?>
                                    <p class="text-primary"><?= ucfirst($item->role) ?></p>
                                <?php endif ?>
                            </td>
                            <td>
                                <a href="<?= route_to('edit-user', $item->id_user) ?>" class="btn btn-warning text-white">Edit</a>
                                <a data-id="deleteUser" href="<?= route_to('delete-user', $item->id_user) ?>" class="btn btn-danger">Hapus</a>
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
<script type="text/javascript" src="<?= base_url('assets/js/crud/form-user.js') ?>"></script>
<?= $this->endSection(); ?>