<?= $this->extend('layout/sign_layout') ?>

<?= $this->section('css') ?>
    <?= $this->include('base_view/css') ?>
<?= $this->endSection() ?>
<?= $this->section('main') ?>
    <?= $this->include('base_view/nav') ?>
    <?= $this->include('sign_view/login_main') ?>
    <?= $this->include('base_view/footer') ?>
    
<?= $this->endSection() ?>
<?= $this->section('js') ?>
    <?= $this->include('base_view/js') ?>
<?= $this->endSection() ?>
<?= $this->section('custom_js') ?>
   
<?= $this->endSection() ?>