@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Recycle Bin</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Posts Recycle Bin</li>
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
			  <div class="card-header bg-danger">
			    <h3 class="card-title">Deleted Post Table</h3>        
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
				    	<tr class="text-danger">
					        <td>{{ $post->category->name_bn }}</td>
					        <td>{{ $post->subcategory->name_bn }}</td>
					        <td>{{ $post->title_bn }}</td>
					        <td><img src="{{ url($post->image) }}" style="widows: 50px;height: 50px;" alt=""></td>
					        <td>{{ $post->post_date }}</td>
					        <td><div class="btn-group"><a href="{{ route('retrieve.post',$post->id) }}" class="btn btn-sm btn-info">Retrieve</a><a href="{{ route('parmanent.delete.post',$post->id) }}" class="btn btn-sm btn-danger" id="delete">Parmanent Delete</a></div></td>
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