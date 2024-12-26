<?php

namespace App\Http\Controllers;

use App\Models\Klinik;
use Illuminate\Http\Request;

class KlinikController extends Controller
{
    public function index($success = null)
    {
        $klinikler = Klinik::get();
        return view('klinikler',['klinik_data' => $klinikler,'success' => $success]);
    }

    public function add()
    {
        return view('klinikler',['new' => 1]);
    }

    public function ekle(Request $request)
    {
        $request->validate([
            'ad' => 'required|max:100',
            'telefon' => 'required|max:11',
            'adres' => 'required|max:250',
        ]);
        $data = $request->all();

        Klinik::create([
            'ad' => $data['ad'],
            'adres' => $data['adres'],
            'telefon' => $data['telefon'],
        ]);
        return redirect()->route('klinik.index',['success' => 1]);
    }

    public function guncelle($id)
    {
        $klinik = Klinik::where('klinik_id',$id)->first();
        if(!isset($klinik)) return abort(404); 

        return view('klinikler',['klinik' => $klinik]);
    }
    
    public function guncelle_post(Request $request)
    {
        $data = $request->all();

        $klinik = Klinik::where('klinik_id',$data['klinik_id'])->first();
        if(!isset($klinik)) return abort(404); 

        //whereId($klinik['id'])
        Klinik::where('klinik_id',$klinik['klinik_id'])->update([
            'ad' => $data['ad'],
            'adres' => $data['adres'],
            'telefon' => $data['telefon'],
        ]);

        return redirect()->route('klinik.index',['success' => 3]);
    }

    public function sil($id)
    {
        $klinik = Klinik::where('klinik_id',$id)->first();
        if(!isset($klinik)) return abort(404); 

        return view('klinikler',['klinik_sil' => $klinik]);
    }
    public function sil_post(Request $request)
    {
        $data = $request->all();

        $klinik = Klinik::where('klinik_id',$data['klinik_id'])->first();
        if(!isset($klinik)) return abort(404); 

        //whereId($klinik['id'])
        Klinik::where('klinik_id',$klinik['klinik_id'])->delete();

        return redirect()->route('klinik.index',['success' => 2]);
    }
}
