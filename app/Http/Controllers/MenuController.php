<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        $data = File::all();

        return view('page/Index',['surat' => $data]);
    }

    public function find($key)
    {
        $data = File::where('judul',$key);

        return view('page/Index',['surat' => $data]);
    }

    public function create(Request $request)
    {
        // $this->validate($request,[
        //     'file' => 'mimes:pdf',
        // ]);

        $surat = new File;

        $surat->nomor = $request->nomor;
        $surat->judul = $request->judul;
        $surat->kategori = $request->kategori;
        $surat->file = $request->file;

        $surat->save();

        return redirect('/')->with('status', 'Surat Terarsipkan!');
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request,[
            'file' => 'mimes:pdf',
        ]);

        $surat = File::find($id);

        $surat->nomor = $request->nomor;
        $surat->judul = $request->judul;
        $surat->kategori = $request->kategori;
        $surat->file = $request->file;

        $surat->save();

        return redirect('page/Index')->with('status', 'Surat Berhasil di Edit!');
    }

    public function detail($id)
    {
        $selected = File::find($id);

        return view('page/Detail',['surat' => $selected]);
    }

    public function delete($id)
    {
        File::destroy($id);

        return redirect('/')->with('status', 'Data terhapus!');
    }

    public function download($id)
    {
        $surat = File::find($id);

        $file = $surat->file;

        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download($file, $surat->judul+'.pdf', $headers);
    }

}
