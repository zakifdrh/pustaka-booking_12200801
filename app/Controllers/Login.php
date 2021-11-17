<?php
namespace App\Controllers;

use App\Models\PenggunaModel_12200801;
use Config\Services;

class Login extends BaseController{

    

    public function cekLogin(){
        $email = $this->request->getPost('email');
        $sandi = $this->request->getPost('sandi');
        return view('halaman/beranda',['email'=> $email, 'sandi' => $sandi]);
        $v = $this->validate([
            'email' => 'required',
            'sandi' => 'required'
        ], [
            'email' =>[
                'required'    => 'Email tidak boleh kosong'
            ],
            'sandi' =>[
                'required'    => 'Sandi tidak boleh kosong'
            ]
        ]);


        $this->session->set('email', $email);
        $this->session->set('sandi', $sandi);

        if( $v == false){
            $this->session->getFlashdata('validator', $this->validator);
            return redirect()->to('/Login');
        }else{

            $vl =(new PenggunaModel_12200801())->cekLogin($email, $sandi);

            if($vl == null){
                return redirect()->to('/login')->with('error','User dan sandi salah');
            }else{
                $this->session->set('sudahLogin', true);
                return redirect()->to('/beranda');
            }
        }
    }

    public function beranda(){

    }
}