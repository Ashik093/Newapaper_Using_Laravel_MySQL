@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Photo Gallery</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Photo Gallery</li>
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
			    <h3 class="card-title">Photo Gallery Table</h3>
			    <button type="button" class="btn btn-danger btn-sm float-sm-right" data-toggle="modal" data-target="#modal-default">
                  Add New Photo
                </button>
                
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
			    <table id="example1" class="table table-bordered table-striped">
			      <thead>
			      <tr>
			        <th>Title</th>
			        <th>Photo</th>
			        <th>Type</th>
			        <th>Action</th>
			      </tr>
			      </thead>
			      <tbody>
			      @foreach($photos as $photo)
				    <tr>
				        <td>{{ $photo->title_en }} | {{ $photo->title_bn }}</td>
				        <td><img src="{{ URL::to($photo->photo) }}" style="height: 70px;width: 70px;" alt=""></td>
				        <td>
				        	@if($photo->type == 1)
								<span class="badge badge-success">Big Photo</span>
				        	@else
								<span class="badge badge-info">Small Photo</span>
				        	@endif
				        </td>
				        <td><div class="btn-group"><a href="{{ route('photo.gallery.edit',$photo->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a><a href="{{ route('photo.gallery.delete',$photo->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fas fa-trash-alt"></i></a></div></td>
				    </tr>
			      @endforeach()
			      </tbody>
			      <tfoot>
			      <tr>
			        <th>Title</th>
			        <th>Photo</th>
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
              <h4 class="modal-title">Add New Photo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('store.photo') }}" method="POST" enctype="multipart/form-data">
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
             	    	<option value="1">Big Photo</option>
             	    	<option value="0">Small Photo</option>
             	    </select>
             	  </div>
             	  @error('type')
             	      <div class="alert alert-danger">{{ $message }}</div>
             	  @enderror

             	  <div class="form-group">
             	  	<img src="#" alt="" id="image">
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