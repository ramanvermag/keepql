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
                
                <?php //print_r($postCatRel[0]->post_id); die(); ?>
                <?php 
                //print_r ($postCat);
                //print_r ($postCat->post_id);
                //print_r ($postCat->cat_id);
                ?>


                <div class="ques-desn">
                    <div class="quest-part1">
                        <div class="admin-img">
                            <div class="admin-men-img">
                               
                                <img class="home_user" src="{{Storage::url('')}}{{  isset($post->author->avatar) ? $post->author->avatar : 'users/default.jpg' }}" alt="">
                               
                                <?php /* <img src="{{url('/')}}/{{ $post->author->avatar }}" alt=""> */ ?>
                            </div>
                            
                            <h5>By <span class="cap"> {{ isset($post->author->name) ? $post->author->name : 'Anonymous' }} </span><span class="madal">
                                <!-- <img src="{{ Voyager::image( $post->image ) }}"> -->
                                <img src="{{ URL:: asset('images/madal_03.png') }}"> 3 </span></h5>
                            
                        </div>
                        <div class="admin-nav">
                            <ul>
                                <li><a href="#"><span>in</span> 

                                <?php 
                                    
                                    $categories = array();
                                    foreach($post->category as $cat){
                                        $categories[]= $cat->category->name;
                                    }
                                    $cat = implode(" | ",$categories);
                                   
                                ?>
                                {{ isset($cat) ? $cat : 'undefined' }}

                                </a></li>
                                <!-- <li><a href="#">lawyers</a></li>
                                <li><a href="#">nurses</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <h3>{{ $post->title }}</h3>
                    {!! $post->body !!}
                    <span class="tags">
                        <h4>tags:</h4>
                        <a href="#">J-Query</a>
                        <a href="#">Java Script</a>
                    </span>
                    <div class="vote-part">
                        <a href="post/{{$post->slug}}">Answer it <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        <ul class="admin-votes">
                            <li><a href="#">Vote<span>3</span></a></li>
                            <li><a href="#">Answers<span>15</span></a></li>
                            <li><a href="#">Views<span>35</span></a></li>
                        </ul>
                    </div>
                    <div class="social-share">
                        <div class="share-desn">    
                            <h5><i class="fa fa-clock-o" aria-hidden="true"></i>
                                {{ $post->created_at->format('F d, Y') }} 
                                <?php //time_ago( $time ); ?> 
                            </h5>
                            <h5><i class="fa fa-map-marker" aria-hidden="true"></i>NewYork</h5>
                        </div>
                        <div class="share-section">
                            <?php /* 
                            page('http://uniquecoders.in', 'Keep Questioning')
                            currentPage() */ ?>
                            <?php echo Share::page(url('post')."/".$post->slug, 'Keep Questioning')
                            ->facebook()
                            ->twitter()
                            ->googlePlus()
                            ->linkedin('Extra linkedin summary can be passed here'); ?>

                        </div>
                    </div>
                </div>

            @endforeach
<? /* these are madals

<h5>BY <span>William Burk</span><span class="madal sliver"><img src="images/madal_06.png">5</
<h5>BY <span>Henry</span><span class="madal brown"><img src="images/madal_08.png">3</span></h5>
                                               
*/ ?>

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
                </div>
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
