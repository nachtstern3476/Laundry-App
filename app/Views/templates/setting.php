<div class="modal fade" id="settings" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Setting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="setting" action="<?= route_to('setting') ?>">
                <div class="modal-body">
                    <?php if (session()->role == 'admin'): ?>
                        <div class="form-group">
                            <label for="changeOutlet">Pindah Outlet</label>
                            <select class="custom-select" id="changeOutlet" name="changeOutlet">
                                <option selected disabled value="">Pilih</option>
                                <?php foreach ($setting as $item): ?>
                                    <option value="<?=$item->id_outlet?>" <?php if (session()->id_outlet == $item->id_outlet): ?>selected <?php endif ?>><?= ucwords($item->nama_outlet) ?></option>
                                <?php endforeach ?>
                            </select>                            
                        </div>
                    <?php endif ?>
                    <div class="form-group">
                        <label for="pajak">Pajak</label>
                        <input type="number" class="form-control" name="pajak" id="pajak" value="<?= session()->pajak*100 ?>">
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