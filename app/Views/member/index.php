<?= $this->extend('index'); ?>

<?= $this->section('content') ?>
    <main>
        <div class="content-main card p-4">
            <div class="d-flex mb-4 justify-content-between align-items-center">
                <div>
                    <h4>Member</h4>
                    <span>Daftar member yang terdaftar </span>
                </div>
                <a href="<?= route_to('tambah-member') ?>" class="btn btn-primary">Tambah Member</a>
            </div>
            <div class="table-responsive">
                <table id="table-member" class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Telp</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($member as $item) : ?>
                            <tr data-list="listItem<?= $item->id_member ?>">
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $item->nama ?></td>
                                <td><?= $item->alamat ?></td>
                                <td><?= $item->telp ?></td>
                                <td><?= $item->gender == 'L' ? 'Laki Laki' : 'Perempuan'?></td>
                                <td>
                                    <a href="<?= route_to('edit-member', $item->id_member) ?>" class="btn btn-warning text-white">Edit</a>
                                    <a data-id="deleteMember" href="<?= route_to('delete-member', $item->id_member) ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script type="text/javascript" src="<?= base_url('assets/js/crud/form-member.js') ?>"></script>
<?= $this->endSection(); ?>