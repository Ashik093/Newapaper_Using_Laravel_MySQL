@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Post</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Posts</li>
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
			    <h3 class="card-title">Post Table</h3> 
			    <a href="{{ route('add.post') }}" class="btn btn-danger btn-sm float-sm-right">
                  Add New Post
                </a>       
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
			    <table id="example1" class="table table-bordered table-striped">
			      <thead>
			      <tr>
			        <th>Category Name</th>
			        <th>Sub Category Name</th>
			        <th>Title</th>
			        <th>Image</th>
			        <th>Date</th>
			        <th>Action</th>
			      </tr>
			      </thead>
			      <tbody>
				    @foreach($posts as $post)
				    	<tr>
					        <td>{{ $post->category->name_bn }}</td>
					        <td>{{ $post->subcategory->name_bn }}</td>
					        <td>{{ $post->title_bn }}</td>
					        <td>
					        	@if($post->image)
									<img src="{{ url($post->image) }}" style="widows: 50px;height: 50px;" alt="">
					        	@endif
					        </td>
					        <td>{{ $post->post_date }}</td>
					        <td><div class="btn-group"><a href="{{ route('edit.post',$post->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a><a href="{{ route('soft.delete.post',$post->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fas fa-trash-alt"></i></a></div></td>
				    	</tr>
				    @endforeach
			      </tbody>
			      <tfoot>
			      <tr>
			        <th>Category Name</th>
			        <th>Sub Category Name</th>
			        <th>Title</th>
			        <th>Image</th>
			        <th>Date</th>
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
@endsection()