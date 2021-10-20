<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel_12200801 extends Model
{
    protected $DBGroup              = 'koneksiku';
    protected $table                = 'pengguna_12200801';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $returnType           = 'array';
    protected $protectFields        = true;
    protected $allowedFields        = ['nama', 'passwword'];

}
