<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<?php 

if(session()->has('message')) {
    echo session('message');
}
?>

<ol>
<?php foreach ($suppliers as $supplier) : ?>
    <li><?= esc($supplier->name) ?> | <a href="<?= site_url(route_to('supplier.delete', $supplier->id)) ?>">Delete</a></li>
<?php endforeach; ?>
</ol>


<?= $this->endSection() ?>