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
            <div class="col-md-9">
            @foreach($posts as $post)
                <div class="ques-desn">
                    <div class="quest-part1">
                        <div class="admin-img">
                            <div class="admin-men-img">
                                <img class="home_user" src="{{Storage::url('')}}{{  isset($post->author->avatar) ? $post->author->avatar : 'users/default.jpg' }}" alt="">
                            </div>
                            <h5>By <a href="/view-user-profile/{{ $post->author->id }}"><span class="cap"> {{ isset($post->author->name) ? $post->author->name : 'Anonymous' }} </span></a><span class="madal">
                            <img src="{{ URL:: asset('images/madal_03.png') }}"> 3 </span></h5>
                        </div>
                        <div class="admin-nav">
                            <ul>
                                <li><a href="#"><span>in</span> 

                                <?php 
                                    
                                    $categories = array();
                                    foreach($post->category as $cat){
                                        $categories[]= $cat->name;
                                    }
                                    $cat = implode(" | ",$categories);
                                   
                                ?>
                                {{ isset($cat) ? $cat : 'undefined' }}

                                </a></li>
                            </ul>
                            <div data-user="{{ $post->author->id }}" class="awesomeRating"></div>
                            <input type="hidden" name="awsomeRatingValue" class="awesomeRatingValue">
                        </div>
                    </div>
                    <h3>{{ $post->title }}</h3>
                    {!! $post->body !!}
                    <span class="tags">
                        <h4>tags:</h4>
                        @if(!empty($post->tags))
                            <?php
                                $tags = explode(',',$post->tags);
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
                                {{ $post->created_at->format('F d, Y') }}
                            </h5>
                            @if(!empty($post->author->country))
                            <h5><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $post->author->country }}</h5>
                            @endif
                        </div>
                        <div class="publish-button">
                            <a href="/ask-a-question/{{ Crypt::encryptString($post->id) }}">Publish <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="col-md-12">
                    <div class="pagination">
                        {{ $posts->render() }}
                    </div>
                </div>
            </div>
            @include('elements/sidebar')
        </div>
    </div>
</div>
@endsection
