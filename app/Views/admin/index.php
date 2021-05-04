<?= $this->extend('index'); ?>
<?= $this->section('content'); ?>
    <main>
        <div class="content-header d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-weight-bold">Dashboard</h2>
            <a href="<?= route_to('laporan') ?>" class="btn bg-primary text-white">Cetak Laporan</a>
        </div>            
        <div class="content-card row">
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="row no-gutters">
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Member</h5>
                                <h2><?= $totalMember ?></h2>
                                <p class="card-text mt-2">Jumlah member yang terdaftar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="row no-gutters">
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Outlets</h5>
                                <h2><?= $totalOutlet ?></h2>
                                <p class="card-text mt-2">Jumlah outlet yang terdaftar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="row no-gutters">
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Transaksi</h5>
                                <h2><?= $totalTransaksi ?></h2>
                                <p class="card-text mt-2">Jumlah transaksi yang terdaftar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-main card p-4">
            <div class="mb-4 d-flex justify-content-between align-items-center">
                <div>
                    <h4>Transaksi</h4>
                    <span>List transaksi yang belum selesai</span>
                </div>
                <a href="<?= route_to('tambah-transaksi') ?>" class="btn btn-primary">Tambah Transaksi</a>
            </div>
            <div class="table-responsive">
                <table id="trans-dash" class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Invoice</th>
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
<script type="text/javascript">
    $('#trans-dash').DataTable({"sDom": 't',"lengthChange": false})
</script>
<?= $this->endSection(); ?>