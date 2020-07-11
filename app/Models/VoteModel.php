<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class VoteModel {
    public static function insert($data) {
        $new_vote = DB::table('votes')->insert($data);
        return $new_vote;
    }

    public static function find($user_id, $obj_id, $type) {
        $vote = DB::table('votes')->where([
                    ['user_id', $user_id],
                    ['votable_id', $obj_id],
                    ['votable_type', $type]
                ])
                -> first();
        return $vote;        
    }

    public static function destroy($user_id, $obj_id, $type) {
        $vote = DB::table('votes')->where([
                    ['user_id', $user_id],
                    ['votable_id', $obj_id],
                    ['votable_type', $type]
                ])
                -> delete();
        return $vote;        
    }
}