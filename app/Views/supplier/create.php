<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<?php 
if(session()->has('message')) {
    echo session('message');
}

if(session()->has('validation')) {
    echo session('validation')->getError();
}
?>

<?= form_open(route_to('supplier.submit')) ?>

    <?= form_input([
        'name' => 'name'
    ]) ?>

    <?= form_button([
        'type' => 'submit',
        'content' => 'save',
    ]) ?>

<?= form_close() ?>

<?= $this->endSection() ?>