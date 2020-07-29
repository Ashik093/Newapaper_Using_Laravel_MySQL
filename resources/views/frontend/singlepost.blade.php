@extends('layouts.front')
@section('meta')
  <meta property="og:url" content="{{Request::fullUrl()}}" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="@if(session()->get('lang')== 'English') {{ $post->title_en }} @else {{ $post->title_bn }} @endif" />
  <meta property="og:description" content="@if(session()->get('lang')== 'English') {{ $post->details_en }} @else {{ $post->details_bn }} @endif" />
  <meta property="og:image" content="{{URL::to($post->image)}}" />
@endsection
@section('content')
 @php
    function bn_single_date($str)
    {
        $en = array(1,2,3,4,5,6,7,8,9,0);
        $bn = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
        $str = str_replace($en, $bn, $str);
        $en = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
        $en_short = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
        $bn = array( 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর' );
        $str = str_replace( $en, $bn, $str );
        $str = str_replace( $en_short, $bn, $str );
        $en = array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
        $en_short = array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
        $bn_short = array('শনি', 'রবি','সোম','মঙ্গল','বুধ','বৃহঃ','শুক্র');
        $bn = array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
        $str = str_replace( $en, $bn, $str );
        $str = str_replace( $en_short, $bn_short, $str );
        $en = array( 'am', 'pm' );
        $bn = array( 'পূর্বাহ্ন', 'অপরাহ্ন' );
        $str = str_replace( $en, $bn, $str );
        $str = str_replace( $en_short, $bn_short, $str );
        $en = array( '১২', '২৪' );
        $bn = array( '৬', '১২' );
        $str = str_replace( $en, $bn, $str );
         return $str;
    }
@endphp
	<section class="single-page">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">   
					   <li><a href="{{ route('/') }}"><i class="fa fa-home"></i></a></li>					   
						<li><a href="#">
							@if(session()->get('lang')== 'English')
								{{ $post->category->name_en }}
							@else
								{{ $post->category->name_bn }}
							@endif
						</a></li>
						<li><a href="#">
							@if(session()->get('lang')== 'English')
								{{ $post->subcategory->name_en }}
							@else
								{{ $post->subcategory->name_bn }}
							@endif
						</a></li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12"> 											
					<header class="headline-header margin-bottom-10">
						<h1 class="headline">
							@if(session()->get('lang')== 'English')
								{{ $post->title_en }}
							@else
								{{ $post->title_bn }}
							@endif
						</h1>
					</header>
		 
		 
				 <div class="article-info margin-bottom-20">
				  <div class="row">
						<div class="col-md-6 col-sm-6"> 
						 <ul class="list-inline">
						 
						 
						 <li>অন্যদৃষ্টি  অনলাইন </li>
						 <li><i class="fa fa-clock-o"></i>
							@if(session()->get('lang')== 'English')
								{{$post->post_date}}  
							@else
								{{ bn_single_date($post->post_date) }}  
							@endif
						 </li>
						 </ul>
						
						</div>
						<div class="col-md-6 col-sm-6 pull-right"> 						
							<ul class="social-nav">
								{{-- <li><a href="" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('#'),'facebook-share-dialog','width=626,height=436'); return false;" target="_blank" title="Facebook" rel="nofollow" class="facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a target="_blank" href="" onclick="javascript:window.open('https://twitter.com/share?text=‘#'); return false;" title="Twitter" rel="nofollow" class="twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a target="_blank" href="" onclick="window.open('https://plus.google.com/share?url=#'); return false;" title="Google plus" rel="nofollow" class="google"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" target="_blank" title="Print" rel="nofollow" class="print"><i class="fa fa-print"></i></a></li> --}}

						
							</ul>						   
						</div>						
					</div>				 
				 </div>				
			</div>
		  </div>
		  <!-- ******** -->
		  <div class="row">
			<div class="col-md-8 col-sm-8">
				<div class="single-news">
					<img src="{{ asset($post->image) }}" alt="" />
					<h4 class="caption">
						@if(session()->get('lang')== 'English')
							{{ $post->title_en }}
						@else
							{{ $post->title_bn }}
						@endif
					</h4>
					<div class="sharethis-inline-share-buttons" data-href="{{ Request::url() }}"></div>
					<br>
					<p>
						@if(session()->get('lang')== 'English')
							{!! $post->details_en !!}
						@else
							{!! $post->details_bn !!}
						@endif
					</p>
				</div>
				<div class="comment-section " style="width: 100%;">
					<!-- Begin .title-style01 -->
					<div class=" comment-title title-style01 ">
						<h4> Comments</h4>
					</div>
					<!-- End .title-style01 -->
					<div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5">
					</div>
				</div><hr>
				<!-- ********* -->
				<div class="row">
					<div class="col-md-12"><h2 class="heading">
						@if(session()->get('lang')== 'English')
							More News
						@else
							আরো সংবাদ
						@endif
						
					</h2></div>
					@foreach($relatedPost as $row)
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
	</section>
	<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f1f2fb906c3390012da3323&product=inline-share-buttons" data-href="{{ Request::url() }}" async="async"></script>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0" nonce="dOFmbnVs"></script>
@endsection