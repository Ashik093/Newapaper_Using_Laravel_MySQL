@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Prayer</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Praye</li>
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
				<h3 class="card-title">Prayer</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<form action="{{ route('update.prayer',$prayer->id) }}" method="post">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Fajr English</label>
								<input type="text" name="fajr_en" id="fajr_en" class="form-control @error('fajr_en') is-invalid @enderror" value="{{ $prayer->fajr_en }}">
							</div>
							@error('fajr_en')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
             	 			 <div class="form-group">
								<label>Johr English</label>
								<input type="text" name="johr_en" id="johr_en" class="form-control @error('johr_en') is-invalid @enderror" value="{{ $prayer->johr_en }}">
							</div>
							@error('johr_en')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
							<div class="form-group">
								<label>Asor English</label>
								<input type="text" name="asor_en" id="asor_en" class="form-control @error('asor_en') is-invalid @enderror" value="{{ $prayer->asor_en }}">
							</div>
							@error('asor_en')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
             	 			<div class="form-group">
								<label>Marib English</label>
								<input type="text" name="magrib_en" id="magrib_en" class="form-control @error('magrib_en') is-invalid @enderror" value="{{ $prayer->magrib_en }}">
							</div>
							@error('magrib_en')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
             	 			<div class="form-group">
								<label>Esha English</label>
								<input type="text" name="esha_en" id="esha_en" class="form-control @error('esha_en') is-invalid @enderror" value="{{ $prayer->esha_en }}">
							</div>
							@error('esha_en')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
						</div>
						<!-- /.col -->
						<div class="col-md-6">
							<div class="form-group">
								<label>Fajr Bangla</label>
								<input type="text" name="fajr_bn" id="fajr_bn" class="form-control @error('fajr_bn') is-invalid @enderror" value="{{ $prayer->fajr_bn }}">
							</div>
							@error('fajr_bn')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
             	 			 <div class="form-group">
								<label>Johr Bangla</label>
								<input type="text" name="johr_bn" id="johr_bn" class="form-control @error('johr_bn') is-invalid @enderror" value="{{ $prayer->johr_bn }}">
							</div>
							@error('johr_en')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
							<div class="form-group">
								<label>Asor Bangla</label>
								<input type="text" name="asor_bn" id="asor_bn" class="form-control @error('asor_bn') is-invalid @enderror" value="{{ $prayer->asor_bn }}">
							</div>
							@error('asor_bn')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
             	 			<div class="form-group">
								<label>Marib Bangla</label>
								<input type="text" name="magrib_bn" id="magrib_bn" class="form-control @error('magrib_bn') is-invalid @enderror" value="{{ $prayer->magrib_bn }}">
							</div>
							@error('magrib_bn')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
             	 			<div class="form-group">
								<label>Esha Bangla</label>
								<input type="text" name="esha_bn" id="esha_bn" class="form-control @error('esha_bn') is-invalid @enderror" value="{{ $prayer->esha_bn }}">
							</div>
							@error('esha_bn')
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