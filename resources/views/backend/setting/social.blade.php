@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Social Links</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Social Links</li>
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
				<h3 class="card-title">Social Links</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<form action="{{ route('update.social.link',$social->id) }}" method="post">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Facebook</label>
								<input type="text" name="facebook" id="facebook" class="form-control @error('facebook') is-invalid @enderror" value="{{ $social->facebook }}">
							</div>
							@error('facebook')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
							<div class="form-group">
								<label>Tweter</label>
								<input type="text" name="tweter" id="tweter" class="form-control @error('tweter') is-invalid @enderror" value="{{ $social->tweter }}">
							</div>
							@error('tweter')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
						</div>
						<!-- /.col -->
						<div class="col-md-6">
							<div class="form-group">
								<label>Instagram</label>
								<input type="text" name="instagram" id="instagram" class="form-control @error('instagram') is-invalid @enderror" value="{{ $social->instagram }}">
							</div>
							@error('instagram')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror

             	 			<div class="form-group">
								<label>Youtube</label>
								<input type="text" name="youtube" id="youtube" class="form-control @error('youtube') is-invalid @enderror" value="{{ $social->youtube }}">
							</div>
							@error('youtube')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
							
						</div>
						<!-- /.col -->
					</div>
					<button class="btn btn-info">Save</button>
				</form>
			</div>
        </div>
	</div><!-- /.container-fluid -->
</section>
@endsection()