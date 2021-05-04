<?= $this->extend('index'); ?>

<?= $this->section('content'); ?>
    <main>
        <div class="content-main card p-4">
            <div class="mb-4">
                <h4>Laporan</h4>
                <span>Generate laporan mulai dari tanggal yang kamu pilih</span>
                <form id="findLaporan" action="<?= route_to('data-laporan') ?>">
                    <div class="form-row mt-3">
                        <div class="col-12 col-md-3 col-lg-2 mb-2">
                            <input type="date" class="form-control mr-sm-2" name="startDate" id="startDate" required>
                        </div>
                        <div class="col-12 col-md-3 col-lg-2 mb-2">
                            <input type="date" class="form-control mr-sm-3" name="endDate" id="endDate" required>
                        </div>           
                        <div class="col-12 col-md-3 col-lg-2">
                            <button type="submit" class="btn btn-block btn-primary">Generate</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table id="table-laporan" class="table table-bordered">
                    <thead></thead>
                    <tbody></tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
    </main>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script type="text/javascript" src="<?= base_url('assets/js/crud/laporan.js') ?>"></script>
<?= $this->endSection(); ?>