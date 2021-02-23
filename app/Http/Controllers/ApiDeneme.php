<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiDeneme extends Controller
{
    //
    public function mysqlDeneme()
    {
        //normal sorgu
        $users = DB::table('users')->get();

        return response($users);
    }

    public function mysqlInsertDeneme()
    {
      $data = request()->only('name');

    $id =  DB::table('deneme')->insertGetId([
        'name' => $data['name'],
        'name2json' => json_encode(request()->only('name','yas','okul'))

      ]);
      if($id != null){
        return response(array('id' => $id,
                              'sonuc' => 'basarili',
                          ));
      }else{
        return response(array('hata' => 1, ));
      }

    }
}
