@extends('layouts.front')

@section('content')

	<section class="single-page">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">   
					   <li><a href="{{ route('/') }}"><i class="fa fa-home"></i></a></li>					   
						<li><a href="#">
							@if(session()->get('lang')== 'English')
								{{ $category->name_en }}
							@else
								{{ $category->name_bn }}
							@endif
						</a></li>
						<li><a href="#">
							@if(session()->get('lang')== 'English')
								{{ $subcategory->name_en }}
							@else
								{{ $subcategory->name_bn }}
							@endif
						</a></li>
					</ol>
				</div>
			</div>
			  <div class="row" style="width: 100%;">
				<div class="col-md-8 col-sm-8">
					
						<div class="row">
							@foreach($posts as $row)
								@php
									if (session()->get('lang')=='English') {
										$slug = preg_replace('/\s+/u','-',trim($row->title_en));
									}else{
										$slug = preg_replace('/\s+/u','-',trim($row->title_bn));
									}
								@endphp
								<div class="col-md-4 col-sm-4">
									<div class="top-news sng-border-btm">
										<a href="{{ URL::to('/view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
										<h4 class="heading-02"><a href="{{ URL::to('/view-post/'.$row->id.'/'.$slug) }}">
											@if(session()->get('lang')== 'English')
												{{ $row->title_en }}
											@else
												{{ $row->title_bn }}
											@endif
										</a> </h4>
									</div>
								</div>
							@endforeach


						</div>
						{{ $posts->links() }}
					
					<!-- ********* -->

				</div>
				<div class="col-md-4 col-sm-4">
					<!-- add-start -->	
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="sidebar-add">
									@php
										$vertical1 = DB::table('ads')->where('type',1)->first();
										$vertical2 = DB::table('ads')->where('type',1)->skip(1)->first();
									@endphp
									@if($vertical1)
										<a href="{{ $vertical1->link }}"><img src="{{asset($vertical1->ads)}}" alt=""/></a>
									@endif
								</div>
							</div>
						</div><!-- /.add-close -->
						<div class="tab-header">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs nav-justified" role="tablist">
								<li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">
									@if(session()->get('lang')== 'English')
								   		Latest
									@else
										সর্বশেষ
									@endif
								</a></li>
								<li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">
									@if(session()->get('lang')== 'English')
									   	Popular
									@else
										জনপ্রিয়
									@endif
									
								</a></li>
								<li role="presentation" ><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">
									@if(session()->get('lang')== 'English')
									   	Highly Read
									@else
										সর্বোচ্চ পঠিত
									@endif
								</a></li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content ">
								<div role="tabpanel" class="tab-pane in active" id="tab21">
									<div class="news-titletab">
										@foreach($latest as $row)
											@php
												if (session()->get('lang')=='English') {
													$slug = preg_replace('/\s+/u','-',trim($row->title_en));
												}else{
													$slug = preg_replace('/\s+/u','-',trim($row->title_bn));
												}
											@endphp
											<div class="news-title-02">
												<h4 class="heading-03"><a href="{{ URL::to('/view-post/'.$row->id.'/'.$slug) }}">
													@if(session()->get('lang')== 'English')
												   		{{ $row->title_en }}
													@else
														{{ $row->title_bn }}
													@endif
												</a> </h4>
											</div>
										@endforeach
									</div>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="tab22">
									<div class="news-titletab">
										@foreach($popular as $row)
											@php
												if (session()->get('lang')=='English') {
													$slug = preg_replace('/\s+/u','-',trim($row->title_en));
												}else{
													$slug = preg_replace('/\s+/u','-',trim($row->title_bn));
												}
											@endphp
											<div class="news-title-02">
												<h4 class="heading-03"><a href="{{ URL::to('/view-post/'.$row->id.'/'.$slug) }}">
													@if(session()->get('lang')== 'English')
												   		{{ $row->title_en }}
													@else
														{{ $row->title_bn }}
													@endif
												</a> </h4>
											</div>
										@endforeach
									</div>                                          
								</div>
								<div role="tabpanel" class="tab-pane fade" id="tab23">	
									<div class="news-titletab">
										@foreach($highlyread as $row)
											@php
												if (session()->get('lang')=='English') {
													$slug = preg_replace('/\s+/u','-',trim($row->title_en));
												}else{
													$slug = preg_replace('/\s+/u','-',trim($row->title_bn));
												}
											@endphp
											<div class="news-title-02">
												<h4 class="heading-03"><a href="{{ URL::to('/view-post/'.$row->id.'/'.$slug) }}">
													@if(session()->get('lang')== 'English')
												   		{{ $row->title_en }}
													@else
														{{ $row->title_bn }}
													@endif
												</a> </h4>
											</div>
										@endforeach
									</div>						                                          
								</div>
							</div>
						</div>
					<!-- add-start -->	
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="sidebar-add">
									@if($vertical2)
										<a href="{{ $vertical2->link }}"><img src="{{asset($vertical2->ads)}}" alt=""/></a>
									@endif
								</div>
							</div>
						</div><!-- /.add-close -->
				</div>
			  </div>
		  </div>
		  <!-- ******** -->
		</div>
	</section>

@endsection