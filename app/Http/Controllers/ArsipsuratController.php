<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;
use Alert;
use Illuminate\Support\Facades\Redirect;

class ArsipsuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tanggal = Carbon::now()->format('d-m-Y');
        $cari = $request->search;
        // return $cari;
        if ($cari == NULL) {
            $query = DB::table('arsip')->get();
            // return $query;
            return view('arsip', compact('query', 'tanggal'));
        } else if ($cari != NULL) {
            $query = DB::select("SELECT * FROM arsip WHERE arsip_judul LIKE '%$cari%';");
            // return $query;
            return view('arsip', compact('query', 'tanggal'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lihat($id)
    {
        $tanggal = Carbon::now()->isoFormat('DD MMMM Y');
        $query = DB::table('arsip')->where('arsip_id', $id)->get();
        // return $query;
        return view('lihatsurat', compact('query', 'tanggal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file('file');
        if ($file == NULL) {
            $query = DB::table('arsip')->insert([
                'arsip_nomor' => $request->nomorsurat,
                'arsip_kategori' => $request->kategori,
                'arsip_judul' => $request->judul,
            ]);
        } else if ($file != NULL) {
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'file_surat';
            $file->move($tujuan_upload, $nama_file);
            $query = DB::table('arsip')->insert([
                'arsip_nomor' => $request->nomorsurat,
                'arsip_kategori' => $request->kategori,
                'arsip_judul' => $request->judul,
                'arsip_file' => $nama_file,
            ]);
        }
        Alert::success('Berhasil', 'Data Berhasil Ditambah');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $file = $request->file('file');
        if ($file != NULL) {
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'file_surat';
            $file->move($tujuan_upload, $nama_file);
            $query = DB::table('arsip')->where('arsip_id', $request->id)->update([
                'arsip_file' => $nama_file
            ]);
            Alert::success('Berhasil', 'Data Berhasil Diupdate');
            return Redirect::back();
        } else if ($file == NULL) {
            Alert::error('Gagal', 'Data File Anda Kosong');
            return Redirect::back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = DB::table('arsip')->where('arsip_id', $id)->delete();
    }
}
