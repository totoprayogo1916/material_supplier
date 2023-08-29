<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Material extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' =>'int',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'code' => [
                'type' =>'varchar',
                'constraint' => 100,
            ],
            'name' => [
                'type' =>'varchar',
                'constraint' => 100,
            ],
            'type' => [
                'type' =>'enum',
                'constraint' => ['Fabric', 'Jeans', 'Cotton'],
            ],
            'buy_price' => [
                'type' => 'integer',
                'constraint' => 100,
                'unsigned' => true,
            ],
            'supplier_id' => [
                'type' => 'integer',
                'constraint' => 11,
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('material');

        $this->forge->addField([
            'id' => [
                'type' => 'integer',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => '100'
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('supplier');
    }

    public function down()
    {
        $this->forge->dropTable('material');
        $this->forge->dropTable('supplier');
    }
}
