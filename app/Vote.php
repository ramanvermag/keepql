<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;


class Vote extends Model
{
    public function save_votes($data=array()){
    	$user_id = Auth::user()->id;
    	$votes = static::where('answer_id',$data['answer_id'])
    				->where('user_id',$user_id)->first();
        $votesData = new Vote;
    	if(empty($votes)){
    		$votesData->answer_id = $data['answer_id'];
    		$votesData->user_id = $user_id;
    		if($data['icon_name']=="up"){
    			$votesData->like_status = $data['icon_value'];
    		}
    		else{
    			$votesData->dislike_status = $data['icon_value'];
    		}
    		$votesData->created_at = date('Y-m-d H:i:s');
    	}
    	else{
    		$votesData = Vote::find($votes->id);
    		$votesData->answer_id = $data['answer_id'];
    		$votesData->user_id = $user_id;
    		if($data['icon_name']=="up"){
    			$votesData->like_status = $data['icon_value'];
    		}
    		else{
    			$votesData->dislike_status = $data['icon_value'];
    		}
    		if($votesData->like_status == 1 && $data['icon_name']=="up"){
    			$votesData->dislike_status = 0;
    		}
    		if($votesData->dislike_status == 1 && $data['icon_name']=="down"){
    			$votesData->like_status = 0;
    		}
    	}
        $votesData->updated_at = date('Y-m-d H:i:s');
        $votesData->save();
    }
    function getVotesByAnswer($answerId){
    	$likes = static::where('answer_id',$answerId)
    				->sum('like_status');
    	$dislikes = static::where('answer_id',$answerId)
    				->sum('dislike_status');
    	$html = '<i class="fa fa-thumbs-o-up vote-icons " aria-hidden="true"></i> : '.$likes.'
                <i class="fa fa-thumbs-o-down vote-icons" aria-hidden="true"></i> : '.$dislikes;
        return $html;
    }
}