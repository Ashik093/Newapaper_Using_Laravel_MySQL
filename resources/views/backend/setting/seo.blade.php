@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">SEO</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">SEO</li>
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
				<h3 class="card-title">SEO</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<form action="{{ route('update.seo',$seo->id) }}" method="post">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Author English</label>
								<input type="text" name="meta_author_en" id="meta_author_en" class="form-control @error('meta_author_en') is-invalid @enderror" value="{{ $seo->meta_author_en }}">
							</div>
							@error('meta_author_en')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
             	 			 <div class="form-group">
								<label>Author Bangla</label>
								<input type="text" name="meta_author_bn" id="meta_author_bn" class="form-control @error('meta_author_bn') is-invalid @enderror" value="{{ $seo->meta_author_bn }}">
							</div>
							@error('meta_author_bn')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
							<div class="form-group">
								<label>Title English</label>
								<input type="text" name="meta_title_en" id="meta_title_en" class="form-control @error('meta_title_en') is-invalid @enderror" value="{{ $seo->meta_title_en }}">
							</div>
							@error('meta_title_en')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
             	 			<div class="form-group">
								<label>Title Bangla</label>
								<input type="text" name="meta_title_bn" id="meta_title_bn" class="form-control @error('meta_title_bn') is-invalid @enderror" value="{{ $seo->meta_title_bn }}">
							</div>
							@error('meta_title_bn')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
             	 			<div class="form-group">
								<label>Google Verifications</label>
								<input type="text" name="google_verifications" id="google_verifications" class="form-control @error('google_verifications') is-invalid @enderror" value="{{ $seo->google_verifications }}">
							</div>
							@error('google_verifications')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
             	 			<div class="form-group">
								<label>Alexa Analytics</label>
								<input type="text" name="alexa_analytics" id="alexa_analytics" class="form-control @error('alexa_analytics') is-invalid @enderror" value="{{ $seo->alexa_analytics }}">
							</div>
							@error('alexa_analytics')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
						</div>
						<!-- /.col -->
						<div class="col-md-6">
							<div class="form-group">
								<label>Keyword English</label>
								<input type="text" name="meta_keyword_en" id="meta_keyword_en" class="form-control @error('meta_keyword_en') is-invalid @enderror" value="{{ $seo->meta_keyword_en }}">
							</div>
							@error('meta_keyword_en')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
             	 			<div class="form-group">
								<label>Keyword Bangla</label>
								<input type="text" name="meta_keyword_bn" id="meta_keyword_bn" class="form-control @error('meta_keyword_bn') is-invalid @enderror" value="{{ $seo->meta_keyword_bn }}">
							</div>
							@error('meta_keyword_bn')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
             	 			<div class="form-group">
								<label>Description English</label>
								<input type="text" name="meta_description_en" id="meta_description_en" class="form-control @error('meta_description_en') is-invalid @enderror" value="{{ $seo->meta_description_en }}">
							</div>
							@error('meta_description_en')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
             	 			<div class="form-group">
								<label>Description Bangla</label>
								<input type="text" name="meta_description_bn" id="meta_description_bn" class="form-control @error('meta_description_bn') is-invalid @enderror" value="{{ $seo->meta_description_bn }}">
							</div>
							@error('meta_description_bn')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
             	 			<div class="form-group">
								<label>Google Analytics</label>
								<input type="text" name="google_analytics" id="google_analytics" class="form-control @error('google_analytics') is-invalid @enderror" value="{{ $seo->google_analytics }}">
							</div>
							@error('google_analytics')
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