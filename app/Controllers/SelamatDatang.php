<?php
namespace App\Controllers;

/**
 * Created by VsCode
 * User : zakifdrh
 * Date: 30/09/2021
 * Time : 3:00
 */
Class SelamatDatang extends BaseController {

    public function hal_awal(){
        return 'hello saya belajar CI4';
    }
    public function beranda_login(){
        return view('halaman/login');
    }
    public function daftar_member(){
        return view('halaman/daftar_member');
    }
}
