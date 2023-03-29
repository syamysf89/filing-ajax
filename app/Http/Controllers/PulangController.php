<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pinjaman;
use App\Models\File;

class PulangController extends Controller
{
    public function index(){

        if(\Auth::user()->hasRole('admin')){
            $data = Pinjaman::get();

        }else{
            $data = Pinjaman::where('peminjam',\Auth::user()->id)->get();
        }

        // $data = M_Peminjaman::whereIn('status',[1,3])->get();
 
        return view('pulang.pulang',compact('data'));
    }

    public function pemulangan($id){

        $dt = Pinjaman::find($id);
        
        // $fail = File::find($id_fail);
        
        // $now = $fail->status;
        // $statusupdate = $now - 1;
        
        $id_fail = $dt->fail;
        Pinjaman::where('id',$id)->update([
            'status'=>5
        ]);

        File::where('id',$id_fail)->update([
            'status'=>1
        ]);

        // M_Fail::where('id',$id_fail)->update([
        //     'stok'=>$stok_pemulangan
        // ]); 
        return redirect('pemulangan');
    }

}
