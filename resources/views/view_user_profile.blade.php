@extends('layouts.app')
@section('content')
<div class="question-section">
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-md-4">
                <div id="pro-sec" class="pro-sec pro-sec-1">
                    <img src="{{Storage::url('')}}{{ $userData[0]['avatar'] }}" id="kq_user_img" class="kq_user_img"/>
                    <h3 class="kq_user">{{ $userData[0]['name'] }}</h3>
                    <span class="madal">
                        <img src="{{asset('/images/madal_03.png')}}"> 3 
                    </span>
                    <div>
                        <div data-user="{{ $userData[0]['id'] }}" class="awesomeRating"></div>
                        <input type="hidden" name="awsomeRatingValue" class="awesomeRatingValue">
                    </div>
                </div>
                <div class="pro-sec pro-sec-2">
                    <?php $link1='javascript:;'; ?>
                    @if($answersCount > 0)
                    <?php $link1='/view-user-answers/'.$userData[0]['id']; ?>
                    @endif
                    <div class="col-xs-4 user-stats user-stats-1">
                        <a href="{{ $link1 }}">
                            <span class="span-1">{{ $answersCount }}</span><br> answers
                        </a>
                    </div> 
                    <?php $link2='javascript:;'; ?>
                    @if(count($userData[0]['posts']) > 0)
                    <?php $link2='/view-questions/'.$userData[0]['id']; ?>
                    @endif
                    <div class="col-xs-4 user-stats user-stats-2">
                        <a href="{{ $link2 }}">
                            <span class="span-2">{{ count($userData[0]['posts']) }}</span><br> questions
                        </a>
                    </div>
                    <div class="col-xs-4 user-stats user-stats-3">
                        <span class="span-3">{{ $postViews }}</span><br> views
                    </div>
                </div>
                <div class="pro-sec pro-sec-3">
                    <div class="">
                        <div class="col-md-12">
                            <ul class="user-info">
                                <li>Published Questions</li>
                                <li>Draft Questions</li>
                                <li>Pending Questions</li>
                                <li>Favorite Questions</li>
                                <li>Views</li>
                            </ul>      
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                @if(!empty($userData[0]['biography']))
                <div class="pro-sec pro-sec-1">
                    <h4>Biography</h4>
                    <span class="quotes pull-left"><i class="fa fa-quote-left" aria-hidden="true"></i></span>
                    <span class="quotes pull-right"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                    <p class="bio"><?= $userData[0]['biography'] ?></p>
                </div>
                @endif
                <div class="pro-sec ">
                    <ul class="user-info">
                        @if(!empty($userData[0]['work_company']))
                            <li><i class="fa fa-briefcase" aria-hidden="true"></i> Works at {{ $userData[0]['work_company'] }}</li>
                        @endif
                        @if(!empty($userData[0]['designation']))
                            <li><i class="fa fa-user-circle-o" aria-hidden="true"></i> Working as {{ $userData[0]['designation'] }}</li>
                        @endif
                        @if(!empty($userData[0]['country']) && !empty($userData[0]['state']))
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> Lives in {{ $userData[0]['country'] }} {{ $userData[0]['state'] }}</li>
                        @endif
                        <li>
                            <?php
                                $datetime1 = new DateTime($userData[0]['created_at']);
                                $datetime2 = new DateTime();
                                $interval = $datetime1->diff($datetime2);
                            ?>
                            <i class="fa fa-history" aria-hidden="true"></i> 
                            Member Since 
                            <?php 
                                if(!empty($interval->y)){ echo $interval->y." years"; } 
                                if(!empty($interval->m)){ echo $interval->m." months"; }
                                if(!empty($interval->d)){ echo $interval->d." days"; }
                            ?>
                        </li>
                        @if($userData[0]['last_logged_in'])
                            <li><i class="fa fa-eye" aria-hidden="true"></i> Last logged in at {{ date('d M,Y H:i:s',strtotime($userData[0]['last_logged_in'])) }}</li>
                        @endif
                    </ul>         
                </div>
                <div class="pro-sec pro-sec-3">
                    <h4>Top Tags</h4>
                    <ul>
                        <li> Webcomics <span class="">(56634)</span> , </li>
                        <li> Web Servers <span class="">(423)</span> , </li>
                        <li> Web Fonts and Typefaces <span class="">(932)</span> , </li>
                        <li> Web Hosting <span class="">(876)</span> , </li>
                        <li> Websites <span class="">(4356)</span></li>
                    </ul>    
                    <a href class="view_more pull-right">View More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="{{ asset('css/awesomerating.min.css') }}" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="{{ asset('js/awesomeRating.min.js') }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.awesomeRating').awesomeRating({
        valueInitial: '<?php if(!empty($ratings[0]->sum)){ echo $ratings[0]->sum; }else{ echo 1; } ?>',
        values: ["1","2","3","4","5"],
        targetSelector: "input.awesomeRatingValue"
    });
    $('.awesomeRating').click(function(){
        var userId = $(this).attr('data-user');
        var stars = $('.awesomeRatingValue').val();
        $.ajax({
            type:'post',
            data:{
                userId:userId,stars:stars
            },
            url:'/users/profile-rating',
            success:function(resp){
            }
        });
    });
</script>
@endsection