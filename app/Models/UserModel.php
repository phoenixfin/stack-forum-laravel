<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class UserModel {
    public static function get_all() {
        $users = DB::table('users')->get();
        return $users;
    }

    public static function insert($data) {
        $new_user = DB::table('users')->insert($data);
        return $new_user;
    }

    public static function find_by_id($id) {
        $user = DB::table('users')->where('id', $id)->first();
        return $user;
    }    

    public static function update($id, $request) {
        $user = DB::table('users')
                      ->where('id',$id)
                      ->update([
                        'name'=> $request['name'],
                      ]);
        return $user;
    }

    public static function destroy($id) {
        $deleted = DB::table('users')
                     -> where('id', $id)
                     -> delete();
        return $deleted;
    }

}