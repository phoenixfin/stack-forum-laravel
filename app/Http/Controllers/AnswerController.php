<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswerModel;
use App\Models\QuestionModel;
use App\Http\Controllers\QuestionController;

class AnswerController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($question_id)
    {
        $question = QuestionModel::find_by_id($question_id);
        return view('answer.form', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($question_id, Request $request)
    {
        $data = $request->all();
        unset($data["_token"]);
        $data['user_id'] = auth()->user()->id; 
        $data['question_id'] = $question_id;

        $item = AnswerModel::insert($data);
        if ($item) {
            return redirect("/question/$question_id");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($question_id, $answer_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($question_id, $answer_id)
    {
        $question = QuestionModel::find_by_id($question_id);
        $answer = AnswerModel::find_by_id($answer_id);
        return view('answer.edit', compact('question','answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($question_id, $answer_id, Request $request)
    {
        $answer = AnswerModel::update($answer_id, $request->all());
        return redirect("/question/$question_id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($question_id, $answer_id)
    {
        $deleted = AnswerModel::destroy($answer_id);
        return redirect("/question/$question_id");
    }
}
