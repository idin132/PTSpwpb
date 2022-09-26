<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\karyawan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawans = karyawan::all();
        return view('kepegawaian.index', compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kartus = kartu::all();
        return view('kartu.create', compact('kartus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required',
            'nik'=> 'required',
            'jenis_kelamin'=> 'required',
            'tempat_lahir'=> 'required',
            'tanggal_lahir'=> 'required',
            'agama'=> 'required',
            'status'=> 'required',
            'alamat'=> 'required',
            'golongan_id'=> 'required',
            'foto'=> 'required',
        ]);

        $karyawan = karyawan::create([
            'nip' => $request->nip,
            'nik'=> $request->nik,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'tempat_lahir'=> $request->tempat_lahir,
            'tanggal_lahir'=> $request->tanggal_lahir,
            'agama'=> $request->agama,
            'status'=> $request->status,
            'alamat'=> $request->alamat,
            'golongan_id'=> $request->golongan_id,
            'foto'=> $request->foto,
        ]);

        return redirect()->route('kartusip.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kartur = kartu::oldest('id')->simplepaginate(1);
        return view('kartu.detail', compact('kartur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $kartur = kartu::where('id', $id)->first();
        return view('kartu.show', [
            "kartu" => $kartur,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nomorkartu' => 'required',
            'nama'=> 'required',
            'alamat'=> 'required',
            'lahir'=> 'required',
            'nik'=> 'required',
            'fasilitas'=> 'required',

        ]);

        $kartu = kartu::where('id', $id);
        $kartu->update($request->except('_token','_method'));
        return redirect()->route('kartusip.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kartur = kartu::where('id', $id);
        if (!$kartur) {
            return to_route('kartu.index')->with('error', 'data tidak ditemukan');
        }
        $kartur->delete();
        return to_route('kartu.index')->with('success', 'hapus data berhasil');
    }

    public function dashboard()
    {
        $kartur = kartu::count();
        return view('kartu.dashboard', compact('kartur'));
    }
}
