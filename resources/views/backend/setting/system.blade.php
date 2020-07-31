@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">System Setting</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">System Setting</li>
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
				<h3 class="card-title">System Setting</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<form action="{{ route('update.setting',$system->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Address (English)</label>
								<textarea name="address_en" id="address_en" class="form-control @error('address_en') is-invalid @enderror">{{ $system->address_en }}</textarea>
								
							</div>
							@error('address_en')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
             	 			 <div class="form-group">
								<label>Phone (English)</label>
								<input type="text" name="phone_en" id="phone_en" class="form-control @error('phone_en') is-invalid @enderror" value="{{ $system->phone_en }}">
							</div>
							@error('phone_en')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
             	 			 <div class="form-group">
								<label>Email</label>
								<input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $system->email }}">
							</div>
							@error('email')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
						</div>
						<!-- /.col -->
						<div class="col-md-6">
							<div class="form-group">
								<label>Address (Bangla)</label>
								<textarea name="address_bn" id="address_bn" class="form-control @error('address_bn') is-invalid @enderror">{{ $system->address_bn }}</textarea>
							</div>
							@error('address_bn')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
             	 			 <div class="form-group">
								<label>Phone (Bangla)</label>
								<input type="text" name="phone_bn" id="phone_bn" class="form-control @error('phone_bn') is-invalid @enderror" value="{{ $system->phone_bn }}">
							</div>
							@error('phone_bn')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
							<div class="form-group">
								<img src="{{ url($system->logo) }}" alt="" id="image" style="width: 100px;height: 80px;">
								<label for="exampleInputFile">File input</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file"  accept="image/*" name="logo" id="image" class="custom-file-input" id="exampleInputFile" onchange="readURL(this);">
										<label class="custom-file-label" for="exampleInputFile">Choose file</label>
									</div>
								</div>
							</div>
							
						</div>
						<!-- /.col -->
					</div>
					<button class="btn btn-info">Update</button>
				</form>
			</div>
        </div>
	</div><!-- /.container-fluid -->
</section>
@endsection()