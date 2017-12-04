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
                <div class="pro-sec pro-sec-1">

                    <img src="/keeplaralatest/storage/app/public/{{ $user->avatar }}" class="kq_user_img"/>
                    <h3 class="kq_user">{{ $user->name }}</h3>
                    <span class="madal">
                        <img src="http://localhost/keeplaralatest/public/images/madal_03.png"> 3 
                    </span>

                </div>
                <div class="pro-sec pro-sec-2">
                        <div class="col-md-4 user-stats user-stats-1">
                                <span class="span-1">8,420</span> answers
                        </div> 
                        <div class="col-md-4 user-stats user-stats-2">
                                <span class="span-2">69</span> questions
                        </div> 
                        <div class="col-md-4 user-stats user-stats-3">
                                <span class="span-3">39,989</span> views
                        </div>

                </div>
                <div class="pro-sec pro-sec-3">
                    <div class="">

                        <div class="col-md-12">
                            <ul>
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
                

                
                <div class="pro-sec pro-sec-3">
                    <p>    
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse placerat felis id congue varius. Cras rutrum mi et eleifend ullamcorper. Fusce dictum maximus ipsum, sed convallis velit auctor ac. Vivamus fermentum odio sit amet ex iaculis, a faucibus tellus aliquam. Nam eu odio at nisl blandit bibendum. Mauris consectetur interdum gravida. Donec eu nisi ut eros egestas pretium.

                        Maecenas tristique turpis nec erat mollis elementum. Sed viverra ex sit amet mattis blandit. Vestibulum tempor lacus elit, a laoreet orci accumsan sed. Pellentesque magna odio, ultrices non sagittis ac, sodales sed ante. Suspendisse scelerisque ullamcorper orci, vel faucibus eros malesuada vel. Suspendisse fermentum eros in odio ornare, efficitur tempus ipsum pharetra. Aliquam eros ante, volutpat eget eleifend vitae, varius non ex. In hac habitasse platea dictumst. Aliquam sollicitudin lobortis dolor quis dignissim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean in libero sagittis, bibendum mi nec, tincidunt lectus. Vestibulum nec velit scelerisque, egestas mi et, lobortis libero. Aliquam in lacus vel mi lacinia elementum a at mi.
                    </p>    

                    <form enctype="multipart/form-data" action="{{ url('/profile') }}" method="POST">
                         {{ csrf_field() }}
                        <label> Update profile picture: </label>
                        <input type="file" name="avatar"/>
                        <input type="submit" class="chng-img" value="Update picture"/>
                    </form> 
                </div> 


        </div>
        
            
        </div>
    </div>
</div>


@endsection
