@extends('layouts.app')
@section('content')
<style>
/*
 * bootstrap-tagsinput v0.8.0
 * 
 */

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
@if(!empty($errors))
<?php //echo "<pre>"; print_r($errors); 
?>
@endif
    

<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
<div class="login-section">
    <div class="container">
    	<div class="login-form">
		    <h2>Ask a Question</h2>
		</div>
        @if(Session::has('success'))
            <p class="alert alert-success">{{ Session::get('success') }}</p>
        @endif
    	<form  method="POST" action="{{ url('saveQuestion') }}" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
            	<label class="control-label col-md-4">Title</label>
                <div class="col-md-5">
                    <input type="hidden" name="id" value="@if(isset($postData['id'])) {{ Crypt::encryptString($postData['id']) }} @endif">
                    <input type="text" id="title" class="form-control" name="title" placeholder="Title" required="true" value="@if(isset($postData['title']) AND !empty($postData['title'])) {{ $postData['title'] }} @endif">
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
            	<label class="control-label col-md-4">Slug</label>
                <div class="col-md-5">
                    <input type="text" id="slug" class="form-control" name="slug" placeholder="Slug" required="true" value="@if(isset($postData['slug']) AND !empty($postData['slug'])) {{ $postData['slug'] }} @endif">
                    @if ($errors->has('slug'))
                        <span class="help-block">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
            	<label class="control-label col-md-4">Description</label>
                <div class="col-md-5">
                    <textarea class="form-control ckeditor" name="body" required="true" >@if(isset($postData['body']) AND !empty($postData['body'])) {{ $postData['body'] }} @endif</textarea>
                    @if ($errors->has('body'))
                        <span class="help-block">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
            	<label class="control-label col-md-4">Category</label>
                <div class="col-md-5">
                   	<select class="form-control" name="category_id" required="true">
                   		<option value="">Select Category</option>
                   		@foreach($allCategories as $cat)
                   			<option value="{{ $cat->id }}" @if(isset($postData['category_id']) AND !empty($postData['category_id']) AND $postData['category_id']==$cat->id) {{ "selected" }} @endif>{{ $cat->name }}</option>
                   		@endforeach
                   	</select>
                    @if ($errors->has('category_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <?php
                $statusArray = array(
                    'PUBLISHED','DRAFT','PENDING'
                );
            ?>
            <div class="form-group">
            	<label class="control-label col-md-4">Status</label>
                <div class="col-md-5">
                   	<select class="form-control" name="status" required="true">
                   		<option value="">Select Status</option>
                   		@foreach($statusArray as $status)
                        <option value="{{ $status }}"  @if(isset($postData['status']) AND !empty($postData['status']) AND $postData['status']==$status) {{ "selected" }} @endif>{{ $status }}</option>
                        @endforeach
                   	</select>
                </div>
            </div>
            <div class="form-group">
            	<label class="control-label col-md-4">Tags</label>
                <div class="col-md-5">
                   	<input type="text" class="form-control" name="tags_values"  value="@if(isset($postData['tags']) AND !empty($postData['tags'])) {{ $postData['tags'] }} @endif" data-role="tagsinput" >
                    @if ($errors->has('tags_values'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tags_values') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
            	<label class="control-label col-md-4">SEO Title</label>
                <div class="col-md-5">
                   	<input type="text" class="form-control" name="seo_title" value="@if(isset($postData['seo_title']) AND !empty($postData['seo_title'])) {{ $postData['seo_title'] }} @endif">
                </div>
            </div>
            <div class="form-group">
            	<label class="control-label col-md-4">Meta Description</label>
                <div class="col-md-5">
                   	<textarea class="form-control" name="meta_description">@if(isset($postData['meta_description']) AND !empty($postData['meta_description'])) {{ $postData['meta_description'] }} @endif</textarea>
                </div>
            </div>
            <div class="form-group">
            	<label class="control-label col-md-4">Meta Keywords</label>
                <div class="col-md-5">
                   	<textarea class="form-control" name="meta_keywords">@if(isset($postData['meta_keywords']) AND !empty($postData['meta_keywords'])) {{ $postData['meta_keywords'] }} @endif</textarea>
                </div>
            </div>
            <div class="form-group">
            	<label class="control-label col-md-4">Upload Image</label>
                <div class="col-md-5">
                    @if(isset($postData['image']) AND !empty($postData['image']))
                    <img src="{{Storage::url('')}}{{ $postData['image'] }}" style="width:200px;height:150px;">
                    <input type="hidden" name="old_image" id="old-image" value="{{ $postData['image'] }}">
                    @endif
                	<input type="file" name="image" class="form-control">
                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>
            </div> 
            <div class="form-group">
                <div class="">
                    <button type="submit" class="btn btn-danger">Save Question</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript">
CKEDITOR.replace( 'body' );
$(document).ready(function(){
	$('#title').on('keyup',function() {
	    var str = this.value;
		str = str.replace(/\s+/g, '-').toLowerCase();
	    $('#slug').val(str);
	});
})
</script>
@endsection