<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/select2-bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/sweetalert2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <title><?= esc($title) ?></title>
</head>
<body>
    <?= $this->include('templates/sidebar'); ?>
    
    <div class="main-content">
        <header class="justify-content-between">
            <div class="menu-toggle">
                <label for="sidebar-toggle">
                    <i class="fas fa-bars"></i>
                </label>
            </div>
            <?php if (session()->role == 'admin' || session()->role == 'owner'): ?>
                <div class="configuration">
                    <button class="btn border-light btn-outline-secondary" data-id="addJenis" data-toggle="modal" data-target="#settings">
                        <i class="fas fa-cog"></i>
                    </button>
                </div>
            <?php endif ?>
        </header>
        <?= $this->renderSection('content'); ?>
    </div>
    <label for="sidebar-toggle" class="body-label"></label>

    <?php if (session()->role == 'admin' || session()->role == 'owner'): ?>
        <?= $this->include('templates/setting') ?>
    <?php endif ?>
</body>
<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/sweetalert2/sweetalert2.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/datatables/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/select2/select2.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/app.js') ?>"></script>
<?= $this->renderSection('script'); ?>
</html>