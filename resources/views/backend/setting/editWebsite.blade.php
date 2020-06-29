@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Important Website</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Important Website</li>
	        </ol>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
	  <div class="container-fluid">
	    <!-- Small boxes (Stat box) -->
			<div class="card">
			  <div class="card-header bg-info">
			    <h3 class="card-title">Edit Website</h3>
			    <div class="btn-group float-sm-right">
                	<a href="{{ route('website') }}" class="btn btn-warning btn-sm float-sm-right">
                  		All Website
                	</a>
			    </div>
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
			    <form action="{{ route('update.website',$website->id) }}" method="POST">
            	@csrf
            	<div class="modal-body">
             	  <div class="form-group">
             	    <label>Name</label>
             	    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Website Name" value="{{ $website->name }}">
             	  </div>
             	  @error('name')
             	      <div class="alert alert-danger">{{ $message }}</div>
             	  @enderror
             	  <div class="form-group">
             	    <label>URL</label>
             	    <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror" placeholder="Enter website URL" value="{{ $website->url }}">
             	  </div>
             	  @error('url')
             	      <div class="alert alert-danger">{{ $message }}</div>
             	  @enderror
             	
            </div>
            <div class="modal-footer justify-content-between">
             
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
			  </div>
			  <!-- /.card-body -->
			</div>
	    <!-- /.row -->
	    <!-- Main row -->
	    <!-- /.row (main row) -->
	  </div><!-- /.container-fluid -->
	</section>
@endsection()