<?php

namespace App\Models;

use CodeIgniter\Model;

class Supplier extends Model
{
    protected $table            = 'supplier';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
    ];
}
