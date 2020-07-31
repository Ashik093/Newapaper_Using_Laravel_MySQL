@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Writter</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Writter</li>
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
			    <h3 class="card-title">Writter Table</h3> 
			    <a href="{{ route('add.user') }}" class="btn btn-danger btn-sm float-sm-right">
                  Add New Writter
                </a>       
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
			    <table id="example1" class="table table-bordered table-striped">
			      <thead>
			      <tr>
			        <th>Name</th>
			        <th>Email</th>
			        <th>Role</th>
			        <th>Action</th>
			      </tr>
			      </thead>
			      <tbody>
				    @foreach($users as $row)
				    	<tr @if($row->id == Auth::user()->id) style="font-weight: bold;color: green;" @endif>
					        <td>{{ $row->name }}</td>
					        <td>{{ $row->email }}</td>
					        <td>
					        	@if($row->type==1)
									<span class="badge badge-info">Super Admin</span>
								@else
									<span class="badge badge-danger">Writter</span>
					        	@endif
					        	@if($row->category==1)
									<span class="badge badge-success">Category</span>
					        	@endif
					        	@if($row->division==1)
									<span class="badge badge-success">Division</span>
					        	@endif
					        	@if($row->post==1)
									<span class="badge badge-success">Post</span>
					        	@endif
					        	@if($row->setting==1)
									<span class="badge badge-success">Setting</span>
					        	@endif
					        	@if($row->gallery==1)
									<span class="badge badge-success">Gallery</span>
					        	@endif
					        	@if($row->ads==1)
									<span class="badge badge-success">Ads</span>
					        	@endif
					        	@if($row->role==1)
									<span class="badge badge-success">Role</span>
					        	@endif
					        </td>
					        <td><div class="btn-group"><a href="{{ route('edit.user',$row->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>@if(Auth::user()->id!=$row->id) <a href="{{ route('delete.user',$row->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fas fa-trash-alt"></i></a> @endif</div></td>
				    	</tr>
				    @endforeach
			      </tbody>
			      <tfoot>
			      <tr>
			        <th>Name</th>
			        <th>Email</th>
			        <th>Role</th>
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