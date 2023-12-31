<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<?php
if (session()->has('message')) {
    echo session('message');
}
if (session()->has('validation')) {
    echo session('validation')->getErrors();
}
?>


<?= form_open(route_to('material.search'), ['method' => 'get'])  ?>

<?= form_input([
    'name' => 'query',
    'placeholder' => 'find price',
    'value' => $search
]) ?>

<?= form_button([
    'type' => 'submit',
    'content' => 'search',
]) ?>

<?= form_close() ?>
<?php if ($search) : ?>
    data found : <?= count($materials) ?>
<?php endif; ?>

<?php
$prices = 0;
?>
<hr>

<table border="1">
    <thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Type</th>
            <th>Buy price</th>
            <th>Supplier</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($materials as $material) : ?>
            <tr>
                <td><?= esc($material->code) ?></td>
                <td><?= esc($material->name) ?></td>
                <td><?= esc($material->type) ?></td>
                <td><?= esc($material->buy_price) ?></td>
                <td><?= esc(model('Supplier')->select('name')->find($material->supplier_id)->name) ?></td>
                <td><a href="<?= site_url(route_to('material.delete', $material->id)) ?>">Delete</a></td>
            </tr>
            <?php $prices += $material->buy_price ?>
        <?php endforeach; ?>
    </tbody>
</table>

<?php if ($search) : ?>
    sum all prices: <?= $prices ?>

<?php endif ?>

<?= $this->endSection() ?>