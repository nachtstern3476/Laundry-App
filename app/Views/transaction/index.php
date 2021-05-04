<?= $this->extend('index'); ?>

<?= $this->section('content'); ?>
    <main>
        <div class="content-main card p-4">
            <div class="mb-4 d-flex justify-content-between align-items-center">
                <div>
                    <h4>Transaksi</h4>
                    <span>Daftar transaksi yang terdaftar</span>
                </div>
                <a href="<?= route_to('tambah-transaksi') ?>" class="btn btn-primary">Tambah Transaksi</a>
            </div>
            <div class="table-responsive">
                <table id="table-transaksi" class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Transaksi</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No Telp</th>
                        <th scope="col">Waktu Ambil</th>
                        <th scope="col">Status Proses</th>
                        <th scope="col">Status Bayar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i= 1; foreach ($transaksi as $item) : ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $item->kode_invoice ?></td>
                                <td><?= $item->nama ?></td>
                                <td><?= $item->telp ?></td>
                                <td><?= date('d-m-Y', strtotime($item->tgl_ambil)) ?></td>
                                <td>
                                    <?php if($item->status_pengerjaan == "baru" || $item->status_pengerjaan == "selesai") :?>
                                        <p class="text-primary">
                                    <?php elseif($item->status_pengerjaan == "proses") :?>
                                        <p class="text-warning">
                                    <?php elseif($item->status_pengerjaan == "diambil") :?>
                                        <p class="text-success">
                                    <?php endif ?>
                                            <?= ucfirst($item->status_pengerjaan) ?>
                                        </p>
                                </td>
                                <td>
                                    <?php if($item->status_bayar == "belum_dibayar") :?>
                                        <p class="text-danger">
                                    <?php else : ?>
                                        <p class="text-success">
                                    <?php endif ?>
                                        <?= ucwords(str_replace('_', ' ', $item->status_bayar)) ?>
                                    </p>
                                </td>
                                <td>
                                    <a href='<?= route_to('detail-transaksi', $item->id_transaksi) ?>' class="btn btn-primary w-100">Detail</a>
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
<script type="text/javascript" src="<?= base_url('assets/js/crud/form-transaksi.js') ?>"></script>
<?= $this->endSection(); ?>