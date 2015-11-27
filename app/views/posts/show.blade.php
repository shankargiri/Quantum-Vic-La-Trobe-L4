@extends('layouts.master')

@section('content')
<div id="fb-root"></div>
				
<div class="page-heading">
    <div class="control-group clearfix">
        	<div class="pull-left" style="padding-top: 8px;">
		{{$post->title}}
	</div>
	<div class="pull-right" style="padding-top:8px; margin-right: 10px;">
            <a class="white-link hidden-print" href="{{ URL::to('posts/') }}">Back to All Posts</a>
        	</div>
     </div>
 </div>
<div class="section-content">
	<div class="panel-body">
    		<div class="form-item">
			{{$post->body}}
		</div >
		<div style="padding-top:10px;"  class="fb-like" data-href={{Request::url()}} data-layout="standard" data-action="like" data-show-faces="true" ></div>
		<div class="form-item" >
			<h4> Share </h4>		
			<a target="_blank" href="{{ Share::load(Request::url(), 'check this '.$post->title)->twitter() }}" ><i class="fa fa-lg fa-twitter btn btn-sm btn-primary"></i></a>
			<a target="_blank" href="{{ Share::load(Request::url(), 'check this '.$post->title)->facebook() }}" ><i class="fa fa-lg fa-facebook btn btn-sm btn-primary"></i></a>
			<a target="_blank" href="{{ Share::load(Request::url(), 'check this '.$post->title)->gplus() }}" ><i class="fa fa-lg fa-google-plus btn btn-sm btn-primary"></i></a>
			<a target="_blank" href="{{ Share::load(Request::url(), 'check this '.$post->title)->linkedin() }}" ><i class="fa fa-lg fa-linkedin btn btn-sm btn-primary"></i></a>
		</div>
	</div>
</div>



				<script>(function(d, s, id) {
 				 var js, fjs = d.getElementsByTagName(s)[0];
  				 if (d.getElementById(id)) return;
  				 js = d.createElement(s); js.id = id;
  				 js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  				 fjs.parentNode.insertBefore(js, fjs);
				 }(document, 'script', 'facebook-jssdk'));
				</script>

@stop
