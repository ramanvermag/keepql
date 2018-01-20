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
                     
                    <img src="{{Storage::url('')}}{{ $user->avatar }}" id="kq_user_img" class="kq_user_img"/>

                    <!-- <div class="button_container">
                        <button type="button" id="start-upload" class="btn btn-success">Save</button>
                        <button type="button" id="cancel-upload" class="btn btn-danger">Cancel</button>
                    </div> -->

                    <?php 
                        /*echo Plupload::make([
                            'url' => 'upload',
                            'dragdrop' => true,
                            'multi_selection'=>false,
                            'browse_button'=>'-browse-button',
                            'drop_element'=>'kq_user_img'
                        ]);*/
                    ?>
                    <!--script type="text/javascript">
                        _uploader.bind('FilesAdded', function(up,files) {
                             _uploader.start();
                            plupload.each(files, function(file) {
                                var preloader = new mOxie.Image();
                                preloader.onload = function() {
                                    preloader.downsize( 300, 300 );
                                    $(".kq_user_img").prop( "src", preloader.getAsDataURL() );
                                };
                                // Wiki: https://github.com/moxiecode/plupload/wiki/File
                                preloader.load( file.getSource() );
                                document.querySelector('.button_container').style.display="block";
                            });
                        });
                        
                        var imgpath = document.querySelector('.kq_user_img').getAttribute('src');

                        $(function(){  
                            //on cancel 
                            $('#cancel-upload').on('click', function(){
                                $(".kq_user_img").attr( "src", imgpath );
                                $('.button_container').css("display","none");
                                return false;
                            });
                            //on save
                            $('#start-upload').on('click', function(){
                                _uploader.start();
                                $('.button_container').css("display","none");
                            });
                        });
                        
                        _uploader.bind('FileUploaded', function(up,file,response) {
                            var res = JSON.parse(response.response);
                            $(".kq_user_img").attr('src',res.file);
                            //location.reload();
                        });
                    </script-->

                    

                    <h3 class="kq_user">{{ $user->name }}</h3>
                    <span class="madal">
                        <img src="{{asset('/images/madal_03.png')}}"> 3 
                    </span>
                    <div>
                        <a class="btn btn-primary" href="{{ url('edit-profile') }}">Edit Profile</a>
                    </div>
                </div>
                <div class="pro-sec pro-sec-2">
                    <?php $link1='javascript:;'; ?>
                    @if($answersCount > 0)
                    <?php $link1='/view-user-answers/'.Crypt::encryptString($user->id); ?>
                    @endif
                    <div class="col-xs-4 user-stats user-stats-1">
                        <a href="{{ $link1 }}">
                            <span class="span-1">{{ $answersCount }}</span><br> answers
                        </a>
                    </div> 
                    <?php $link2='javascript:;'; ?>
                    @if(count($user->posts) > 0)
                    <?php $link2='/view-questions/'.Crypt::encryptString($user->id).'/'."PUBLISHED"; ?>
                    @endif
                    <div class="col-xs-4 user-stats user-stats-2">
                        <a href="{{ $link2 }}">
                            <span class="span-2">{{ count($user->posts) }}</span><br> questions
                        </a>
                    </div>
                    <?php $link3='javascript:;'; ?>
                    @if(count($postViews) > 0)
                    <?php $link3='/posts-with-views/'.Crypt::encryptString($user->id); ?>
                    @endif
                    <div class="col-xs-4 user-stats user-stats-3">
                        <a href="{{ $link3 }}">
                            <span class="span-3">{{ $postViews }}</span><br> views
                        </a>
                    </div>
                </div>
                <div class="pro-sec pro-sec-3">
                    <div class="">
                        <div class="col-md-12">
                            <ul class="user-info user-sidebar-list">
                                <li><a href="{{ $link2 }}">Published Questions ({{ count($user->posts) }})</a></li>
                                <li><a href="/draft-questions/{{ Crypt::encryptString($user->id) }}/DRAFT">Draft Questions ({{ $draftPostsCount }})</a></li>
                                <li><a href="/pending-questions/{{ Crypt::encryptString($user->id) }}/PENDING">Pending Questions ({{ $pendingPostsCount }})</a></li>
                                <li><a href="">Favorite Questions (10)</a></li>
                                <li><a href="/posts-with-views/{{ Crypt::encryptString($user->id) }}">Views ({{ $postViews }})</a></li>
                                <li><a href="">Badges (0)</a></li>
                            </ul>        
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                @if(!empty($user->biography))
                <div class="pro-sec pro-sec-1">
                    <h4>Biography</h4>
                    <span class="quotes pull-left"><i class="fa fa-quote-left" aria-hidden="true"></i></span>
                    <span class="quotes pull-right"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                    <p class="bio"><?= $user->biography ?></p>
                </div>
                @endif
                <div class="pro-sec ">
                    <ul class="user-info">
                        @if(!empty($user->work_company))
                            <li><i class="fa fa-briefcase" aria-hidden="true"></i> Works at {{ $user->work_company }}</li>
                        @endif
                        @if(!empty($user->designation))
                            <li><i class="fa fa-user-circle-o" aria-hidden="true"></i> Working as {{ $user->designation }}</li>
                        @endif
                        @if(!empty($user->country) && !empty($user->state))
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> Lives in {{ $user->state }} {{ $user->country }}</li>
                        @endif
                        <li>
                            <?php
                                $datetime1 = new DateTime($user->created_at);
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
                        @if(!empty($user->last_logged_in))
                            <li><i class="fa fa-eye" aria-hidden="true"></i> Last logged in at {{ date('d M,Y H:i:s',strtotime($user->last_logged_in)) }}</li>
                        @endif
                    </ul>         
                </div>
                @if(!empty($userCategories))
                <div class="pro-sec pro-sec-3 user-selected-categories">
                    <h4>Categories</h4>
                    <ul>
                        @foreach($userCategories as $cat)
                        <li>{{ $cat->name }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
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
@endsection