<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function store(Request $request)
    {
        // cek data
        $cek = Absen::where([
            'id_siswa' => $request->id_siswa,
            'tanggal' => date('Y-m-d')
        ])->first(); 

        if ($cek) {
            return redirect('/')->with('gagal', 'Anda sudah absen');
        }

        Absen::create([
            'id_siswa' => $request->id_siswa,
            'tanggal' => date('Y-m-d')
        ]);

        return redirect('/')->with('success', 'Silahkan masuk');
    }
}


    // public function scan(Request $request)
    // {
    //     // cek data
    //     $cek = Absen::where([
    //         'id_siswa' => $request->id_siswa,
    //         'tanggal' => date('Y-m-d')
    //     ])->first(); 

    //     if ($cek) {
    //         return redirect('/')->with('gagal', 'Anda sudah absen');
    //     }

    //     Absen::create([
    //         'id_siswa' => $request->id_siswa,
    //         'tanggal' => date('Y-m-d')
    //     ]);

    //     return redirect('/')->with('success', 'Silahkan masuk');
    // }
