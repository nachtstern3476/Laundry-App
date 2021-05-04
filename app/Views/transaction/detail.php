<?= $this->extend('index'); ?>

<?= $this->section('content'); ?>
    <main>
        <div class="content-main">
            <div class="row">
                <div class="col-12 col-sm mb-3 mr-0 mr-sm-2">
                    <div class="card p-4 mb-3">
                        <h4 class="mb-3"><?= $dataTransaksi->kode_invoice ?></h4>
                        <div class="form-group">
                            <label for="namaMember">Nama Lengkap</label>
                            <input class="form-control" id="namaMember" value="<?= $dataTransaksi->nama ?>"disabled>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-lg-6">
                                <label for="noTelp">No Telp</label>
                                <input class="form-control" id="noTelp" value="<?= $dataTransaksi->telp ?>" disabled>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label for="jenisKelamin">Jenis Kelamin</label>
                                <input class="form-control" id="jenisKelamin" value="<?= $dataTransaksi->gender == 'L' ? 'Laki Laki' : 'Perempuan'?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input class="form-control" id="alamat" value="<?= $dataTransaksi->alamat ?>" disabled>
                        </div>
                    </div>
                    <div class="card p-4">
                        <div class="form-group">
                            <label for="namaPaket">Nama Paket</label>
                            <input class="form-control" value="<?= $dataTransaksi->nama_paket ?>" id="namaPaket" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tanggalAmbil">Tanggal Ambil</label>
                            <input class="form-control" id="tanggalAmbil" value="<?= date('d-m-Y', strtotime($dataTransaksi->tgl_ambil)) ?> "disabled>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea id="keterangan" cols="1" rows="3" class="form-control" disabled><?= $dataTransaksi->keterangan ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm">
                    <div class="card p-4">
                        <div class="form-row">
                            <div class="form-group col-12 col-lg">
                                <label for="qty">Berat Laundry / Kg</label>
                                <input class="form-control" value="<?= $dataTransaksi->qty ?>" id="qty" disabled>
                            </div>
                            <?php if ($dataTransaksi->diskon): ?>
                                <div class="form-group col-12 col-lg-6">
                                    <label for="diskonDetail">Diskon</label>
                                    <input class="form-control" value="<?= $dataTransaksi->diskon ?>" id="diskonDetail" disabled>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="hargaTotal">Harga Total</label>
                            <input class="form-control" value="<?= $dataTransaksi->harga_total ?>" id="hargaTotal" disabled>
                        </div>
                        <div class="form-group">
                            <label for="namaUser">Status Bayar</label>
                            <input type="text" class="form-control" name="namaUser" value="<?= ucfirst(str_replace('_', ' ', $dataTransaksi->status_bayar)) ?>" id="namaUser" value="Lunas" disabled>
                        </div>
                        <div class="form-group">
                            <label for="namaUser">Status Pengerjaan</label>
                            <div class="progress" style="height: 25px;">
                                <?php if ($dataTransaksi->status_pengerjaan == 'baru') :?>
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                <?php elseif ($dataTransaksi->status_pengerjaan == 'proses') :?>
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                <?php elseif ($dataTransaksi->status_pengerjaan == 'selesai') :?>
                                <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                <?php else:?>
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                <?php endif?>
                                    <?= ucfirst($dataTransaksi->status_pengerjaan) ?>
                                </div>
                            </div>
                        </div>
                        <?php if ($dataTransaksi->status_pengerjaan != 'diambil') :?>
                            <div class="form-row justify-content-lg-end">
                                <div class="form-group col-12 col-md">
                                    <?php if ($dataTransaksi->status_pengerjaan == 'baru') :?>
                                        <a id="editProses" data-id='2' href="<?= route_to('edit-transaksi', $dataTransaksi->id_transaksi, 2) ?>" class="btn btn-warning text-white w-100">Update Status Menjadi Proses</a>
                                    <?php elseif ($dataTransaksi->status_pengerjaan == 'proses') :?>
                                        <a id="editProses" data-id='3' href="<?= route_to('edit-transaksi', $dataTransaksi->id_transaksi, 3) ?>" class="btn btn-primary w-100">Update Status Menjadi Selesai</a>
                                    <?php else:?>
                                        <a id="editProses" data-id='4' href="<?= route_to('edit-transaksi', $dataTransaksi->id_transaksi, 4) ?>" class="btn btn-success w-100">Update Status Menjadi Diambil</a>
                                    <?php endif?>
                                </div>
                                <?php if ($dataTransaksi->status_bayar == 'belum_dibayar') :?>
                                <div class="form-group col-12 col-md-3">
                                    <button class="btn btn-warning text-white w-100" data-toggle="modal" data-target="#formBayar">Bayar</button>
                                </div>
                                <?php endif?>
                            </div>
                        <?php endif?>
                        <div class="form-group">
                            <a class="btn btn-secondary w-100" href="<?= route_to('cetak-invoice', $dataTransaksi->id_transaksi) ?>">Cetak resi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <?php if ($dataTransaksi->status_bayar == 'belum_dibayar') :?>
    <div class="modal fade" id="formBayar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bayar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editBayar" action="<?= route_to('bayar-transaksi', $dataTransaksi->id_transaksi) ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="bayar">Jumlah Bayar</label>
                            <input type="number" class="form-control" name="bayar" id="bayar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif?>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script type="text/javascript" src="<?= base_url('assets/js/crud/form-transaksi.js') ?>"></script>
<?= $this->endSection(); ?>