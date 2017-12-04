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

               
                <?php //print_r($post);die(); ?>
                <div class="ques-desn">
                    <div class="quest-part1">
                        <div class="admin-img">
                             <div class="admin-men-img">
                               
                                <img class="home_user" src="/keeplaralatest/storage/app/public/{{  isset($posts->author->avatar) ? $posts->author->avatar : 'users/default.jpg' }}" alt="">
                               
                                <?php /* <img src="{{url('/')}}/{{ $post->author->avatar }}" alt=""> */ ?>
                            </div>
                            <h5>By <span class="cap"> {{ isset($posts->author->name) ? $posts->author->name : 'Anonymous' }} </span><span class="madal">
                                <?php /* <img src="{{ Voyager::image( $post->image ) }}"> */ ?>
                                <img src="{{ URL:: asset('images/madal_03.png') }}"> 3 </span></h5>
                        </div>
                        <div class="admin-nav">
                            <ul>
                                <li><a href="#"><span>in</span> {{ isset($posts->category->name) ? $posts->category->name : 'undefied' }} </a></li>
                                <!-- <li><a href="#">lawyers</a></li>
                                <li><a href="#">nurses</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <h3>{{ isset($posts->title) ? $posts->title : 'undefied' }}</h3>
                    <p>{!! isset($posts->body) ? $posts->body : 'undefied' !!}</p>
                    <span class="tags">
                        <h4>tags:</h4>
                        <a href="#">J-Query</a>
                        <a href="#">Java Script</a>
                    </span>
                    <!--
                    <div class="vote-part">
                        <a href="">Answer it <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a><br/>
                        <a href="">Request <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        <ul class="admin-votes">
                            <li><a href="#">Vote<span>3</span></a></li>
                            <li><a href="#">Answers<span>15</span></a></li>
                            <li><a href="#">Views<span>35</span></a></li>
                        </ul>
                    </div>
                    -->
                    <div class="social-share">
                        <div class="share-desn">    
                            <h5><i class="fa fa-clock-o" aria-hidden="true"></i>

                                {{ $posts->created_at->format('F d, Y') }} 
                                <?php //time_ago( $time ); ?> 
                            </h5>
                            <h5><i class="fa fa-map-marker" aria-hidden="true"></i>NewYork</h5>
                        </div>
                        <div class="share-section">
                            
                            <?php /* 
                            page('http://uniquecoders.in', 'Keep Questioning')
                            currentPage() */ ?>
                            <?php echo Share::currentPage()
                            ->facebook()
                            ->twitter()
                            ->googlePlus()
                            ->linkedin('Extra linkedin summary can be passed here'); ?>

                            <?php /*<ul>
                                <li class="share">Share</li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a id="more" href="#">more</a>
                                <ul class="show-icon">
                                    <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-stumbleupon" aria-hidden="true"></i></a></li>
                                </ul>
                                </li>
                                
                            </ul>*/ ?>
                        </div>
                    </div>
                </div>
                
                  <div class="ans-desn">
                    <h5> Submit your answer here: </h5>
                    <div class="comment">
                        <textarea class="form-control richTextBox" id="richtextbody" name="body"></textarea>
                                                
                        <a class="btn btn-danger" href="/post/{{$posts->slug}}">Publish <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        <div class="cmntg_user">
                            <div class="admin-img">
                                <div class="admin-men-img">
                                    <?php /* keeplaralatest/storage/app/public/{{ $user->avatar }}*/ ?>
                                    <img class="home_user" src="/keeplaralatest/storage/app/public/{{ isset(Auth::user()->avatar) ? Auth::user()->avatar : 'users/default.jpg' }}" alt="">
                                    <?php /* <img src="{{url('/')}}/{{ $post->author->avatar }}" alt=""> */ ?>
                                </div>
                                <h5>Answer As: <span class="cap"> {{ Auth::user()->name }} </span><span class="madal">
                                    <?php /*  <img src="{{ Voyager::image( $post->image ) }}"> */ ?>
                                    <img src="{{ URL:: asset('images/madal_03.png') }}"> 3 </span></h5>
                            </div>
                        </div>
                    </div>  

                </div>
      
<!--
                <div class="col-md-12">
                    <div class="pagination">



                        <ul>
                            <li class="prev"><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li class="next"><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>-->
            </div>
            <div class="col-md-3">
                <div class="popular-ques">
                    <div class="ques-numbr">
                        <h5>Question<span class="numb">25,859,64</span></h5>
                    </div>
                    <div class="ques-numbr member">
                        <h5>Member<span class="numb">10,345</span></h5>
                    </div>
                    <div class="popular-section">
                        <h5>Popular Question</h5>
                        <ul>
                            <li><a href="#">There are many variations of passages of Lorem Ipsum available?</a></li>
                            <li><a href="#">There are many variations of passages of Lorem Ipsum available?</a></li>
                            <li><a href="#">There are many variations of passages of Lorem Ipsum available?</a></li>
                            <li><a href="#">There are many variations of passages of Lorem Ipsum available?</a></li>
                            <li><a href="#">There are many variations of passages of Lorem Ipsum available?</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
