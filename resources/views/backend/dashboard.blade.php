@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Dashboard</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="#">Home</a></li>
	          <li class="breadcrumb-item active">Dashboard</li>
	        </ol>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	@php
		$category = DB::table('categories')->get();
		$subcategory = DB::table('subcategories')->get();
		$post = DB::table('posts')->get();
		$division = DB::table('divisions')->get();
		$district = DB::table('districts')->get();
		$ads = DB::table('ads')->get();
		$writter = DB::table('admins')->where('type',Null)->get();
		$photo = DB::table('photos')->get();
	@endphp
	<!-- Main content -->
	<section class="content">
	  <div class="container-fluid">
	    <!-- Small boxes (Stat box) -->
	    <div class="row">
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-info">
	          <div class="inner">
	            <h3 class="text-center">{{ count($category) }}</h3>

	            <h3 class="text-center">Category</h3>
	          </div>
	          <div class="icon">
	            <i class="ion ion-bag"></i>
	          </div>
	          <a href="{{ route('category') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	        </div>
	      </div>
	      <!-- ./col -->
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-success">
	          <div class="inner">
	            <h3 class="text-center">{{ count($subcategory) }}{{-- <sup style="font-size: 20px">%</sup> --}}</h3>

	            <h3 class="text-center">Sub Category</h3>
	          </div>
	          <div class="icon">
	            <i class="ion ion-stats-bars"></i>
	          </div>
	          <a href="{{ route('subcategory') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	        </div>
	      </div>
	      <!-- ./col -->
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-warning">
	          <div class="inner">
	            <h3 class="text-center">{{ count($post) }}</h3>

	            <h3 class="text-center">Post</h3>
	          </div>
	          <div class="icon">
	            <i class="ion ion-person-add"></i>
	          </div>
	          <a href="{{ route('all.post') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	        </div>
	      </div>
	      <!-- ./col -->
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-danger">
	          <div class="inner">
	            <h3 class="text-center">{{ count($division) }}</h3>

	            <h3 class="text-center">Division</h3>
	          </div>
	          <div class="icon">
	            <i class="ion ion-pie-graph"></i>
	          </div>
	          <a href="{{ route('division') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	        </div>
	      </div>
	      <!-- ./col -->
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-success">
	          <div class="inner">
	            <h3 class="text-center">{{ count($district) }}</h3>

	            <h3 class="text-center">District</h3>
	          </div>
	          <div class="icon">
	            <i class="ion ion-stats-bars"></i>
	          </div>
	          <a href="{{ route('district') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	        </div>
	      </div>

	      <!-- ./col -->
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-warning">
	          <div class="inner">
	            <h3 class="text-center">{{ count($ads) }}</h3>

	            <h3 class="text-center">Advertisment</h3>
	          </div>
	          <div class="icon">
	            <i class="ion ion-person-add"></i>
	          </div>
	          <a href="{{ route('all.ads') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	        </div>
	      </div>

	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-danger">
	          <div class="inner">
	            <h3 class="text-center">{{ count($writter) }}</h3>

	            <h3 class="text-center">Writter</h3>
	          </div>
	          <div class="icon">
	            <i class="ion ion-pie-graph"></i>
	          </div>
	          <a href="{{ route('all.user') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	        </div>
	      </div>
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-info">
	          <div class="inner">
	            <h3 class="text-center">{{ count($photo) }}</h3>

	            <h3 class="text-center">Photo Gallery</h3>
	          </div>
	          <div class="icon">
	            <i class="ion ion-bag"></i>
	          </div>
	          <a href="{{ route('photo.gallery') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	        </div>
	      </div>

	    </div>
	    <!-- /.row -->
	    <!-- Main row -->
	    <!-- /.row (main row) -->
	  </div><!-- /.container-fluid -->
	</section>
@endsection()