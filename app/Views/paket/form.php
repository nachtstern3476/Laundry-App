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
                        <label for="namaPaket">Nama Paket</label>
                        <?php if ($infopaket): ?>
                        <input type="text" class="form-control" name="namaPaket" id="namaPaket" value="<?=$infopaket->nama_paket?>">
                        <?php else: ?>
                        <input type="text" class="form-control" name="namaPaket" id="namaPaket">
                        <?php endif ?>
                        <span id="nama-error"></span>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="noTelp">Harga / Kg</label>
                        <?php if ($infopaket): ?>
                        <input type="number" class="form-control" name="harga" id="harga" value="<?=$infopaket->harga?>">
                        <?php else: ?>
                        <input type="number" class="form-control" name="harga" id="harga">
                        <?php endif ?>
                        <span id="harga-error"></span>
                    </div>
                </div>
                <?php 
                    $length = count($jenispaket);
                    $first  = array_slice($jenispaket, $length/2);
                    $second = array_slice($jenispaket, 0, $length/2);
                 ?>
                <div class="form-group">
                    <label for="role">Jenis Paket</label>
                    <div class="row">
                        <div class="col-6 col-sm-3 col-md-2">
                            <?php foreach ($first as $item): ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="<?= $item->id_jenis ?>" name="paket[]" id="<?= $item->nama_jenis ?>" 
                                        <?php if($checked){
                                            foreach ($checked as $itemCheck) {
                                                echo $item->id_jenis == $itemCheck->id_jenis?'checked':'';
                                            }
                                        }?>
                                    >
                                    <label class="custom-control-label" for="<?= $item->nama_jenis ?>"><?= $item->nama_jenis ?></label>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="col-6">
                            <?php foreach ($second as $item): ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="<?= $item->id_jenis ?>" name="paket[]" id="<?= $item->nama_jenis ?>"
                                        <?php if($checked){
                                            foreach ($checked as $itemCheck) {
                                                echo $item->id_jenis == $itemCheck->id_jenis?'checked':'';
                                            }
                                        }?>
                                    >
                                    <label class="custom-control-label" for="<?= $item->nama_jenis ?>"><?= $item->nama_jenis ?></label>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <span id="paket-error"></span>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </main>    
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script type="text/javascript" src="<?= base_url('assets/js/crud/form-paket.js') ?>"></script>
<?= $this->endSection(); ?>