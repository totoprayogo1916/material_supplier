<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<?php
if (session()->has('message')) {
    echo session('message');
}

if (session()->has('validation')) {
    echo session('validation')->getError();
}
?>

<?= form_open(route_to('material.submit')) ?>

    <?= form_label('Code', 'code') ?>
    <?= form_input([
        'name' => 'code',
        'id' => 'code',
    ]) ?>
    <br>

    <?= form_label('Name', 'name') ?>
    <?= form_input([
        'name' => 'name',
        'id' => 'name',
    ]) ?>
    <br>

    <?= form_label('Type', 'type') ?>
    <?= form_dropdown([
        'name' => 'type',
        'id' => 'type',
        'options' => [
            'fabric' => 'Fabric', 
            'jeans' => 'Jeans', 
            'cotton' => 'Cotton',
        ],
    ]) ?>
    <br>

    <?= form_label('Buy Price', 'buy_price') ?>
    <?= form_input([
        'name' => 'buy_price',
        'id' => 'buy_price',
        'type' => 'number',
        'min' => '100'
    ]) ?>
    <br>

    <?= form_label('Supplier', 'supplier') ?>
    <?= form_dropdown([
        'name' => 'supplier_id',
        'id' => 'supplier',
        'options' => $supplier_options,
    ]) ?>
    <br>

    <?= form_button([
        'type' => 'submit',
        'content' => 'save',
    ]) ?>

<?= form_close() ?>

<?= $this->endSection() ?>