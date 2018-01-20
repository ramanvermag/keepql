@extends('layouts.app')
@section('content')
<style>
.main-content-div{
	float:left;
	width:100%;
	padding: 15px;
}

.menu1-div{
	width: 85%;
	margin: 0 auto;
	padding: 10px;
}
.menu1-div input{
	border: 1px solid #e9edf0;
	border-radius: 3px;
	margin: 10px 0;
	padding: 10px;
	width: 100%;
	font-size: 13px;
}
.menu1-div label{
	line-height:3;
}
.bootstrap-tagsinput {
  background-color: #fff;
  border: 1px solid #ccc;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  display: inline-block;
  padding: 4px 6px;
  color: #555;
  vertical-align: middle;
  border-radius: 4px;
  max-width: 100%;
  width: 100%;
  line-height: 22px;
  cursor: text;
  text-align: left;
}
.bootstrap-tagsinput input {
  border: none;
  box-shadow: none;
  outline: none;
  background-color: transparent;
  padding: 0 6px;
  margin: 0;
  width: auto;
  max-width: inherit;
}
</style>
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
<div class="login-section">
    <div class="container">
        <div class="login-form">
            <h2>Edit Profile</h2>
        </div>
        <div class="col-sm-12">
			<ul class="nav nav-tabs">
			    <li class="active"><a data-toggle="tab" href="#home">Basic Information</a></li>
			    <li><a data-toggle="tab" href="#menu1">Change Password</a></li>
			    <li><a data-toggle="tab" href="#menu2">Change Avatar</a></li>
			    <li><a data-toggle="tab" href="#menu3">Other Information</a></li>
		  	</ul>
		</div>
  		<div class="tab-content main-content-div">
		    <div id="home" class="tab-pane fade in active">
		      	<div class="menu1-div">
		      		<div class="show-info-messages">
		      		</div>
		            <form id="basic-info-form" class="form-horizontal" role="form" method="POST" action="javascript:;">
		                <div class="form-group">
		                	<label class="control-label col-md-4">Name</label>
		                    <div class="col-md-4">
		                        <input id="name" type="text" class="form-control" name="name" value="@if(isset(Auth::user()->name)) {{ Auth::user()->name }} @endif" placeholder="Username" required="true">
		                    </div>
		                </div>
		                <div class="form-group">
		                	<label class="control-label col-md-4">Email</label>
		                    <div class="col-md-4">
		                        <input id="email" type="email" class="form-control" name="email" value="@if(isset(Auth::user()->email)) {{ Auth::user()->email }} @endif" placeholder="Email" required="true">
		                    </div>
		                </div>
		                <div class="form-group">
		                	<label class="control-label col-md-4">Country</label>
		                    <div class="col-md-4">
		                        <select class="form-control" name="country" required="true">
		                            <option value="">Select Country</option>
		                            @foreach($allCountries as $country)
		                            <?php 
		                            	$selected = '';
		                            	if($country->country_name==Auth::user()->country){
		                            		$selected = 'selected';
		                            	}
		                            ?>
		                            <option value="{{ $country->country_name }}" {{ $selected }}>{{ $country->country_name }}</option>
		                            @endforeach
		                        </select>
		                    </div>
		                </div>
		                <div class="form-group">
		                	<label class="control-label col-md-4">State</label>
		                    <div class="col-md-4">
		                        <input  type="text" class="form-control" name="state" placeholder="State" value="@if(isset(Auth::user()->state)) {{ Auth::user()->state }} @endif" required="true">
		                    </div>
		                </div>
		                <div class="form-group">
		                	<label class="control-label col-md-4">City</label>
		                    <div class="col-md-4">
		                        <input  type="text" class="form-control" name="city" placeholder="City" value="@if(isset(Auth::user()->city)) {{ Auth::user()->city }} @endif" required="true">
		                    </div>
		                </div>
		                <div class="form-group">
		                    <div class="col-md-12">
		                        <span class="button">
		                        	<button type="button" class="btn btn-danger btn-save-info save-basic-info">Save Changes</button>
		                        </span>
		                    </div>
		                </div>
		            </form>
		        </div>
		    </div>
		    <div id="menu1" class="tab-pane fade">
		    	<div class="menu1-div">
		    		<div class="show-password-messages">
		      		</div>
			      	<form id="change-password-form" class="form-horizontal" role="form" method="POST" action="javascript:;">
		                <div class="form-group">
		                	<label class="control-label col-md-4">Current Password</label>
		                    <div class="col-md-4">
		                        <input type="password" class="form-control" name="current_password" placeholder="Current Password" required="true">
		                    </div>
		                </div>
		                <div class="form-group">
		                	<label class="control-label col-md-4">New Password</label>
		                    <div class="col-md-4">
		                        <input type="password" class="form-control" name="new_password" placeholder="New Password" required="true">
		                    </div>
		                </div>
		                <div class="form-group">
		                	<label class="control-label col-md-4">Confirm New Password</label>
		                    <div class="col-md-4">
		                        <input type="password" class="form-control" name="confirm_new_password" placeholder="New Password" required="true">
		                    </div>
		                </div>
		                <div class="form-group">
		                    <div class="col-md-12">
		                        <span class="button">
		                        	<button type="button" class="btn btn-danger save-password-info">Save Changes</button>
		                        </span>
		                    </div>
		                </div>
		            </form>
	        	</div>
		    </div>
		    <div id="menu2" class="tab-pane fade">
		    	<div class="form">
		    		<div>
		    		<?php if(!empty(Auth::user()->avatar)){ ?>
		    			<img id="show-preview" src="{{Storage::url('')}}{{ Auth::user()->avatar }}" id="kq_user_img"/>
		    		<?php } ?>
		    		</div>
			      	<form enctype="multipart/form-data" action="{{ url('/edit-profile') }}" method="POST">
			      		{{ csrf_field() }}
	                    <label> Update Avatar: </label>
	                    <input type="file" name="file" id="user-logo"/>
	                    <input type="submit" class="chng-img" value="Update Avatar"/>
	                </form>
	            </div>
		    </div>
		    <div id="menu3" class="tab-pane fade">
		    	<div class="menu1-div">
		    		<div class="work-info-messages">
		      		</div>
			      	<form id="work-info-form" class="form-horizontal" role="form" method="POST" action="javascript:;">
		                <div class="form-group">
		                	<label class="control-label col-md-4">Company Name</label>
		                    <div class="col-md-7">
		                        <input type="text" class="form-control" name="work_company" value="@if(isset(Auth::user()->work_company)) {{ Auth::user()->work_company }} @endif" placeholder="Company Name" required="true">
		                    </div>
		                </div>
		                <div class="form-group">
		                	<label class="control-label col-md-4">Designation</label>
		                    <div class="col-md-7">
		                        <input type="text" class="form-control" name="designation" value="@if(isset(Auth::user()->designation)) {{ Auth::user()->designation }} @endif" placeholder="Designation" required="true">
		                    </div>
		                </div>
		                <div class="form-group">
		                	<label class="control-label col-md-4">Your Skills</label>
		                    <div class="col-md-7">
		                        <input type="text" class="form-control" name="skills" value="@if(isset(Auth::user()->skills)) {{ Auth::user()->skills }} @endif" required="true" data-role="tagsinput">
		                    </div>
		                </div>
		                <div class="form-group">
		                	<label class="control-label col-md-4">Biography</label>
		                    <div class="col-md-7">
		                        <textarea class="form-control ckeditor" id="bio-data" name="biography">@if(isset(Auth::user()->biography)) {{ Auth::user()->biography }} @endif</textarea>
		                    </div>
		                </div>
		                <div class="form-group">
		                	<label class="control-label col-md-4">Category</label>
		                    <div class="col-md-7">
		                    	<?php
		                    		$categories = '';
		                    		if(!empty($user->category_ids)){
		                    			$categories = explode(',',$user->category_ids);
		                    		}
		                    	?>
		                        <select name="category_ids[]" class="selectpicker form-control" data-live-search="true" multiple data-max-options="5">
							        @if(!empty($allCategories))
							        	@foreach($allCategories as $category)
							        	<option value="{{ $category->id }}" <?php if(!empty($categories)){ if(in_array($category->id,$categories)){ echo "selected"; } } ?>>{{ $category->name }}</option>
							        	@endforeach
							        @endif
							        <option >Tom Foolery</option>
							  	</select>
		                    </div>
		                </div>
		                <div class="form-group">
		                    <div class="col-md-12">
		                        <span class="button">
		                        	<button type="button" class="btn btn-danger save-work-info">Save Changes</button>
		                        </span>
		                    </div>
		                </div>
		            </form>
	        	</div>
		    </div>
  		</div>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
CKEDITOR.replace('biography');
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
	$('.save-basic-info').on('click',function(){
		$.ajax({
			type:'POST',
			url:'change_basic_info',
			data:$('#basic-info-form').serialize(),
			success:function(resp){
				if(resp=="empty"){
					$('.show-password-messages').html('<div class="alert alert-danger fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error!</strong>Please fill all the fields.</div>');
					return false;
				}
				else{
					$('.show-password-messages').html('<div class="alert alert-success fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong>Information updated successfully.</div>');
					return false;
				}
			}
		})
	});
	 	$('.save-password-info').on('click',function(){
		$.ajax({
			type:'POST',
			url:'change_password',
			data:$('#change-password-form').serialize(),
			success:function(resp){
				$('.show-password-messages').html(resp);
			}
		});
	});
	$('.save-work-info').on('click',function(){
		var content = CKEDITOR.instances['bio-data'].getData();
		$('#bio-data').val(content);
		$.ajax({
			type:'POST',
			url:'save_work_info',
			data:$('#work-info-form').serialize(),
			success:function(resp){
				$('.work-info-messages').html(resp);
			}
		})
	});
	$('#user-logo').on('change',function(input){
	    readURL(this);
	});

})
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#show-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection