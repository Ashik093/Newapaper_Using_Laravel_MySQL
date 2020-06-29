@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">District</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">District</li>
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
			    <h3 class="card-title">District Table</h3>
			    <button type="button" class="btn btn-danger btn-sm float-sm-right" data-toggle="modal" data-target="#modal-default">
                  Add New District
                </button>
                
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
			    <table id="example1" class="table table-bordered table-striped">
			      <thead>
			      <tr>
			        <th>District Name English</th>
			        <th>District Name Bangla</th>
			        <th>Division</th>
			        <th>Action</th>
			      </tr>
			      </thead>
			      <tbody>
			      @foreach($districts as $district)
			        @php
				    	$checkDivision = DB::table('divisions')->where('id',$district->division_id)->first();
				    @endphp

				    @if($checkDivision->soft_delete == 0)
				    	<tr>
					        <td>{{ $district->name_en }}</td>
					        <td>{{ $district->name_bn }}</td>
					        <td>{{ $district->division->name_en }} | {{ $district->division->name_bn }}</td>
					        <td><div class="btn-group"><a href="{{ route('district.edit',$district->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a><a href="{{ route('district.soft.delete',$district->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fas fa-trash-alt"></i></a></div></td>
					    </tr>
				    @endif
			      @endforeach()
			      </tbody>
			      <tfoot>
			      <tr>
			        <th>District Name English</th>
			        <th>District Name Bangla</th>
			        <th>Division</th>
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



	<!--modal-->
	<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">Add New District</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('store.district') }}" method="POST">
            	@csrf
            	<div class="modal-body">
             	  <div class="form-group">
             	    <label>District Name (English)</label>
             	    <input type="text" name="name_en" id="name_en" class="form-control @error('name_en') is-invalid @enderror" placeholder="Enter District Name (English)">
             	  </div>
             	  @error('name_en')
             	      <div class="alert alert-danger">{{ $message }}</div>
             	  @enderror
             	  <div class="form-group">
             	    <label>District Name (Bangla)</label>
             	    <input type="text" name="name_bn" id="name_bn" class="form-control @error('name_bn') is-invalid @enderror" placeholder="Enter District Name (Bangla)">
             	  </div>
             	  @error('name_bn')
             	      <div class="alert alert-danger">{{ $message }}</div>
             	  @enderror
             	  <div class="form-group">
             	    <label>Division</label>
             	    <select name="division_id" id="division_id" class="form-control @error('division_id') is-invalid @enderror">
             	    	<option disabled="" selected="">==Chose One==</option>
             	    	@foreach($divisions as $division)
							<option value="{{ $division->id }}">{{ $division->name_en }} | {{ $division->name_bn }}</option>
             	    	@endforeach()
             	    </select>
             	  </div>
             	  @error('division_id')
             	      <div class="alert alert-danger">{{ $message }}</div>
             	  @enderror
             	
            	</div>
            	<div class="modal-footer justify-content-between">
              		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              		<button type="submit" class="btn btn-primary">Add</button>
            	</div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection()