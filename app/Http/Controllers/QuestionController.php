<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionModel;
use App\Models\UserModel;

class QuestionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = QuestionModel::get_all();
        // dd($items);
        foreach($questions as $q) {
            $q->user_data = UserModel::find_by_id($q->user_id);
        }
        return view('question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data = $request->all();
        unset($data["_token"]);
        $data['user_id'] = 1; // sementara, delete jika sudah terpasang fitur login user
        $data['date_created'] = now();

        $item = QuestionModel::insert($data);
        
        if ($item) {
            return $this->index();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = QuestionModel::find_by_id($id);
        if (is_null($question)) {
            return view('question.null');
        } else {
            $question->user_data = UserModel::find_by_id($question->user_id);           
            $answers = QuestionModel::get_answers_by_id($id);
            foreach($answers as $a) {
                $a->user_data = UserModel::find_by_id($a->user_id);
            }            
            $question->answers = $answers;
            return view('question.show', compact('question'));
        } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = QuestionModel::find_by_id($id);
        return view('question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = QuestionModel::update($id, $request->all());
        return redirect("/question");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = QuestionModel::destroy($id);
        return redirect('/question');
    }
}
