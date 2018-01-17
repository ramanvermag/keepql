@extends('layouts.app')

@section('content')
<style>
hr{   
    float: left;
    width: 100%;
    margin: 5px 0px 25px 0px;
    border-bottom: 2px solid #9ea9b1;
}
.vote-icons {
    font-size: 17px;
    margin-left: 7px;
    cursor: pointer;
}
</style>
<div class="question-section">
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-9">
                <!-- Question -->
                <div class="ques-desn">
                    <div class="quest-part1">
                        <div class="admin-img">
                             <div class="admin-men-img">
                                <img class="home_user" src="{{Storage::url('')}}{{  isset($posts->author->avatar) ? $posts->author->avatar : 'users/default.jpg' }}" alt="">
                            </div>
                            <h5>By <a href="/view-user-profile/{{ $posts->author->id }}"><span class="cap"> {{ isset($posts->author->name) ? $posts->author->name : 'Anonymous' }} </span><span class="madal">
                                <img src="{{ URL:: asset('images/madal_03.png') }}"> 3 </span></h5>
                        </div>
                        <div class="admin-nav">
                            <ul>
                                <li><a href="#"><span>in</span>
                                <?php 
                                    
                                    $categories = array();
                                    foreach($posts->category as $cat){
                                        $categories[]= $cat->name;
                                    }
                                    $cat = implode(" | ",$categories);
                                   
                                ?>
                                {{ isset($cat) ? $cat : 'undefined' }}
                                   </a></li>
                            </ul>
                        </div>
                    </div>
                    <h3>{{ isset($posts->title) ? $posts->title : 'undefied' }}</h3>
                    <p>{!! isset($posts->body) ? $posts->body : 'undefied' !!}</p>
                    <span class="tags">
                        <h4>tags:</h4>
                        @if(!empty($posts->tags))
                            <?php
                                $tags = explode(',',$posts->tags);
                                foreach($tags as $tag){
                            ?>     
                                <a href="javascript:;"><?= $tag; ?></a>
                            <?php 
                                }
                            ?>
                        @endif
                    </span>
                    <div class="social-share">
                        <div class="share-desn">    
                            <h5><i class="fa fa-clock-o" aria-hidden="true"></i>
                                {{ $posts->created_at->format('F d, Y') }} 
                            </h5>
                            <h5><i class="fa fa-map-marker" aria-hidden="true"></i>NewYork</h5>
                        </div>
                        <div class="share-section">
                            <?php echo Share::currentPage()
                            ->facebook()
                            ->twitter()
                            ->googlePlus()
                            ->linkedin('Extra linkedin summary can be passed here'); ?>
                        </div>
                    </div>
                </div>
                <!-- Answers -->
                @if(!empty($posts->answers))
                <div class="all-answers-div">
                    <h3 class="answers-heading">{{ $posts->answers->count() }} Answers</h3>
                    @foreach($posts->answers as $answer)
                    <div class="answers-div">
                        <div class="quest-part1">
                            <div class="admin-img">
                                <div class="admin-men-img">
                                    <img class="home_user" src="{{Storage::url('')}}{{  isset($answer->author->avatar) ? $answer->author->avatar : 'users/default.jpg' }}" alt="">
                                </div>
                                <h5>By <a href="/view-user-profile/{{ $answer->author->id }}"><span class="cap"> {{ isset($answer->author->name) ? $answer->author->name : 'Anonymous' }} </span></h5>
                                <div class="total-votes total-votes-count-{{ $answer->id }}">
                                    <i class="fa fa-thumbs-o-up vote-icons " aria-hidden="true"></i> : 
                                    <?php
                                    $likes = 0; $disLikes = 0;
                                    if(!empty($answer->votes)){
                                        foreach($answer->votes as $array){
                                            $likes += $array->like_status;
                                            $disLikes += $array->dislike_status;
                                        }
                                    }
                                    echo $likes;
                                    ?>
                                    <i class="fa fa-thumbs-o-down vote-icons" aria-hidden="true"></i> : <?= $disLikes ?>
                                </div>
                            </div>
                            <div class="pull-right">
                                <div class="total-votes">
                                    <?php
                                        $like_class    = 'fa-thumbs-o-up';
                                        $dislike_class = 'fa-thumbs-o-down';
                                        if(!empty($answer->user_votes[0])){
                                            if($answer->user_votes[0]->like_status == 1){
                                                $like_class    = 'fa-thumbs-up';
                                            }
                                            if($answer->user_votes[0]->dislike_status == 1){
                                                $dislike_class    = 'fa-thumbs-down';
                                            }
                                        }
                                    ?>
                                    <i class="fa <?= $like_class; ?> vote-icons icon-vote" data-answer-id="{{ $answer->id }}" data-icon-name="up" aria-hidden="true"></i>
                                    <i class="fa <?= $dislike_class; ?> vote-icons icon-vote" data-answer-id="{{ $answer->id }}" data-icon-name="down" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <p>{!! isset($answer->answer) ? $answer->answer : 'undefied' !!}</p>
                    </div>
                    <hr>
                    @endforeach
                </div>
                @endif
                <!-- Answers -->
                <form method="POST" action="{{ url('post/answers') }}">
                    {{ csrf_field() }}
                    <div class="ans-desn">
                        <h5> Submit your answer here: </h5>
                        <div class="comment">
                            <textarea class="form-control richTextBox" id="richtextbody" name="answer"></textarea>
                            <button type="submit" class="btn btn-danger">Publish <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                            <div class="cmntg_user">
                                <div class="admin-img">
                                    <div class="admin-men-img">
                                        <img class="home_user" src="{{Storage::url('')}}{{ isset(Auth::user()->avatar) ? Auth::user()->avatar : 'users/default.jpg' }}" alt="">
                                    </div>
                                    <h5>Answer As: <span class="cap"> {{ Auth::user()->name }} </span><span class="madal">
                                        <img src="{{ URL:: asset('images/madal_03.png') }}"> 3 </span></h5>
                                </div>
                            </div>
                        </div>  
                        <input type="hidden" name="post_id" value="{{ $posts->id }}">
                    </div>
                </form>
            </div>
            @include('elements/sidebar')
        </div>
    </div>
</div>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
    $('.icon-vote').on('click',function(){
        var icon_name = $(this).attr('data-icon-name');
        if(icon_name=="up"){
            var pointer = $(this).next();
            var opp_icon_name = 'down';
        }
        else{
            var pointer = $(this).prev();
            var opp_icon_name = 'up';
        }
        if($(this).hasClass('fa-thumbs-o-'+icon_name)){ 
            var icon_value = 1;
            $(this).addClass('fa-thumbs-'+icon_name);
            $(this).removeClass('fa-thumbs-o-'+icon_name);

            pointer.addClass('fa-thumbs-o-'+opp_icon_name);
            pointer.removeClass('fa-thumbs-'+opp_icon_name);
        }
        else{
            var icon_value = 0;
            $(this).addClass('fa-thumbs-o-'+icon_name);
            $(this).removeClass('fa-thumbs-'+icon_name);
        }
        var answer_id = $(this).attr('data-answer-id');
        $.ajax({
            type:'POST',
            data:{
                answer_id:answer_id,icon_value:icon_value,icon_name:icon_name
            },
            url:'/post/saveVotes',
            success:function(resp){
                $('.total-votes-count-'+answer_id).html(resp);
            }
        })
    });
})
</script>
@endsection