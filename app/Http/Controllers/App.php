<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class App extends Controller
{
    public function index(){
      return "Ana Sayfa";
    }
    public function hak(){
      return "hakkımızda";
    }

    public function mysql_deneme()
    {
        //normal sorgu
        $users = DB::table('users')->get();

        return $users;
    }
}
