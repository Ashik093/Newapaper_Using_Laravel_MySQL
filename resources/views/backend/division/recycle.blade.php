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
	          <li class="breadcrumb-item active">Division & District</li>
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
	    <nav>
	    	<div class="nav nav-tabs" id="nav-tab" role="tablist">
	    		<a class="nav-item nav-link active" id="nav-category-tab" data-toggle="tab" href="#nav-category" role="tab" aria-controls="nav-category" aria-selected="true">Division</a>
	    		<a class="nav-item nav-link" id="nav-subcategory-tab" data-toggle="tab" href="#nav-subcategory" role="tab" aria-controls="nav-subcategory" aria-selected="false">District</a>
	    	</div>
	    </nav>
	    <div class="tab-content" id="nav-tabContent">
	    	<div class="tab-pane fade show active" id="nav-category" role="tabpanel" aria-labelledby="nav-category-tab">
	    		<div class="card">
	    		  <div class="card-header bg-danger">
	    		    <h3 class="card-title">Deleted Division</h3>
	    		  </div>
	    		  <!-- /.card-header -->
	    		  <div class="card-body">
	    		    <table id="example1" class="table table-bordered table-striped">
	    		      <thead>
	    		      <tr>
	    		        <th>Division Name English</th>
	    		        <th>Division Name Bangla</th>
	    		        <th>Retrieve</th>
	    		        <th>Permanent Delete</th>
	    		      </tr>
	    		      </thead>
	    		      <tbody class="text-danger">
	    		      @foreach($divisions as $division)
	    			    <tr>
	    			        <td>{{ $division->name_en }}</td>
	    			        <td>{{ $division->name_bn }}</td>
	    			        <td><a href="{{ route('division.undo.delete',$division->id) }}" class="btn btn-sm btn-success"><i class="fas fa-undo"></i></a></td>
	    			        <td><a href="{{ route('division.permanent.delete',$division->id) }}" id="delete" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>
	    			    </tr>
	    		      @endforeach()
	    		      </tbody>
	    		      <tfoot>
	    		      <tr>
	    		        <th>Division Name English</th>
	    		        <th>Division Name Bangla</th>
	    		        <th>Retrieve</th>
	    		        <th>Permanent Delete</th>
	    		      </tr>
	    		      </tfoot>
	    		    </table>
	    		  </div>
	    		  <!-- /.card-body -->
	    		</div>
	    	</div>
	    	<div class="tab-pane fade" id="nav-subcategory" role="tabpanel" aria-labelledby="nav-subcategory-tab">
	    		<div class="card">
	    		  <div class="card-header bg-danger">
	    		    <h3 class="card-title">Deleted District</h3>
	    		  </div>
	    		  <!-- /.card-header -->
	    		  <div class="card-body">
	    		    <table id="example2" class="table table-bordered table-striped">
	    		      <thead>
	    		      <tr>
	    		        <th>District Name English</th>
	    		        <th>District Name Bangla</th>
	    		        <th>Division</th>
	    		        <th>Retrieve</th>
	    		        <th>Permanent Delete</th>
	    		      </tr>
	    		      </thead>
	    		      <tbody class="text-danger">
	    		      @foreach($districts as $district)
	    			    <tr>
	    			        <td>{{ $district->name_en }}</td>
	    			        <td>{{ $district->name_bn }}</td>
	    			        <td>{{ $district->division->name_en }} | {{ $district->division->name_bn }}</td>
	    			        <td><a href="{{ route('district.undo.delete',$district->id) }}" class="btn btn-sm btn-success"><i class="fas fa-undo"></i></a></td>
	    			        <td><a href="{{ route('district.permanent.delete',$district->id) }}" id="delete" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>
	    			    </tr>
	    		      @endforeach()
	    		      </tbody>
	    		      <tfoot>
	    		      <tr>
	    		        <th>District Name English</th>
	    		        <th>District Name Bangla</th>
	    		        <th>Division</th>
	    		        <th>Retrieve</th>
	    		        <th>Permanent Delete</th>
	    		      </tr>
	    		      </tfoot>
	    		    </table>
	    		  </div>
	    		  <!-- /.card-body -->
	    		</div>
	    	</div>
	    </div>
			
	    <!-- /.row -->
	    <!-- Main row -->
	    <!-- /.row (main row) -->
	  </div><!-- /.container-fluid -->
	</section>
@endsection()