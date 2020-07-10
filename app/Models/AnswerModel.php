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

    public static function insert($data) {
        $new_answer = DB::table('answer')->insert($data);
        return $new_answer;
    }
}
