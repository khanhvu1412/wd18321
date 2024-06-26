<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserContronller extends Controller
{
    function showUser(){
        // echo 'showUser';
        $users = [
            [
                'id' => '1',
                'name' => 'Long'
            ],
            [
                'id' => '2',
                'name' => 'Vũ'
            ],
        ];
        return view('list-user')->with([
            'users'      => $users
        ]);
    }
    

    function getUser($id, $name = ''){
        echo $id;
        echo $name ;
    }

    function updateUser(Request $request){
        echo $request->id;
        echo $request->name;
    }
}
