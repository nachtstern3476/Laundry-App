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
                <div class="form-group">
                    <label for="namaUser">Nama Lengkap</label>
                    <?php if ($infoUser): ?>
                    <input type="text" class="form-control" name="namaUser" id="namaUser" value="<?=ucwords($infoUser->nama)?>">
                    <?php else: ?>
                    <input type="text" class="form-control" name="namaUser" id="namaUser">
                    <?php endif ?>
                    <span id="nama-error"></span>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-6">
                        <label for="username">Username</label>
                        <?php if ($infoUser): ?>
                        <input type="text" class="form-control" name="username" id="username" value="<?=ucfirst($infoUser->username)?>">
                        <?php else: ?>
                        <input type="text" class="form-control" name="username" id="username">
                        <?php endif ?>
                        <span id="username-error"></span>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="password">Password</label>
                        <?php if ($infoUser): ?>
                        <input type="password" class="form-control" name="password" id="password" value="<?=$infoUser->password?>">
                        <?php else: ?>
                        <input type="password" class="form-control" name="password" id="password">
                        <?php endif ?>
                        <span id="password-error"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-6">
                        <label for="outlet">Outlet</label>
                        <select class="custom-select" id="outlet">
                            <option selected disabled value="">Pilih</option>                            
                            <?php foreach ($outlet as $item): ?>
                                <option 
                                    value="<?= $item->id_outlet ?>" 
                                    <?php if ($infoUser && $infoUser->id_outlet == $item->id_outlet):?>
                                        selected 
                                    <?php endif ?>>
                                    <?= $item->nama_outlet ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <span id="outlet-error"></span>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="role">Peran</label>
                        <select class="custom-select" id="role">
                            <option selected disabled value="">Pilih</option>
                            <option value="owner" <?php if ($infoUser && $infoUser->role == 'owner'): ?>
                                selected <?php endif ?>>
                                Owner
                            </option>
                            <option value="kasir" <?php if ($infoUser && $infoUser->role == 'kasir'): ?>
                                selected <?php endif ?>>
                                Kasir
                            </option>
                        </select>
                        <span id="role-error"></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </main>    
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script type="text/javascript" src="<?= base_url('assets/js/crud/form-user.js') ?>"></script>
<?= $this->endSection(); ?>