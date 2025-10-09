<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function profil()
    {
        $data = [
            'title' => 'Profil', 
            'nama' => 'Francis',   
            'kelas' => 'XI PPLG 2',     
            'sekolah' => 'smk raden umar said',
        ];
        return view('profil',[
            'title' =>"Profil"
        ],$data);
    }

    // public function kontak()
    // {
    //     return view('kontak');
    // }
}
