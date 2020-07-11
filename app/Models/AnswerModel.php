<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class AnswerModel {
    public static function get_all() {
        $answers = DB::table('questions')
                     ->join('answers', 'question.id', '=', 'answers.question_id')
                     ->select('answers.*','question.title')
                     ->get();
        return $answers;
    }

    public static function get_by_question($id) {
      $answers = DB::table('questions')
                   ->join('answers', 'question.id', '=', 'answers.question_id')
                   ->select('answers.*','question.title')
                   ->where('question.id','=',$id)
                   ->get();
      return $answers;
    }

    public static function find_by_id($id) {
        $answer = DB::table('answers')->where('id', $id)->first();
        return $answer;        
    }

    public static function insert($data) {
        $new_answer = DB::table('answers')->insert($data);
        return $new_answer;
    }
    
    public static function update($id, $request) {
        $answer = DB::table('answers')
                      ->where('id',$id)
                      ->update([
                        'content'=>$request['content']
                      ]);
        return $answer;
    }    
    
    public static function destroy($id) {
        $del_ans = DB::table('answers')
                     -> where('id', $id)
                     -> delete();
        return $del_ans;
    }

}
