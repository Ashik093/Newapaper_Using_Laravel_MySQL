@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Edit Photo Gallery</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Edit Photo Gallery</li>
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
				<h3 class="card-title">Edit Photo Gallery</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<form action="{{ route('update.photo',$photo->id) }}" method="POST" enctype="multipart/form-data">
					@csrf
				<div class="modal-body">
				 	  <div class="form-group">
				 	    <label>Title (English)</label>
				 	    <input type="text" name="title_en" id="title_en" class="form-control @error('title_en') is-invalid @enderror" placeholder="Enter Title (English)" value="{{ $photo->title_en }}">
				 	  </div>
				 	  @error('title_en')
				 	      <div class="alert alert-danger">{{ $message }}</div>
				 	  @enderror
				 	  <div class="form-group">
				 	    <label>Title (Bangla)</label>
				 	    <input type="text" name="title_bn" id="title_bn" class="form-control @error('title_bn') is-invalid @enderror" placeholder="Enter Title (Bangla)" value="{{ $photo->title_bn }}">
				 	  </div>
				 	  @error('title_bn')
				 	      <div class="alert alert-danger">{{ $message }}</div>
				 	  @enderror

				 	  <div class="form-group">
				 	    <label>Type</label>
				 	    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
				 	    	<option selected="" disabled="">Select Type</option>
				 	    	<option value="1" @if($photo->type == 1) selected="" @endif>Big Photo</option>
				 	    	<option value="0" @if($photo->type == 0) selected="" @endif>Small Photo</option>
				 	    </select>
				 	  </div>
				 	  @error('type')
				 	      <div class="alert alert-danger">{{ $message }}</div>
				 	  @enderror

				 	  <div class="form-group">
				 	  	<img src="{{ URL::to($photo->photo) }}" style="height: 70px;width: 70px;" alt="" id="image">
				 	  	<label for="exampleInputFile">File input</label>
				 	  	<div class="input-group">
				 	  		<div class="custom-file">
				 	  			<input type="file"  accept="image/*" name="photo" id="photo" class="custom-file-input" id="exampleInputFile" onchange="readURL(this);">
				 	  			<label class="custom-file-label" for="exampleInputFile">Choose file</label>
				 	  		</div>
				 	  	</div>
				 	  </div>
				 	
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