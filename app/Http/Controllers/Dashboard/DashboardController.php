<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Models\Kamar;
use App\Models\Penyewa;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function __construct(){
        
    }

    public function index(){
      
        $pengguna = User::count();
       
        return view('pages.dashboard',compact(['pengguna']));
    }
    
}
