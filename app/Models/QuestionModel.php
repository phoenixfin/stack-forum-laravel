<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class QuestionModel {
    public static function get_all() {
        $questions = DB::table('questions')->get();
        return $questions;
    }

    public static function insert($data) {
        $id = DB::table('questions')->insertGetId($data);
        $inserted = QuestionModel::find_by_id($id);
        $date = $inserted->date_modified;
        $new_question = DB::table('questions')
                      ->where('id',$id)
                      ->update([
                        'date_created'=> $date
                      ]);

        return $new_question;
    }

    public static function find_by_id($id) {
        $question = DB::table('questions')->where('id', $id)->first();
        return $question;
    }

    public static function get_answers_by_id($id) {
        $answers = DB::table('answers')->where('question_id','=', $id)->get();
        return $answers;
    }

    public static function update($id, $request) {
        $question = DB::table('questions')
                      ->where('id',$id)
                      ->update([
                        'title'=> $request['title'],
                        'content'=>$request['content']
                      ]);
        return $question;
    }

    public static function destroy($id) {
        $del_ans = DB::table('answers')
                     -> where('question_id', $id)
                     -> delete();
        $del_que = DB::table('questions')
                     -> where('id', $id)
                     -> delete();
        return $del_que;
    }
}
