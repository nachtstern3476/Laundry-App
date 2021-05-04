<?= $this->extend('index'); ?>

<?= $this->section('content'); ?>
	<main>
        <div class="content-main card p-4">
            <div class="d-flex mb-4 justify-content-between align-items-center">
                <div>
                    <h4><?= $subtitle ?></h4>
                    <span><?= $infotitle ?></span>
                </div>
            </div>
            <form id="<?= $id ?>" action="<?= $action ?>">
                <div class="form-row">
                    <div class="form-group col-12 col-md-6">
                        <label for="namaOutlet">Nama Outlet</label>
                        <?php if ($infoOutlet): ?>
                        <input type="text" class="form-control" name="namaOutlet" id="namaOutlet" value="<?=ucwords($infoOutlet->nama_outlet)?>">
                        <?php else: ?>
                        <input type="text" class="form-control" name="namaOutlet" id="namaOutlet">
                        <?php endif ?>
                        <span id="nama-error"></span>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="noTelp">No Telp</label>
                        <?php if ($infoOutlet): ?>
                        <input type="text" class="form-control" name="noTelp" id="noTelp" value="<?=$infoOutlet->telp?>">
                        <?php else: ?>
                        <input type="tel" class="form-control" name="noTelp" id="noTelp">
                        <?php endif ?>
                        <span id="telp-error"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <?php if ($infoOutlet): ?>
                    <input type="text" class="form-control" name="email" id="email" value="<?=$infoOutlet->email?>">
                    <?php else: ?>
                    <input type="email" class="form-control" name="email" id="email">
                    <?php endif ?>
                    <span id="email-error"></span>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <?php if ($infoOutlet): ?>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?=ucwords($infoOutlet->alamat)?>">
                    <?php else: ?>
                    <input type="text" class="form-control" name="alamat" id="alamat"></input>
                    <?php endif ?>
                    <span id="alamat-error"></span>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </main>    
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script type="text/javascript" src="<?= base_url('assets/js/crud/form-outlet.js') ?>"></script>
<?= $this->endSection(); ?>