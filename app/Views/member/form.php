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
                        <label for="namaUser">Nama Lengkap</label>
                        <?php if ($infomember): ?>
                        <input type="text" class="form-control" name="namaUser" id="namaUser" value="<?=$infomember->nama?>">
                        <?php else: ?>
                        <input type="text" class="form-control" name="namaUser" id="namaUser">
                        <?php endif ?>
                        <span id="nama-error"></span>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="noTelp">No Telp</label>
                        <?php if ($infomember): ?>
                        <input type="tel" class="form-control" name="noTelp" id="noTelp" value="<?=$infomember->telp?>">    
                        <?php else: ?>
                        <input type="tel" class="form-control" name="noTelp" id="noTelp">
                        <?php endif ?>
                        <span id="telp-error"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-6">
                        <label for="jenisKelamin">Jenis Kelamin</label>
                        <select class="custom-select" id="jenisKelamin" name="jenisKelamin">
                            <option selected disabled value="">Pilih</option>
                            <option value="L" <?php if ($infomember && $infomember->gender == 'L'): ?>selected <?php endif ?> >Laki Laki</option>
                            <option value="P" <?php if ($infomember && $infomember->gender == 'P'): ?>selected <?php endif ?> >Perempuan</option>
                        </select>
                        <span id="gender-error"></span>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="alamat">Alamat</label>
                        <?php if ($infomember): ?>
                        <input type="text" class="form-control" name="alamat" id="alamat" value="<?=$infomember->alamat?>">
                        <?php else: ?>
                        <input type="text" class="form-control" name="alamat" id="alamat">
                        <?php endif ?>
                        <span id="alamat-error"></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </main>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script type="text/javascript" src="<?= base_url('assets/js/crud/form-member.js') ?>"></script>
<?= $this->endSection(); ?>