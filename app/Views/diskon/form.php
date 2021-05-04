<?= $this->extend('index'); ?>

<?= $this->section('content'); ?>
	<main>
        <div class="content-main">
            <form id="<?= $id ?>" action="<?= $action ?>">
                <div class="row m-0 justify-content-between">
                    <div class="col-12 col-sm mb-2 mr-0 mr-sm-2">
                        <div class="card p-4">
                            <div class="d-flex mb-4 justify-content-between align-items-center">
                                <div>
                                    <h4><?= $subtitle ?></h4>
                                    <span><?= $infotitle ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="namaDiskon">Nama Diskon</label>
                                <?php if ($infoDiskon): ?>
                                <input type="text" class="form-control" name="namaDiskon" id="namaDiskon" value="<?=ucwords($infoDiskon->nama_diskon)?>">
                                <?php else: ?>
                                <input type="text" class="form-control" name="namaDiskon" id="namaDiskon">
                                <?php endif ?>
                                <span id="nama-error"></span>
                            </div>
                            <div class="form-group">
                                <label for="kode">Kode Diskon</label>
                                <?php if ($infoDiskon): ?>
                                <input type="tel" class="form-control" name="kode" id="kode" style="text-transform:uppercase" value="<?=ucwords($infoDiskon->kode_diskon)?>">
                                <?php else: ?>
                                <input type="tel" class="form-control" name="kode" id="kode" style="text-transform:uppercase">
                                <?php endif ?>
                                <span id="kode-error"></span>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <?php if ($infoDiskon): ?>
                                <textarea name="keterangan" id="keterangan" cols="1" rows="3" class="form-control"><?= $infoDiskon->keterangan ?></textarea>
                                <?php else: ?>
                                <textarea name="keterangan" id="keterangan" cols="1" rows="3" class="form-control"></textarea>
                                <?php endif ?>
                                <span id="keterangan-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm">
                        <div class="card p-4">
                            <div class="form-group">
                                <label for="waktuMulai">Tanggal Mulai</label>
                                <?php if ($infoDiskon): ?>
                                <input class="form-control" type="date" name="waktuMulai" id="waktuMulai" value="<?= date('Y-m-d', strtotime($infoDiskon->tgl_mulai)) ?>">
                                <?php else: ?>
                                <input class="form-control" type="date" name="waktuMulai" id="waktuMulai">
                                <?php endif ?>
                                <span id="tanggalM-error"></span>
                            </div>
                            <div class="form-group">
                                <label for="waktuSelesai">Tanggal Selesai</label>
                                <?php if ($infoDiskon): ?>
                                <input class="form-control" type="date" name="waktuSelesai" id="waktuSelesai" value="<?= date('Y-m-d', strtotime($infoDiskon->tgl_mulai)) ?>">
                                <?php else: ?>
                                <input class="form-control" type="date" name="waktuSelesai" id="waktuSelesai">
                                <?php endif ?>
                                <span id="tanggalS-error"></span>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 col-lg-6">
                                    <label for="diskon">Diskon 
                                    </label>
                                    <a id="diskonPopover" tabindex="0" class="far fa-question-circle" style="font-size: 0.9rem" role="button" data-toggle="popover"></a>
                                    <?php if ($infoDiskon): ?>
                                    <input class="form-control" type="number" min="1" name="diskon" id="diskon" value="<?= $infoDiskon->diskon ?>">    
                                    <?php else: ?>
                                    <input class="form-control" type="number" min="1" name="diskon" id="diskon">
                                    <?php endif ?>
                                    <span id="diskon-error"></span>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label for="syarat">Syarat Diskon</label>
                                    <a id="syaratPopover" tabindex="0" class="far fa-question-circle" style="font-size: 0.9rem" role="button" data-toggle="popover"></a>
                                    <?php if ($infoDiskon): ?>
                                    <input class="form-control" type="number" min="1" name="syarat" id="syarat" value="<?= $infoDiskon->syarat ?>">
                                    <?php else: ?>                                        
                                    <input class="form-control" type="number" min="1" name="syarat" id="syarat">
                                    <?php endif ?>
                                    <span id="syarat-error"></span>
                                </div>
                            </div>
                            
                            <div class="row justify-content-end">
                                <div class="col-12 col-md-4">
                                    <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>    
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script type="text/javascript" src="<?= base_url('assets/js/crud/form-diskon.js') ?>"></script>
<?= $this->endSection(); ?>