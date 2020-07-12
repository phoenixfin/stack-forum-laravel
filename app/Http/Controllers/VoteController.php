<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VoteModel;
use App\Models\QuestionModel;
use App\Models\AnswerModel;

class VoteController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function upvote(Request $request)
    {
        $data = $request->all();
        $find = VoteModel::find($data['user'], $data['id'], $data['type']);
        if ($data['type'] == 'question') {
            $obj = QuestionModel::find_by_id($data['id']);
        } else {
            $obj = AnswerModel::find_by_id($data['id']);
        }

        if (is_null($find)) {
            $status = "ok";            
            $vote = [
                'up'=>true, 
                'votable_id'=>$data['id'], 
                'votable_type'=>$data['type'],
                'user_id'=>$data['user']
            ];
            $item = VoteModel::insert($vote);
            $obj->upvote_count += 1;
        } else {
            $status = "cancel";
            $del = VoteModel::destroy($data['user'], $data['id'], $data['type']);
            $obj->upvote_count -= 1;            
        }

        return response()->json(['message'=>$status]);
    }

    public function downvote(Request $request)
    {
        $data = $request->all();
        $find = VoteModel::find($data['user'], $data['id'], $data['type']);
        if ($data['type'] == 'question') {
            $obj = QuestionModel::find_by_id($data['id']);
        } else {
            $obj = AnswerModel::find_by_id($data['id']);
        }        
        if (is_null($find)) {
            $status = "ok";
            $vote = [
                'up'=>false, 
                'votable_id'=>$data['id'], 
                'votable_type'=>$data['type'],
                'user_id'=>$data['user']
            ];
            $item = VoteModel::insert($vote);
            $obj->downvote_count += 1;                        
        } else {
            $status = "cancel";
            $obj->downvote_count -= 1;                        
            $del = VoteModel::destroy($data['user'], $data['id'], $data['type']);
        }

        return response()->json(['message'=>$status]);
    }    



        //  //        $usersLike= $comment->likes()->where('user_id',auth()->id())->where('likable_id',$commentId)->first();
//          if(!$comment->isLiked()){
//              $comment->likeIt();
//              return response()->json(['status'=>'success','message'=>'liked']);
 
//          }else{
//              $comment->unlikeIt();
//              return response()->json(['status'=>'success','message'=>'unliked']);
 
//          }
    
}