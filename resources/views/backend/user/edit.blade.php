@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Edit Writter</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Edit Writter</li>
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
				<h3 class="card-title">Edit Writter</h3>
				<a href="{{ route('all.user') }}" class="btn btn-danger btn-sm float-sm-right">
                  All Writter
                </a> 
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<form action="{{ route('update.user',$row->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Full Name</label>
								<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Full Name" value="{{ $row->name }}">
							</div>
							@error('name')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
             	 			 <div class="form-group">
             	 			 	<label>Role</label>
             	 			 	<div class="row">
             	 			 		<div class="col-md-6">
             	 			 			<div class="custom-control custom-checkbox">
             	 			 				<input class="custom-control-input" type="checkbox" name="type" value="1" id="customCheckbox1" @if($row->type == 1) checked="" @endif>
             	 			 				<label for="customCheckbox1" class="custom-control-label">Super Admin</label>
             	 			 			</div>
             	 			 			<div class="custom-control custom-checkbox">
             	 			 				<input class="custom-control-input" type="checkbox" name="category" value="1" id="customCheckbox2" @if($row->category == 1) checked="" @endif>
             	 			 				<label for="customCheckbox2" class="custom-control-label">Category</label>
             	 			 			</div>
             	 			 			<div class="custom-control custom-checkbox">
             	 			 				<input class="custom-control-input" type="checkbox" name="division" value="1" id="customCheckbox3" @if($row->division == 1) checked="" @endif>
             	 			 				<label for="customCheckbox3" class="custom-control-label">Division</label>
             	 			 			</div>
             	 			 			<div class="custom-control custom-checkbox">
             	 			 				<input class="custom-control-input" type="checkbox" name="post" value="1" id="customCheckbox4" @if($row->post == 1) checked="" @endif>
             	 			 				<label for="customCheckbox4" class="custom-control-label">Post</label>
             	 			 			</div>
             	 			 		</div>
             	 			 		<div class="col-md-6">
             	 			 			<div class="custom-control custom-checkbox">
             	 			 				<input class="custom-control-input" type="checkbox" name="setting" value="1" id="customCheckbox5" @if($row->setting == 1) checked="" @endif>
             	 			 				<label for="customCheckbox5" class="custom-control-label">Setting</label>
             	 			 			</div>
             	 			 			<div class="custom-control custom-checkbox">
             	 			 				<input class="custom-control-input" type="checkbox" name="gallery" value="1" id="customCheckbox6" @if($row->gallery == 1) checked="" @endif>
             	 			 				<label for="customCheckbox6" class="custom-control-label">Gallery</label>
             	 			 			</div>
             	 			 			<div class="custom-control custom-checkbox">
             	 			 				<input class="custom-control-input" type="checkbox" name="ads" value="1" id="customCheckbox7" @if($row->ads == 1) checked="" @endif>
             	 			 				<label for="customCheckbox7" class="custom-control-label">Ads</label>
             	 			 			</div>
             	 			 			<div class="custom-control custom-checkbox">
             	 			 				<input class="custom-control-input" type="checkbox" name="role" value="1" id="customCheckbox8" @if($row->role == 1) checked="" @endif>
             	 			 				<label for="customCheckbox8" class="custom-control-label">Role</label>
             	 			 			</div>
             	 			 		</div>
             	 			 	</div>
             	 			 </div>
							
						</div>


						<!-- /.col -->
						<div class="col-md-6">
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" value="{{ $row->email }}">
							</div>
							@error('email')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
							
						</div>
						<!-- /.col -->
					</div>
					
					<button class="btn btn-info">Add Writter</button>
				</form>
			</div>
        </div>
	</div><!-- /.container-fluid -->
</section>
@endsection()