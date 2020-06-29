@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Video Gallery</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Video Gallery</li>
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
			    <h3 class="card-title">Video Gallery Table</h3>
			    <button type="button" class="btn btn-danger btn-sm float-sm-right" data-toggle="modal" data-target="#modal-default">
                  Add New Video
                </button>
                
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
			    <table id="example1" class="table table-bordered table-striped">
			      <thead>
			      <tr>
			        <th>Title</th>
			        <th>Embed Code</th>
			        <th>Type</th>
			        <th>Action</th>
			      </tr>
			      </thead>
			      <tbody>
			      @foreach($videos as $video)
				    <tr>
				        <td>{{ $video->title_en }} | {{ $video->title_bn }}</td>
				        <td>{{ $video->embed_code }}</td>
				        <td>
				        	@if($video->type == 1)
								<span class="badge badge-success">Big Frame</span>
				        	@else
								<span class="badge badge-info">Small Frame</span>
				        	@endif
				        </td>
				        <td><div class="btn-group"><a href="{{ route('video.gallery.edit',$video->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a><a href="{{ route('video.gallery.delete',$video->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fas fa-trash-alt"></i></a></div></td>
				    </tr>
			      @endforeach()
			      </tbody>
			      <tfoot>
			      <tr>
			        <th>Title</th>
			        <th>Embed Code</th>
			        <th>Type</th>
			        <th>Action</th>
			      </tr>
			      </tfoot>
			    </table>
			  </div>
			  <!-- /.card-body -->
			</div>
	    <!-- /.row -->
	    <!-- Main row -->
	    <!-- /.row (main row) -->
	  </div><!-- /.container-fluid -->
	</section>



	<!--modal-->
	<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">Add New Video</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('store.video') }}" method="POST" enctype="multipart/form-data">
            	@csrf
            <div class="modal-body">
             	  <div class="form-group">
             	    <label>Title (English)</label>
             	    <input type="text" name="title_en" id="title_en" class="form-control @error('title_en') is-invalid @enderror" placeholder="Enter Title (English)">
             	  </div>
             	  @error('title_en')
             	      <div class="alert alert-danger">{{ $message }}</div>
             	  @enderror
             	  <div class="form-group">
             	    <label>Title (Bangla)</label>
             	    <input type="text" name="title_bn" id="title_bn" class="form-control @error('title_bn') is-invalid @enderror" placeholder="Enter Title (Bangla)">
             	  </div>
             	  @error('title_bn')
             	      <div class="alert alert-danger">{{ $message }}</div>
             	  @enderror

             	  <div class="form-group">
             	    <label>Type</label>
             	    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
             	    	<option selected="" disabled="">Select Type</option>
             	    	<option value="1">Big Frame</option>
             	    	<option value="0">Small Frame</option>
             	    </select>
             	  </div>
             	  @error('type')
             	      <div class="alert alert-danger">{{ $message }}</div>
             	  @enderror

             	  <div class="form-group">
             	  	
             	  	<label for="exampleInputFile">Embed Code</label>
             	  	<textarea name="embed_code" id="embed_code" class="form-control @error('embed_code') is-invalid @enderror"></textarea>
             	  </div>
             	  @error('embed_code')
             	      <div class="alert alert-danger">{{ $message }}</div>
             	  @enderror
             	
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection()