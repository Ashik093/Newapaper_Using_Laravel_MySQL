@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Notice</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Notice</li>
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
				<h3 class="card-title">Notice</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<form action="{{ route('update.notice',$notice->id) }}" method="post">
					@csrf
					<div class="row">
						<div class="col-md-6">
							@if($notice->status == 1)
								<a href="{{ route('deactive.notice',$notice->id) }}" class="btn btn-sm btn-danger" style="float: right;">Deactive</a>
							@elseif($notice->status == 0)
								<a href="{{ route('active.notice',$notice->id) }}" class="btn btn-sm btn-success" style="float: right;">Active</a>
							@endif
							<div class="form-group mt-4">
								<label>Notice EnglisH</label>
								<textarea name="notice_en" id="notice_en" class="form-control @error('notice_en') is-invalid @enderror">{{ $notice->notice_en }}</textarea>
							</div>
							@error('notice_en')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror

             	 			 <div class="form-group mt-4">
								<label>Notice Bangla</label>
								<textarea name="notice_bn" id="notice_bn" class="form-control @error('notice_bn') is-invalid @enderror">{{ $notice->notice_bn }}</textarea>
							</div>
							@error('notice_bn')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
             	 			 
             	 			 @if($notice->status == 1)
								<span class="text-success">Notice is now activated</span>
							@elseif($notice->status == 0)
								<span class="text-danger">Notice is now Deactivated</span>
							@endif
             	 			 
						</div>
						<!-- /.col -->
						<div class="col-md-6">
							
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