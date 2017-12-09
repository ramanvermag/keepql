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
                     
                    <img src="{{Storage::url('')}}{{ $user->avatar }}" class="kq_user_img"/>

                    <div class="button_container">
                        <button type="button" id="start-upload" class="btn btn-success">Save</button>
                        <button type="button" id="cancel-upload" class="btn btn-danger">Cancel</button>
                    </div>

                    <?php 
                        echo Plupload::make([
                            'url' => 'upload',
                            'dragdrop' => true,
                            'multi_selection'=>false,
                            'drop_element'=>'pro-sec'
                        ]);
                    ?>
                    <script type="text/javascript">
                        _uploader.bind('FilesAdded', function(up,files) {
                            // _uploader.start();
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
                            });
                            //on save
                            $('#start-upload').on('click', function(){
                                _uploader.start();
                                $('.button_container').css("display","none");
                            });
                        });
                        
                        _uploader.bind('FileUploaded', function(up,file,response) {
                            var res = JSON.parse(response.response);
                            //console.log(res,"dsfsdfds")
                            $(".kq_user_img").attr('src',res.file);
                             
                            //location.reload();
                        });
                    </script>

                    

                    <h3 class="kq_user">{{ $user->name }}</h3>
                    <span class="madal">
                        <img src="{{asset('/images/madal_03.png')}}"> 3 
                    </span>

                </div>
                <div class="pro-sec pro-sec-2">
                        <div class="col-xs-4 user-stats user-stats-1">
                            <span class="span-1">8,420</span> answers
                        </div> 
                        <div class="col-xs-4 user-stats user-stats-2">
                            <span class="span-2">69</span> questions
                        </div> 
                        <div class="col-xs-4 user-stats user-stats-3">
                            <span class="span-3">39,989</span> views
                        </div>

                </div>
                <div class="pro-sec pro-sec-3">
                    <div class="">

                        <div class="col-md-12">
                            <ul class="user-info">
                                <li><i class="fa fa-briefcase" aria-hidden="true"></i> Works at Unique Coders</li>
                                <li><i class="fa fa-user-circle-o" aria-hidden="true"></i> Working as Software Engineer</li>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i> Lives in Anaheim USA</li>
                                <li><i class="fa fa-history" aria-hidden="true"></i> Member Since 5 years, 1 months</li>
                                <li><i class="fa fa-eye" aria-hidden="true"></i> Last logged in 5 hours ago </li>
                                <li><i class="fa fa-globe" aria-hidden="true"></i> Personal Blog uniquecoders.in</li>
                            </ul>        
                        </div>
                    </div>
                </div> 

                
            </div>
        <div class="col-md-8">
                <div class="pro-sec pro-sec-1">
                    <h4>Biography</h4>
                    <span class="quotes pull-left"><i class="fa fa-quote-left" aria-hidden="true"></i></span>
                    <span class="quotes pull-right"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                    <p class="bio">I am a full-stack Web Application Developer and Software Developer. I am both driven and self-motivated, and I am constantly experimenting with new technologies and techniques. Always inspired to learn and acomplish new opportunities.</p>
                    
                </div>  

                <div class="pro-sec ">
                    <ul>
                        <li><i class="fa fa-briefcase" aria-hidden="true"></i> Works at Unique Coders</li>
                        <li><i class="fa fa-user-circle-o" aria-hidden="true"></i> Working as Software Engineer</li>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Lives in Anaheim USA</li>
                        <li><i class="fa fa-history" aria-hidden="true"></i> Member Since 5 years, 1 months</li>
                        <li><i class="fa fa-eye" aria-hidden="true"></i> Last logged in 5 hours ago </li>
                        <li><i class="fa fa-globe" aria-hidden="true"></i> Personal Blog uniquecoders.in</li>
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
                

                
                <!-- <div class="pro-sec pro-sec-3">
                    
                    <form enctype="multipart/form-data" action="{{ url('/profile') }}" method="POST">
                         {{ csrf_field() }}
                        <label> Update profile picture: </label>
                        <input type="file" name="avatar"/>
                        <input type="submit" class="chng-img" value="Update picture"/>
                    </form> 

                </div>  -->


        </div>
        
            
        </div>
    </div>
</div>


@endsection
