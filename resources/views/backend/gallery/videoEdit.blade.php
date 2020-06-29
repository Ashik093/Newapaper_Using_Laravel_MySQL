@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Edit Video Gallery</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Edit Video Gallery</li>
	        </ol>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="card card-default">
			<div class="card-header bg-info">
				<h3 class="card-title">Edit Video Gallery</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<form action="{{ route('update.video',$video->id) }}" method="POST" enctype="multipart/form-data">
					@csrf
				<div class="modal-body">
				 	  <div class="form-group">
				 	    <label>Title (English)</label>
				 	    <input type="text" name="title_en" id="title_en" class="form-control @error('title_en') is-invalid @enderror" placeholder="Enter Title (English)" value="{{ $video->title_en }}">
				 	  </div>
				 	  @error('title_en')
				 	      <div class="alert alert-danger">{{ $message }}</div>
				 	  @enderror
				 	  <div class="form-group">
				 	    <label>Title (Bangla)</label>
				 	    <input type="text" name="title_bn" id="title_bn" class="form-control @error('title_bn') is-invalid @enderror" placeholder="Enter Title (Bangla)" value="{{ $video->title_bn }}">
				 	  </div>
				 	  @error('title_bn')
				 	      <div class="alert alert-danger">{{ $message }}</div>
				 	  @enderror

				 	  <div class="form-group">
				 	    <label>Type</label>
				 	    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
				 	    	<option selected="" disabled="">Select Type</option>
				 	    	<option value="1" @if($video->type == 1) selected="" @endif>Big Frame</option>
				 	    	<option value="0" @if($video->type == 0) selected="" @endif>Small Frame</option>
				 	    </select>
				 	  </div>
				 	  @error('type')
				 	      <div class="alert alert-danger">{{ $message }}</div>
				 	  @enderror

				 	  <div class="form-group">
				 	  	
				 	  	<label for="exampleInputFile">Embed Code</label>
				 	  	<textarea name="embed_code" id="embed_code" class="form-control @error('embed_code') is-invalid @enderror">{{ $video->embed_code }}</textarea>
				 	  </div>
				 	  @error('embed_code')
				 	      <div class="alert alert-danger">{{ $message }}</div>
				 	  @enderror
				 	
				</div>
				<div class="modal-footer justify-content-between">
				  <button type="submit" class="btn btn-primary">Update</button>
				</div>
				</form>
			</div>
        </div>
	</div><!-- /.container-fluid -->
</section>
@endsection()