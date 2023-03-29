<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Pinjaman;


class PeminjamanController extends Controller
{
    public function index()
    {
        $listfiles = File::whereIn('status', [1, 2, 3])->get();
        // $all = $pinjam->merge($status);
        return view('pinjaman.listfiles',compact(['listfiles']));
    }

    public function store($id){

            Pinjaman::insert([
                'fail'=>$id,
                'peminjam'=>\Auth::user()->id,
                'created_at'=>date('Y-m-d H:i:s')
            ]);

            // $fail = File::where('id',$id)->first();
            // $statusnow = $fail->status;
            // $statusnew = $statusnow + 1;

            File::where('id',$id)->update([
                'status'=>2
            ]);
 
            // File::where('id',$id)->update([
            //     'status'=>$statusnew
            // ]);

            return redirect('pinjaman');          
    }

    public function pinjaman()
    {
        // if(\Auth::user()->hasRole('admin')){
            $data = Pinjaman::where('status', 2)->get();
        // }else{
            // $data = M_Peminjaman::where('peminjam',\Auth::user()->id)->get();
        // }
        return view ('files.pinjaman',compact('data'));
    }

    public function rekodpinjaman()
    {
        // if(\Auth::user()->hasRole('admin')){
            $rekodpinjaman = Pinjaman::get();

        // }else{
            // $data = M_Peminjaman::where('peminjam',\Auth::user()->id)->get();
        // }
        return view ('files.rekodpinjaman',compact('rekodpinjaman'));
    }

    public function accept($id){
        Pinjaman::where('id',$id)->update(['status'=>3]);

        $dt = Pinjaman::find($id);
        $id_fail = $dt->fail;
        File::where('id',$id_fail)->update([
            'status'=>3
        ]);
        
        return redirect('/file/pinjaman');
    }

    public function decline($id){
        Pinjaman::where('id',$id)->update(['status'=>4]);

        $dt = Pinjaman::find($id);
        $id_fail = $dt->fail;
        File::where('id',$id_fail)->update([
            'status'=>1
        ]);
 
        return redirect('file/pinjaman');
    }
}
