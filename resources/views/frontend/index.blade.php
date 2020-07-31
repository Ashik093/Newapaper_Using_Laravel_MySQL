@extends('layouts.front')
@section('content')
@php
	$horizontal2 = DB::table('ads')->where('type',0)->skip(1)->first();
	$horizontal3 = DB::table('ads')->where('type',0)->skip(2)->first();
	$horizontal4 = DB::table('ads')->where('type',0)->skip(3)->first();
	$horizontal5 = DB::table('ads')->where('type',0)->skip(4)->first();

	$vertical1 = DB::table('ads')->where('type',1)->first();
	$vertical2 = DB::table('ads')->where('type',1)->skip(1)->first();
@endphp
	<!-- 1st-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 col-sm-8">
					<div class="row">
						<div class="col-md-1 col-sm-1 col-lg-1"></div>
						@php
							if (session()->get('lang')=='English') {
								$slug = preg_replace('/\s+/u','-',trim($postbig->title_en));
							}else{
								$slug = preg_replace('/\s+/u','-',trim($postbig->title_bn));
							}
						@endphp
						<div class="col-md-10 col-sm-10">
							<div class="lead-news">
								<div class="service-img"><a href="{{ URL::to('/view-post/'.$postbig->id.'/'.$slug) }}"><img src="{{ URL::to($postbig->image) }}" alt="Notebook"></a></div>
								<div class="content">
								<h4 class="lead-heading-01"><a href="{{ URL::to('/view-post/'.$postbig->id.'/'.$slug) }}">
										@if(session()->get('lang')== 'English')
									   		{{ $postbig->title_en }}
										@else
											{{ $postbig->title_bn }}
										@endif
								</a> </h4>
								</div>
							</div>
						</div>
						
					</div>
						<div class="row">
								
								@foreach($postsmalls as $postsmall)
									@php
										if (session()->get('lang')=='English') {
											$slug = preg_replace('/\s+/u','-',trim($postsmall->title_en));
										}else{
											$slug = preg_replace('/\s+/u','-',trim($postsmall->title_bn));
										}
									@endphp
									<div class="col-md-3 col-sm-3">
										<div class="top-news">
											<a href="{{ URL::to('/view-post/'.$postsmall->id.'/'.$slug) }}"><img src="{{ URL::to($postsmall->image) }}" alt="Notebook"></a>
											<h4 class="heading-02"><a href="{{ URL::to('/view-post/'.$postsmall->id.'/'.$slug) }}">
													@if(session()->get('lang')== 'English')
												   		{{ $postsmall->title_en }}
													@else
														{{ $postsmall->title_bn }}
													@endif
											</a> </h4>
										</div>
									</div>
								@endforeach
							</div>
					
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="add">
								@if($horizontal2)
									<a href="{{ $horizontal2->link }}"><img src="{{asset($horizontal2->ads)}}" alt=""/></a>
								@endif
								
							</div>
						</div>
					</div><!-- /.add-close -->	
					
					<!-- news-start -->
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title">
									
									@if(session()->get('lang')== 'English')
								   		{{ $firstCategory->name_en }}
									@else
										{{ $firstCategory->name_bn }}
									@endif
									<a href="#">
										<span>
											@if(session()->get('lang')== 'English')
										   		More
											@else
												আরও
											@endif
											 
										 	<i class="fa fa-angle-double-right" aria-hidden="true"></i>
										</span>
									</a>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										@php
											if (session()->get('lang')=='English') {
												$slug = preg_replace('/\s+/u','-',trim($firstCategoryPostsBig->title_en));
											}else{
												$slug = preg_replace('/\s+/u','-',trim($firstCategoryPostsBig->title_bn));
											}
										@endphp
										<div class="top-news">
											<a href="{{ URL::to('/view-post/'.$firstCategoryPostsBig->id.'/'.$slug) }}"><img src="{{ URL::to($firstCategoryPostsBig->image) }}" alt="Notebook"></a>
											<h4 class="heading-02"><a href="{{ URL::to('/view-post/'.$firstCategoryPostsBig->id.'/'.$slug) }}">
												@if(session()->get('lang')== 'English')
											   		{{ $firstCategoryPostsBig->title_en }}
												@else
													{{ $firstCategoryPostsBig->title_bn }}
												@endif
											</a> </h4>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										@foreach($firstCategoryPostsSmall as $row)
											@php
											if (session()->get('lang')=='English') {
												$slug = preg_replace('/\s+/u','-',trim($row->title_en));
											}else{
												$slug = preg_replace('/\s+/u','-',trim($row->title_bn));
											}
										@endphp
											<div class="image-title">
												<a href="{{ URL::to('/view-post/'.$row->id.'/'.$slug) }}"><img src="{{ URL::to($row->image) }}" alt="Notebook"></a>
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
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title">
									@if(session()->get('lang')== 'English')
									  	{{ $secondCategory->name_en }}
									@else
										{{ $secondCategory->name_bn }}
									@endif
									<a href="#">
										<span>
											@if(session()->get('lang')== 'English')
										   		More
											@else
												আরও
											@endif
												<i class="fa fa-angle-double-right" aria-hidden="true"></i>
										</span>
									</a>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										@php
											if (session()->get('lang')=='English') {
												$slug = preg_replace('/\s+/u','-',trim($secondCategoryPostsBig->title_en));
											}else{
												$slug = preg_replace('/\s+/u','-',trim($secondCategoryPostsBig->title_bn));
											}
										@endphp
										<div class="top-news">
											<a href="{{ URL::to('/view-post/'.$secondCategoryPostsBig->id.'/'.$slug) }}"><img src="{{ URL::to($secondCategoryPostsBig->image) }}" alt="Notebook"></a>
											<h4 class="heading-02"><a href="{{ URL::to('/view-post/'.$secondCategoryPostsBig->id.'/'.$slug) }}">
												@if(session()->get('lang')== 'English')
											   		{{ $secondCategoryPostsBig->title_en }}
												@else
													{{ $secondCategoryPostsBig->title_bn }}
												@endif
											</a> </h4>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										@foreach($secondCategoryPostsSmall as $row)
											@php
												if (session()->get('lang')=='English') {
													$slug = preg_replace('/\s+/u','-',trim($secondCategoryPostsBig->title_en));
												}else{
													$slug = preg_replace('/\s+/u','-',trim($secondCategoryPostsBig->title_bn));
												}
											@endphp
											<div class="image-title">
												<a href="{{ URL::to('/view-post/'.$row->id.'/'.$slug) }}"><img src="{{ URL::to($row->image) }}" alt="Notebook"></a>
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
					</div>					
				</div>
				<div class="col-md-3 col-sm-3">
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
								@if($vertical1)
									<a href="{{ $vertical1->link }}"><img src="{{asset($vertical1->ads)}}" alt=""/></a>
								@endif
								
							</div>
						</div>
					</div><!-- /.add-close -->	
					
					<!-- youtube-live-start -->	
					<div class="cetagory-title-03">
						@if(session()->get('lang')== 'English')
					   		Live TV
						@else
							লাইভ টিভি
						@endif
					 
					</div>
					<div class="photo">
						<div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
							{{-- <iframe width="729" height="410" src="https://www.youtube.com/embed/8HnnNf-3VuE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
							{!! $livetv->embed_code !!}
						</div>
					</div><!-- /.youtube-live-close -->	
					
					<!-- facebook-page-start -->
					<div class="cetagory-title-03">
							@if(session()->get('lang')== 'English')
						   		Facebook Page
							@else
								ফেসবুকে আমরা
							@endif
						
					</div>
					<div class="fb-root">
						<div class="fb-page" data-href="https://web.facebook.com/narsingdi24" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://web.facebook.com/narsingdi24" class="fb-xfbml-parse-ignore"><a href="https://web.facebook.com/narsingdi24">নরসিংদী সংবাদ 24/ Narsingdir News 24</a></blockquote></div>
					</div><!-- /.facebook-page-close -->	
					<div id="fb-root"></div>
					<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0" nonce="uJhFBdHs"></script>
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
	</section><!-- /.1st-news-section-close -->

	<!-- 2nd-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02">
							@if(session()->get('lang')== 'English')
							  	{{ $thirdCategory->name_en }}
							@else
								{{ $thirdCategory->name_bn }}
							@endif
							<a href="#">
								<span>
									@if(session()->get('lang')== 'English')
								   		More
									@else
										আরও
									@endif
										<i class="fa fa-angle-double-right" aria-hidden="true"></i>
								</span>
							</a>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								@php
									if (session()->get('lang')=='English') {
										$slug = preg_replace('/\s+/u','-',trim($thirdCategoryPostsBig->title_en));
									}else{
										$slug = preg_replace('/\s+/u','-',trim($thirdCategoryPostsBig->title_bn));
									}
								@endphp
								<div class="top-news">
									<a href="{{ URL::to('/view-post/'.$thirdCategoryPostsBig->id.'/'.$slug) }}"><img src="{{ URL::to($thirdCategoryPostsBig->image) }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{ URL::to('/view-post/'.$thirdCategoryPostsBig->id.'/'.$slug) }}">
										@if(session()->get('lang')== 'English')
											{{ $thirdCategoryPostsBig->title_en }}
										@else
											{{ $thirdCategoryPostsBig->title_bn }}
										@endif
									</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								@foreach($thirdCategoryPostsSmall as $row)
									@php
										if (session()->get('lang')=='English') {
											$slug = preg_replace('/\s+/u','-',trim($row->title_en));
										}else{
											$slug = preg_replace('/\s+/u','-',trim($row->title_bn));
										}
									@endphp
									<div class="image-title">
										<a href="{{ URL::to('/view-post/'.$row->id.'/'.$slug) }}"><img src="{{ URL::to($row->image) }}" alt="Notebook"></a>
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
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">
							@if(session()->get('lang')== 'English')
							  	{{ $fourthCategory->name_en }}
							@else
								{{ $fourthCategory->name_bn }}
							@endif
						 <i class="fa fa-angle-right" aria-hidden="true"></i><span>
									@if(session()->get('lang')== 'English')
								   		More
									@else
										আরও
									@endif
										<i class="fa fa-angle-double-right" aria-hidden="true"></i>
								</span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								@php
									if (session()->get('lang')=='English') {
										$slug = preg_replace('/\s+/u','-',trim($fourthCategoryPostsBig->title_en));
									}else{
										$slug = preg_replace('/\s+/u','-',trim($fourthCategoryPostsBig->title_bn));
									}
								@endphp
								<div class="top-news">
									<a href="{{ URL::to('/view-post/'.$fourthCategoryPostsBig->id.'/'.$slug) }}"><img src="{{ URL::to($fourthCategoryPostsBig->image) }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{ URL::to('/view-post/'.$fourthCategoryPostsBig->id.'/'.$slug) }}">
										@if(session()->get('lang')== 'English')
											{{ $fourthCategoryPostsBig->title_en }}
										@else
											{{ $fourthCategoryPostsBig->title_bn }}
										@endif
									</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								@foreach($fourthCategoryPostsSmall as $row)
									@php
										if (session()->get('lang')=='English') {
											$slug = preg_replace('/\s+/u','-',trim($row->title_en));
										}else{
											$slug = preg_replace('/\s+/u','-',trim($row->title_bn));
										}
									@endphp
									<div class="image-title">
										<a href="{{ URL::to('/view-post/'.$row->id.'/'.$slug) }}"><img src="{{ URL::to($row->image) }}" alt="Notebook"></a>
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
			</div>
			<!-- ******* -->
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02">
							<a href="#">
								@if(session()->get('lang')== 'English')
							  		{{ $fifthCategory->name_en }}
								@else
									{{ $fifthCategory->name_bn }}
								@endif
							  <i class="fa fa-angle-right" aria-hidden="true"></i><span>
									@if(session()->get('lang')== 'English')
								   		More
									@else
										আরও
									@endif
										<i class="fa fa-angle-double-right" aria-hidden="true"></i>
								</span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								@php
									if (session()->get('lang')=='English') {
										$slug = preg_replace('/\s+/u','-',trim($fifthCategoryPostsBig->title_en));
									}else{
										$slug = preg_replace('/\s+/u','-',trim($fifthCategoryPostsBig->title_bn));
									}
								@endphp
								<div class="top-news">
									<a href="{{ URL::to('/view-post/'.$fifthCategoryPostsBig->id.'/'.$slug) }}"><img src="{{ URL::to($fifthCategoryPostsBig->image) }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{ URL::to('/view-post/'.$fifthCategoryPostsBig->id.'/'.$slug) }}">
										@if(session()->get('lang')== 'English')
											{{ $fifthCategoryPostsBig->title_en }}
										@else
											{{ $fifthCategoryPostsBig->title_bn }}
										@endif
									</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								@foreach($fifthCategoryPostsSmall as $row)
									@php
										if (session()->get('lang')=='English') {
											$slug = preg_replace('/\s+/u','-',trim($row->title_en));
										}else{
											$slug = preg_replace('/\s+/u','-',trim($row->title_bn));
										}
									@endphp
									<div class="image-title">
										<a href="{{ URL::to('/view-post/'.$row->id.'/'.$slug) }}"><img src="{{ URL::to($row->image) }}" alt="Notebook"></a>
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
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">@if(session()->get('lang')== 'English')
							  		{{ $sixCategory->name_en }}
								@else
									{{ $sixCategory->name_bn }}
								@endif
							  <i class="fa fa-angle-right" aria-hidden="true"></i><span>
									@if(session()->get('lang')== 'English')
								   		More
									@else
										আরও
									@endif
								<i class="fa fa-angle-double-right" aria-hidden="true"></i>
								</span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									@php
										if (session()->get('lang')=='English') {
											$slug = preg_replace('/\s+/u','-',trim($sixCategoryPostsBig->title_en));
										}else{
											$slug = preg_replace('/\s+/u','-',trim($sixCategoryPostsBig->title_bn));
										}
									@endphp
									<a href="{{ URL::to('/view-post/'.$sixCategoryPostsBig->id.'/'.$slug) }}"><img src="{{ URL::to($sixCategoryPostsBig->image) }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{ URL::to('/view-post/'.$sixCategoryPostsBig->id.'/'.$slug) }}">
										@if(session()->get('lang')== 'English')
											{{ $sixCategoryPostsBig->title_en }}
										@else
											{{ $sixCategoryPostsBig->title_bn }}
										@endif
									</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								@foreach($sixCategoryPostsSmall as $row)
									@php
										if (session()->get('lang')=='English') {
											$slug = preg_replace('/\s+/u','-',trim($row->title_en));
										}else{
											$slug = preg_replace('/\s+/u','-',trim($row->title_bn));
										}
									@endphp
									<div class="image-title">
										<a href="{{ URL::to('/view-post/'.$row->id.'/'.$slug) }}"><img src="{{ URL::to($row->image) }}" alt="Notebook"></a>
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
				
			</div>
			<!-- add-start -->	
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="add">
						@if($horizontal3)
							<a href="{{ $horizontal3->link }}"><img src="{{asset($horizontal3->ads)}}" alt=""/></a>
						@endif
						
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="add">
						@if($horizontal4)
							<a href="{{ $horizontal4->link }}"><img src="{{asset($horizontal4->ads)}}" alt=""/></a>
						@endif
						
					</div>
				</div>
			</div><!-- /.add-close -->	
			
		</div>
	</section><!-- /.2nd-news-section-close -->

	<!-- 3rd-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 col-sm-9">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title-02"><a href="#">@if(session()->get('lang')== 'English')
									  		{{ $sevenCategory->name_en }}
										@else
											{{ $sevenCategory->name_bn }}
										@endif
									  <i class="fa fa-angle-right" aria-hidden="true"></i><span>
											@if(session()->get('lang')== 'English')
										   		More
											@else
												আরও
											@endif
										<i class="fa fa-angle-double-right" aria-hidden="true"></i>
										</span></a></div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										@php
											if (session()->get('lang')=='English') {
												$slug = preg_replace('/\s+/u','-',trim($sevenCategoryPostsBig->title_en));
											}else{
												$slug = preg_replace('/\s+/u','-',trim($sevenCategoryPostsBig->title_bn));
											}
										@endphp
										<div class="top-news">
											<a href="{{ URL::to('/view-post/'.$sevenCategoryPostsBig->id.'/'.$slug) }}"><img src="{{ URL::to($sevenCategoryPostsBig->image) }}" alt="Notebook"></a>
											<h4 class="heading-02"><a href="{{ URL::to('/view-post/'.$sevenCategoryPostsBig->id.'/'.$slug) }}">
												@if(session()->get('lang')== 'English')
													{{ $sevenCategoryPostsBig->title_en }}
												@else
													{{ $sevenCategoryPostsBig->title_bn }}
												@endif
											</a> </h4>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										@foreach($sevenCategoryPostsSmall as $row)
											@php
												if (session()->get('lang')=='English') {
													$slug = preg_replace('/\s+/u','-',trim($row->title_en));
												}else{
													$slug = preg_replace('/\s+/u','-',trim($row->title_bn));
												}
											@endphp
											<div class="image-title">
												<a href="{{ URL::to('/view-post/'.$row->id.'/'.$slug) }}"><img src="{{ URL::to($row->image) }}" alt="Notebook"></a>
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
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title-02"><a href="#">@if(session()->get('lang')== 'English')
									  		{{ $eightCategory->name_en }}
										@else
											{{ $eightCategory->name_bn }}
										@endif
									  <i class="fa fa-angle-right" aria-hidden="true"></i><span>
											@if(session()->get('lang')== 'English')
										   		More
											@else
												আরও
											@endif
										<i class="fa fa-angle-double-right" aria-hidden="true"></i>
										</span></a></div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
											@php
												if (session()->get('lang')=='English') {
													$slug = preg_replace('/\s+/u','-',trim($eightCategoryPostsBig->title_en));
												}else{
													$slug = preg_replace('/\s+/u','-',trim($eightCategoryPostsBig->title_bn));
												}
											@endphp
											<a href="{{ URL::to('/view-post/'.$eightCategoryPostsBig->id.'/'.$slug) }}"><img src="{{ URL::to($eightCategoryPostsBig->image) }}" alt="Notebook"></a>
											<h4 class="heading-02"><a href="{{ URL::to('/view-post/'.$eightCategoryPostsBig->id.'/'.$slug) }}">
												@if(session()->get('lang')== 'English')
													{{ $eightCategoryPostsBig->title_en }}
												@else
													{{ $eightCategoryPostsBig->title_bn }}
												@endif
											</a> </h4>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										@foreach($eightCategoryPostsSmall as $row)
											@php
												if (session()->get('lang')=='English') {
													$slug = preg_replace('/\s+/u','-',trim($row->title_en));
												}else{
													$slug = preg_replace('/\s+/u','-',trim($row->title_bn));
												}
											@endphp
											<div class="image-title">
												<a href="{{ URL::to('/view-post/'.$row->id.'/'.$slug) }}"><img src="{{ URL::to($row->image) }}" alt="Notebook"></a>
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
					</div>
					<!-- ******* -->
					<br />
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="cetagory-title-02"><a href="#">
									@if(session()->get('lang')== 'English')
								   		Country
									@else
										সারাদেশে
									@endif
								  <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> 
									@if(session()->get('lang')== 'English')
								   		All News
									@else
										সব খবর
									@endif
								    </span></a></div>
								    <div class="row">
								    	<div class="col-md-8 col-lg-8">
								    		@php
								    			$divisions = DB::table('divisions')->get();
								    		@endphp
								    		<form action="{{ route('search.news') }}" method="get">
								    			@csrf
								    			<div class="row">
								    				<div class="col-sm-5 col-md-5 col-lg-5">
								    					<select class="form-control" name="division_id" id="division_id" required="">
								    						<option selected="" disabled="">Choose One</option>
								    						@foreach($divisions as $row)
																<option value="{{ $row->id }}">{{ $row->name_en }}|{{ $row->name_bn }}</option>
								    						@endforeach
								    					</select>
								    				</div>
								    				<div class="col-sm-5 col-md-5 col-lg-5">
								    					<select class="form-control" name="district_id" id="district_id" required="">
								    						<option selected="" disabled="">Choose One</option>
								    					</select>
								    				</div>
								    				<div class="col-sm-2 col-md-2 col-lg-">
								    					<button type="submit" class="btn btn-sm btn-info">
								    						@if(session()->get('lang')== 'English')
								    					   		Search
								    						@else
								    							খুজুন
								    						@endif
								    					
								    					</button>
								    				</div>
								    			</div>

								    		</form>
								    	</div>
								    	<div class="col-md-4 col-lg-4">
								    		
								    	</div>
								    </div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="bg-gray">
								<div class="top-news">
									@php
										if (session()->get('lang')=='English') {
											$slug = preg_replace('/\s+/u','-',trim($countryBig->title_en));
										}else{
											$slug = preg_replace('/\s+/u','-',trim($countryBig->title_bn));
										}
									@endphp
									<a href="{{ URL::to('/view-post/'.$countryBig->id.'/'.$slug) }}"><img src="{{ asset($countryBig->image)}}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{ URL::to('/view-post/'.$countryBig->id.'/'.$slug) }}">
									@if(session()->get('lang')== 'English')
								   		{{ $countryBig->title_en }}
									@else
										{{ $countryBig->title_bn }}
									@endif
								</a> </h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							@foreach($countryFirstSection as $row)
								@php
									if (session()->get('lang')=='English') {
										$slug = preg_replace('/\s+/u','-',trim($row->title_en));
									}else{
										$slug = preg_replace('/\s+/u','-',trim($row->title_bn));
									}
								@endphp
								<div class="news-title">
									<a href="{{ URL::to('/view-post/'.$row->id.'/'.$slug) }}">
										@if(session()->get('lang')== 'English')
									   		{{ $row->title_en }}
										@else
											{{ $row->title_bn }}
										@endif
									</a>
								</div>
							@endforeach
						</div>
						<div class="col-md-4 col-sm-4">
							@foreach($countrySecondSection as $row)
								@php
									if (session()->get('lang')=='English') {
										$slug = preg_replace('/\s+/u','-',trim($row->title_en));
									}else{
										$slug = preg_replace('/\s+/u','-',trim($row->title_bn));
									}
								@endphp
								<div class="news-title">
									<a href="{{ URL::to('/view-post/'.$row->id.'/'.$slug) }}">
										@if(session()->get('lang')== 'English')
									   		{{ $row->title_en }}
										@else
											{{ $row->title_bn }}
										@endif
									</a>
								</div>
							@endforeach
							
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
								@if($horizontal5)
									<a href="{{ $horizontal5->link }}"><img src="{{asset($horizontal5->ads)}}" alt=""/></a>
								@endif
								
							</div>
						</div>
					</div><!-- /.add-close -->	


				</div>
				<div class="col-md-3 col-sm-3">
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
					<!-- Namaj Times -->
					<div class="cetagory-title-03">
						    @if(session()->get('lang') == "English")
								Prayer Time
						    @else
								নামাজের সময়সূচি
						    @endif
					 
					</div>
					<table class="table">
						<tr>
							<td>
								<b>
									@if(session()->get('lang') == "English")
										Fajr
									@else
										ফজর
									@endif
								</b>
							</td>
							<td>
								<b>
									@if(session()->get('lang') == "English")
										{{ $prayer->fajr_en }}
									@else
										{{ $prayer->fajr_bn }}
									@endif
								</b>
							</td>
						</tr>

						<tr>
							<td>
								<b>
									@if(session()->get('lang') == "English")
										Johr
									@else
										জোহর
									@endif
								</b>
							</td>
							<td>
								<b>
									@if(session()->get('lang') == "English")
										{{ $prayer->johr_en }}
									@else
										{{ $prayer->johr_bn }}
									@endif
								</b>
							</td>
						</tr>

						<tr>
							<td>
								<b>
									@if(session()->get('lang') == "English")
										Asor
									@else
										আসর
									@endif
								</b>
							</td>
							<td>
								<b>
									@if(session()->get('lang') == "English")
										{{ $prayer->asor_en }}
									@else
										{{ $prayer->asor_bn }}
									@endif
								</b>
							</td>
						</tr>
						<tr>
							<td>
								<b>
									@if(session()->get('lang') == "English")
										Magrib
									@else
										মাগরিব
									@endif
								</b>
							</td>
							<td>
								<b>
									@if(session()->get('lang') == "English")
										{{ $prayer->magrib_en }}
									@else
										{{ $prayer->magrib_bn }}
									@endif
								</b>
							</td>
						</tr>

						<tr>
							<td>
								<b>
									@if(session()->get('lang') == "English")
										Esha
									@else
										ইশা
									@endif
								</b>
							</td>
							<td>
								<b>
									@if(session()->get('lang') == "English")
										{{ $prayer->esha_en }}
									@else
										{{ $prayer->esha_bn }}
									@endif
								</b>
							</td>
						</tr>
					</table>
					<!-- Namaj Times -->
					<div class="cetagory-title-03">পুরানো সংবাদ  </div>
					<form action="" method="post">
						<div class="old-news-date">
						   <input type="text" name="from" placeholder="From Date" required="">
						   <input type="text" name="" placeholder="To Date">			
						</div>
						<div class="old-date-button">
							<input type="submit" value="খুজুন ">
						</div>
				   </form>
				   <!-- news -->
				   <br><br><br><br><br>
				   <div class="cetagory-title-04"> 
				   		@if(session()->get('lang') == "English")
				   			Important Websites
				   		@else
				   			গুরুত্বপূর্ণ ওয়েবসাইট 
				   		@endif
				   		
					</div>
				   <div class="">
				   	@foreach($websites as $website)
						<div class="news-title-02">
							<h4 class="heading-03">
								<a href="{{ $website->url }}">
									<i class="fa fa-check" aria-hidden="true"></i> 
									 @if(session()->get('lang') == "English")
									 	{{ $website->name_en }}
									 @else
									 	{{ $website->name_bn }}
									 @endif
								</a> 
							</h4>
						</div>
				   	@endforeach
				   </div>

				</div>
			</div>
		</div>
	</section><!-- /.3rd-news-section-close -->
	


	


	


	<!-- gallery-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-sm-7">
					<div class="gallery_cetagory-title">
						@if(session()->get('lang') == "English")
						 	Photo Gallery
						 @else
						 	ফটো গ্যালারি
						 @endif
					</div>

					<div class="row">
	                    <div class="col-md-8 col-sm-8">
	                        <div class="photo_screen">
	                            <div class="myPhotos" style="width:100%">
                                      <img src="{{ asset($photoBig->photo)}}"  alt="Avatar">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-4 col-sm-4">
	                        <div class="photo_list_bg">
	                            
	                            @foreach($photoSmall as $row)
	                            	<div class="photo_img photo_border active">
	                            	    <img src="{{ asset($row->photo)}}" alt="image" onclick="currentDiv(1)">
	                            	    <div class="heading-03">
	                            	        @if(session()->get('lang') == "English")
	                            	         	{{ $row->title_en }}
	                            	         @else
	                            	         	{{ $row->title_bn }}
	                            	         @endif
	                            	    </div>
	                            	</div>

	                            @endforeach

	                        </div>
	                    </div>
	                </div>

	                <!--=======================================
                    Video Gallery clickable jquary  start
                ========================================-->

                            <script>
                                    var slideIndex = 1;
                                    showDivs(slideIndex);

                                    function plusDivs(n) {
                                      showDivs(slideIndex += n);
                                    }

                                    function currentDiv(n) {
                                      showDivs(slideIndex = n);
                                    }

                                    function showDivs(n) {
                                      var i;
                                      var x = document.getElementsByClassName("myPhotos");
                                      var dots = document.getElementsByClassName("demo");
                                      if (n > x.length) {slideIndex = 1}
                                      if (n < 1) {slideIndex = x.length}
                                      for (i = 0; i < x.length; i++) {
                                         x[i].style.display = "none";
                                      }
                                      for (i = 0; i < dots.length; i++) {
                                         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                                      }
                                      x[slideIndex-1].style.display = "block";
                                      dots[slideIndex-1].className += " w3-opacity-off";
                                    }
                                </script>

                <!--=======================================
                    Video Gallery clickable  jquary  close
                =========================================-->

				</div>
				<div class="col-md-4 col-sm-5">
					<div class="gallery_cetagory-title">

						 @if(session()->get('lang') == "English")
						 	Video Gallery
						 @else
						 	ভিডিও গ্যালারি
						 @endif
					 
					</div>

					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                    <iframe width="853" height="480" src="https://www.youtube.com/embed/{{ $videoBig->embed_code }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                	</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        
                            <div class="gallery_sec owl-carousel">
								@foreach($videoSmall as $row)
	                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
										
										    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
										    <iframe width="200" height="140" src="https://www.youtube.com/embed/{{ $row->embed_code }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
										
	                                </div>
								@endforeach
                            </div>
                        </div>
                    </div>


                    <script>
                        var slideIndex = 1;
                        showDivss(slideIndex);

                        function plusDivs(n) {
                          showDivss(slideIndex += n);
                        }

                        function currentDivs(n) {
                          showDivss(slideIndex = n);
                        }

                        function showDivss(n) {
                          var i;
                          var x = document.getElementsByClassName("myVideos");
                          var dots = document.getElementsByClassName("demo");
                          if (n > x.length) {slideIndex = 1}
                          if (n < 1) {slideIndex = x.length}
                          for (i = 0; i < x.length; i++) {
                             x[i].style.display = "none";
                          }
                          for (i = 0; i < dots.length; i++) {
                             dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                          }
                          x[slideIndex-1].style.display = "block";
                          dots[slideIndex-1].className += " w3-opacity-off";
                        }
                    </script>

				</div>
			</div>
		</div>
	</section><!-- /.gallery-section-close -->


	
	
@endsection