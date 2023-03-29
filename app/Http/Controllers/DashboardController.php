<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\M_Peminjaman;
// use App\Models\M_Fail;
use App\Models\User;





class DashboardController extends Controller
{
    public function index()
   {
       if(Auth::user()->hasRole('admin')){
        //   $data = M_Peminjaman::get();

        //   $fail = M_Fail::count();
        //   $pengguna = User::count();
        //   $pinjaman = M_Peminjaman::count();
        //   $lupus = M_Fail::where('status',0)->count();
         //  $total_lupus = $lupus->count();
          return view('admin');
       }
       
       else {
        //   $data = M_Peminjaman::whereIn('status',[1,3])->where('peminjam',\Auth::user()->id)->get();

        //   $fail = M_Fail::where('status',1)->count();
        //   $processing = M_Peminjaman::where('peminjam',\Auth::user()->id)->where('status',0)->count();
        //   $selesai = M_Peminjaman::where('peminjam',\Auth::user()->id)->where('status',3)->count();
        //   $batal = M_Peminjaman::where('peminjam',\Auth::user()->id)->where('status',2)->count();

          return view('user');
         }

       }


   }