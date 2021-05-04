<?= $this->extend('index') ?>

<?= $this->section('content') ?>
    <main>
        <div class="content-main">
            <form id="formTransaksi" action="<?= route_to('tambah-transaksi') ?>">
                <div class="row m-0 justify-content-between">
                    <div class="col-12 col-sm mb-2 mr-0 mr-sm-2">
                        <div class="card p-4">
                            <div class="d-flex mb-4 justify-content-between align-items-center">
                                <div>
                                    <h4>Tambah Transaksi</h4>
                                    <span>Form pendaftaran transaksi baru</span>
                                </div>
                            </div>
                            <div class="d-block mb-4">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="select" id="select1" value="1" checked>
                                    <label class="custom-control-label" for="select1">Isi Otomatis</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="select" id="select2" value="0">
                                    <label class="custom-control-label" for="select2">Isi Manual</label>
                                </div>
                            </div>
                            <div class="form-group" id="fieldNama">
                                <label for="namaMember">Nama Lengkap</label>
                                <select name="namaMember" id="namaMember" class="custom-select" style="width: 100%" required>
                                    <option selected readonly value="">Pilih</option>
                                    <?php foreach($nameOption as $item) :?>
                                        <option value="<?= $item->id_member ?>" 
                                        data-alamat="<?= $item->alamat?>" 
                                        data-telp="<?= $item->telp?>"
                                        data-gender="<?= $item->gender?>"><?= $item->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 col-lg-6">
                                    <label for="noTelp">No Telp</label>
                                    <input type="tel" class="form-control" name="noTelp" id="noTelp" required>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label for="jenisKelamin">Jenis Kelamin</label>
                                    <select class="custom-select" name="jenisKelamin" id="jenisKelamin" readonly required>
                                        <option selected value="">Pilih</option>
                                        <option value="L">Laki Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm">
                        <div class="card p-4">
                            <div class="d-flex mb-4 justify-content-between align-items-center">
                                <div>
                                    <h4>Form Laundry</h4>
                                    <span>Form laundry</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paket">Pilih Paket</label>
                                <select name="paket" class="custom-select" id="paket" style="width: 100%" required>
                                    <option selected readonly value="">Pilih</option>
                                    <?php foreach($paketOption as $item) :?>
                                        <option value="<?= $item->id_paket ?>" 
                                        data-paket="<?= $item->jenis_paket ?>"
                                        data-harga="<?= $item->harga ?>"><?= $item->nama_paket ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php 
                                $length = count($jenisOption);
                                $first  = array_slice($jenisOption, $length/2);
                                $second = array_slice($jenisOption, 0, $length/2);
                             ?>
                            <div class="form-group">
                                <label for="role">Isi Paket</label>
                                <div class="row">
                                    <div class="col-6 col-sm-5 col-md-4">
                                        <?php foreach ($first as $item): ?>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" value="<?= $item->id_jenis ?>" name="paket[]" id="<?= $item->nama_jenis ?>">
                                                <label class="custom-control-label" for="<?= $item->nama_jenis ?>"><?= $item->nama_jenis ?></label>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                    <div class="col-6">
                                        <?php foreach ($second as $item): ?>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" value="<?= $item->id_jenis ?>" name="paket[]" id="<?= $item->nama_jenis ?>">
                                                <label class="custom-control-label" for="<?= $item->nama_jenis ?>"><?= $item->nama_jenis ?></label>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hargaPaket">Harga / Kg</label>
                                <input class="form-control" type="number" name="hargaPaket" id="hargaPaket" readonly>
                            </div>
                            <div class="form-group">
                                <label for="waktuAmbil">Waktu Ambil</label>
                                <input class="form-control" type="date" name="waktuAmbil" id="waktuAmbil" required>
                            </div>
                            <div class="form-group">
                                <label for="beratLaundry">Berat Laundry / Kg</label>
                                <input class="form-control" type="number" min="1" name="beratLaundry" id="beratLaundry" required>
                            </div>
                            <div class="form-group ">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="1" rows="3" class="form-control" required></textarea>
                            </div>
                            <div class="form-group ">
                                <label for="diskon">Diskon</label>
                                <a id="diskonPopover" tabindex="0" class="far fa-question-circle" style="font-size: 0.9rem" role="button" data-toggle="popover"></a>
                                <div class="input-group mb-3">
                                    <select name="diskon" class="custom-select" id="diskon" style="width: 75%">
                                        <option value="">Pilih</option>
                                    <?php foreach($diskonOption as $item) :?>
                                        <option value="<?= $item->kode_diskon ?>"><?= $item->kode_diskon ?></option>
                                    <?php endforeach ?>
                                    </select>
                                    <a id="checkDiskon" class="btn btn-warning text-white">Apply</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="totalHarga">Total Harga</label>
                                <input class="form-control" type="number" min="1" name="totalHarga" id="totalHarga" readonly>
                                <small><span class='text-danger'>* </span>Total harga sudah termasuk pajak</small>
                            </div>
                            <div class="form-group">
                                <label for="paid">Pembayaran</label>
                                <div class="d-block mb-2">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" name="bayar" id="bayarSekarang" value="1" checked>
                                        <label class="custom-control-label" for="bayarSekarang">Bayar Sekarang</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" name="bayar" id="bayarNanti" value="0">
                                        <label class="custom-control-label" for="bayarNanti">Bayar Nanti</label>
                                    </div>
                                </div>
                                <input class="form-control" type="number" min="0" name="jumlahBayar" id="jumlahBayar" required>
                            </div>
                            
                            <div class="row justify-content-end">
                                <div class="col-12 col-md-4">
                                    <button type="submit" class="btn btn-block btn-primary">Kirim</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $('#namaMember').select2({theme: 'bootstrap4'});
    let fieldNama = $('#fieldNama')
    let telp = $('#noTelp')
    let alamat = $('#alamat')
    let gender = $('#jenisKelamin')
    let diskon = 0
    let pajak = parseFloat(<?= session()->pajak ?>)
    inputMember()
    
    if ($(`input[name="select"]:checked`).val() == 1) {
        disabledInputForm()
    }
    $(`input[name="select"]`).change(function(){
        let inputOption = $(`input[name="select"]:checked`).val()
        if (inputOption == 1) {
            let content = `
                <select name="namaMember" id="namaMember" class="custom-select" style="width: 100%" required>
                    <option selected readonly disabled value="">Pilih</option>
                    <?php foreach($nameOption as $item) :?>
                        <option value="<?= $item->id_member ?>" data-id='<?= $item->id_member?>' data-alamat='<?= $item->alamat?>' data-telp='<?= $item->telp?>' data-gender='<?= $item->gender?>'><?= $item->nama ?></option>
                    <?php endforeach ?>
                </select>
            `
            disabledInputForm()
            $('#namaMember').remove()
            fieldNama.append(content)
            $('#namaMember').select2({theme: 'bootstrap4'});
        }else{
            $('#namaMember').select2('destroy')
            let content = `<input type="text" class="form-control" name="namaMember" id="namaMember" required></input>`            
            telp.prop('readonly', false).val('')
            gender.prop('disabled', false).val('')
            alamat.prop('readonly', false).val('')
            $('#namaMember').remove()
            fieldNama.append(content)
        }
        inputMember()
    })

    function disabledInputForm() {
        telp.prop('readonly', true)
        gender.prop('disabled', true)
        alamat.prop('readonly', true)
    }

    function inputMember() {
        $(`select[name="namaMember"]`).change(function(){
            let data = $(this).find(':selected')
            telp.prop('readonly', true).val(data.attr('data-telp'))
            gender.prop('disabled', true).val(data.attr('data-gender'))
            alamat.prop('readonly', true).val(data.attr('data-alamat'))
        })
    }
</script>
<script type="text/javascript" src="<?= base_url('assets/js/crud/form-transaksi.js') ?>"></script>
<?= $this->endSection() ?>