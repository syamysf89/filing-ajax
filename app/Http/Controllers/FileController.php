<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::all();
        return view('files.file',compact(['files']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fail['no_fail'] = $request->no_fail;
        $fail['nama_fail'] = $request->nama_fail;
        $fail['tarikh_buka'] = $request->tarikh_buka;

        
        File::insert($fail);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fail = File::findOrFail($id);
        return view('files.edit')->with([
            'fail' => $fail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fail = File::findOrFail($id);
        $fail->no_fail = $request->no_fail;
        $fail->nama_fail = $request->nama_fail;
        $fail->tarikh_buka = $request->tarikh_buka; 
        
        $fail->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fail = File::findOrFail($id);
        $fail->forceDelete();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function lupus(string $id)
    {
        $fail = File::findOrFail($id);
        $fail->delete();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function showlupus()
    {
        $fail = File::onlyTrashed()->get();
        return view('files.lupus')->with([
            'fail' => $fail
        ]);
    }
}
