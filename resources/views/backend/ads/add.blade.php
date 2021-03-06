@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Insert Ads</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Insert Ads</li>
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
				<h3 class="card-title">Insert Ads</h3>
				<a href="{{ route('all.ads') }}" class="btn btn-danger btn-sm float-sm-right">
                  All Ads
                </a> 
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<form action="{{ route('store.ads') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Ads Type</label>
								<select class="form-control select2bs4 @error('type') is-invalid @enderror" name="type" id="type" style="width: 100%;">
									<option selected="selected" disabled="">==Chose One==</option>
									<option value="0">Horizontal Ads</option>
									<option value="1">Vertical Ads</option>
								</select>
							</div>
							@error('type')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
							<div class="form-group">
								<label>Link</label>
								<input type="text" name="link" id="link" class="form-control @error('link') is-invalid @enderror" placeholder="Enter Link">
							</div>
							@error('link')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
						</div>
						<!-- /.col -->
						<div class="col-md-6">
							<div class="form-group">
								<img src="#" alt="" id="image">
								<label for="exampleInputFile">File input</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file"  accept="image/*" name="ads" id="image" class="custom-file-input" id="exampleInputFile" onchange="readURL(this);" required="">
										<label class="custom-file-label" for="exampleInputFile">Choose file</label>
									</div>
								</div>
							</div>
							
						</div>
						<!-- /.col -->
					</div>
					<button class="btn btn-info">Insert</button>
				</form>
			</div>
        </div>
	</div><!-- /.container-fluid -->
</section>
@endsection()