<?php

namespace App\Database\Seeds;

use App\Models\PenggunaModel_12200801;
use CodeIgniter\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'       =>'ZAKI_FADIRAH',
                'password'   => md5('12200801')
            ],
            [
                'nama'       =>'admin',
                'password'   => md5('12345')
            ],
            [
                'nama'       =>'12200801',
                'password'   => md5('ZAKI_FADIRAH')
            ]
        ];
        $p = new PenggunaModel_12200801();
        $p->insertBatch($data);
        
    }
}
