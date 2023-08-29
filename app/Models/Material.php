<?php

namespace App\Models;

use CodeIgniter\Model;

class Material extends Model
{
    protected $table            = 'material';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'code',
        'name',
        'type',
        'buy_price',
        'supplier_id',
    ];
}
