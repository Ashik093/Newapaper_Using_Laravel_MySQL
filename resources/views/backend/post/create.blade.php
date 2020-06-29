@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Add Post</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Add Post</li>
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
				<h3 class="card-title">Add Post</h3>
				<a href="{{ route('all.post') }}" class="btn btn-danger btn-sm float-sm-right">
                  All Post
                </a> 
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Category</label>
								<select class="form-control select2bs4 @error('category_id') is-invalid @enderror" name="category_id" id="category_id" style="width: 100%;">
									<option selected="selected" disabled="">==Chose One==</option>
									@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name_en }} | {{ $category->name_bn }}</option>
									@endforeach
								</select>
							</div>
							@error('category_id')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
							<div class="form-group">
								<label>Sub Category</label>
								<select class="form-control select2bs4 @error('subcategory_id') is-invalid @enderror" name="subcategory_id" id="subcategory_id" style="width: 100%;">
									<option selected="selected" disabled="">==Chose One==</option>
									
								</select>
							</div>
							@error('subcategory_id')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			 @enderror
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
								<label for="exampleInputFile">Post Details (English)</label>
								<textarea class="textarea @error('details_en') is-invalid @enderror" name="details_en" id="details_en" placeholder="Place some text here"
								style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
							</div>
							@error('details_en')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
							<div class="form-group">
								<label>Tags (English)</label>
								<input type="text" name="tags_en" id="tags_en" class="form-control @error('details_en') is-invalid @enderror" placeholder="Enter Tags (English)">
							</div>
							@error('tags_en')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
						</div>
						<!-- /.col -->
						<div class="col-md-6">
							<div class="form-group">
								<label>Division</label>
								<select class="form-control select2bs4" name="division_id" id="division_id" style="width: 100%;">
									<option selected="selected" disabled="">==Chose One==</option>
									@foreach($divisions as $division)
									<option value="{{ $division->id }}">{{ $division->name_en }} | {{ $division->name_bn }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>District</label>
								<select class="form-control select2bs4" name="district_id" id="district_id" style="width: 100%;">
									<option selected="selected" disabled="">==Chose One==</option>
								</select>
							</div>
							<div class="form-group">
								<label>Author</label>
								<select class="form-control select2bs4 @error('author_id') is-invalid @enderror" name="author_id" id="author_id" style="width: 100%;">
									<option selected="selected" disabled="">==Chose One==</option>
									<option>Alaska</option>
									<option>California</option>
									<option>Delaware</option>
									<option>Tennessee</option>
									<option>Texas</option>
									<option>Washington</option>
								</select>
							</div>
							@error('author_id')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
							<div class="form-group">
								<img src="#" alt="" id="image">
								<label for="exampleInputFile">File input</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file"  accept="image/*" name="image" id="image" class="custom-file-input" id="exampleInputFile" onchange="readURL(this);">
										<label class="custom-file-label" for="exampleInputFile">Choose file</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputFile">Post Details (Bangla)</label>
								<textarea class="textarea @error('details_bn') is-invalid @enderror" name="details_bn" id="details_bn" placeholder="Place some text here"
								style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
							</div>
							@error('details_bn')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
							<div class="form-group">
								<label>Tags (Bangla)</label>
								<input type="text" name="tags_bn" id="tags_bn" class="form-control @error('tags_bn') is-invalid @enderror" placeholder="Enter Tags (Bangla)">
							</div>
							@error('tags_bn')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
							
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
					<div class="row">
						<div class="col-md-6">
							<div>
								<h3>Extra Option</h5>
							</div>
							<hr class="bg-info">
						</div>
						<div class="col-md-6">
							
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<!-- checkbox -->
							<div class="form-group">
								<div class="custom-control custom-checkbox">
									<input class="custom-control-input" type="checkbox" name="headline" value="1" id="customCheckbox1">
									<label for="customCheckbox1" class="custom-control-label">Headline</label>
								</div>
								<div class="custom-control custom-checkbox">
									<input class="custom-control-input" type="checkbox" name="first_section" value="1" id="customCheckbox2">
									<label for="customCheckbox2" class="custom-control-label">First Section</label>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<!-- radio -->
							<div class="form-group">
								<div class="custom-control custom-checkbox">
									<input class="custom-control-input" type="checkbox" name="bigthumbnail" value="1" id="customCheckbox3">
									<label for="customCheckbox3" class="custom-control-label">General Big Thumbnail</label>
								</div>
								<div class="custom-control custom-checkbox">
									<input class="custom-control-input" type="checkbox" name="first_section_thumbnail" value="1" id="customCheckbox4">
									<label for="customCheckbox4" class="custom-control-label">First Section Big Thumbnail</label>
								</div>
							</div>
						</div>
					</div>
					<button class="btn btn-info">Add Post</button>
				</form>
			</div>
        </div>
	</div><!-- /.container-fluid -->
</section>
@endsection()