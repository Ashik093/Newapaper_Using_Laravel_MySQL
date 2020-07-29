@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Ads</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Ads</li>
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
			    <h3 class="card-title">Ads Table</h3> 
			    <a href="{{ route('add.ads') }}" class="btn btn-danger btn-sm float-sm-right">
                  Add New Ads
                </a>       
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
			    <table id="example1" class="table table-bordered table-striped">
			      <thead>
			      <tr>
			        <th>Link</th>
			        <th>Type</th>
			        <th>Image</th>
			        <th>Action</th>
			      </tr>
			      </thead>
			      <tbody>
				    @foreach($ads as $row)
				    	<tr>
					        <td>{{ $row->link }}</td>
					        <td>@if($row->type==0) <span class="badge badge-info">Horizontal</span> @else <span class="badge badge-success">Vertical</span> @endif</td>
					        <td><img src="{{ url($row->ads) }}" style="widows: 50px;height: 50px;" alt=""></td>
					        <td><div class="btn-group"><a href="{{ route('edit.ads',$row->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a><a href="{{ route('delete.ads',$row->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fas fa-trash-alt"></i></a></div></td>
				    	</tr>
				    @endforeach
			      </tbody>
			      <tfoot>
			      <tr>
			        <th>Link</th>
			        <th>Type</th>
			        <th>Image</th>
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