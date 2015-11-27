@extends('layouts.master')
@section('content')

<div id="fb-root"></div>
<div class="page-heading">
    <div class="control-group clearfix">

        <div class="pull-left" style="padding-top: 8px;">
            {{$resource->name}}
        </div>
        <div class="pull-right hidden-print hidden-xs">
        <button class="btn btn-link"><input type="button" value="Print this page" onClick="window.print()"></button>
    </div>
        <div class="pull-right" style="padding-top:8px; margin-right: 10px;">
            <a class="white-link hidden-print" href="{{ URL::to('resources/') }}">Back to Resources</a>
        </div>
    </div>
</div>
<div class="section-content">
<div class="panel-body">
    <div class="form-item">
        {{$resource->description}}     
    </div>
    <br/>
    <div class="form-item">
        <strong>Level: </strong>
        {{$resource->level}}
    </div>
    <br/>
    <div class="form-item">
        <strong>
            Faculty:    
        </strong>
            {{$resource->faculty}}
    </div>
    <br/>
    <div class="form-item">
        <a target="_blank" href={{$resource->url}}>{{$resource->url}}</a>
    </div>
    <br/>
        <div class="fb-like hidden-print" data-href={{Request::url()}} data-layout="standard" data-action="like" data-show-faces="true" ></div>
        <div class="form-item hidden-print">
        <h4> Share </h4>        
            <a target="_blank" href="{{ Share::load(Request::url(), 'check this '.$resource->name)->twitter() }}" >
                <i class="fa fa-lg fa-twitter btn btn-sm btn-primary"></i>
            </a>
            <a target="_blank" href="{{ Share::load(Request::url(), 'check this '.$resource->name)->facebook() }}" >
                <i class="fa fa-lg fa-facebook btn btn-sm btn-primary"></i>
            </a>
            <a target="_blank" href="{{ Share::load(Request::url(), 'check this '.$resource->name)->gplus() }}" >
                <i class="fa fa-lg fa-google-plus btn btn-sm btn-primary"></i>
            </a>
            <a target="_blank" href="{{ Share::load(Request::url(), 'check this '.$resource->name)->linkedin() }}" >
                <i class="fa fa-lg fa-linkedin btn btn-sm btn-primary"></i>
            </a>
    </div>
    <div class="photo-container">
        <div class="row">
            @foreach($photos as $photo)
            
            <div class="col-md-2 col-xs-6 col-sm-3">
                <div class="thumb-wrapp text-center">
                    <div class="photo">
                    
                        <a href="{{URL::to('resource/'.$resource->id.'/default/'.$photo->id)}}"><img src="{{$photo->thumbnailUrl('medium')}}" draggable="true" class="draggable thumbnail img-responsive" ondragstart="drag(event)" id="photo-{{$photo->id}}" data-id="{{$photo->id}}">
                        <p class="imgDef" <?php if(strcmp($photo->id,$resource->def_photo_id) == 0)
                        {
                            echo "style = 'visibility:visible; background:rgba(0,153,0,0.62); opacity:1'>This Image is default";

                        }
                        else
                        {
                            echo "'>Set this image as default";
                        }
                        ?>
                        
                        </p></a>
                    </div>
                    <div class="caption-image">
                        <small>
                            <a class="pull-left" href="{{$photo->url}}">Full image</a> 
                            <?php if (Auth::user()->role == 'admin'): ?>
                                <a class="pull-right" title="Remove this image" href="{{URL::to('resources/' . $resource->id . '/remove_photos/'. $photo->id)}}"><i class="fa fa-times"></i></a>
                            <?php endif ?>
                        </small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <br/>
    <div class="number-hits hidden-print">
        Number of hits : <?php echo sizeof($views); ?>
    </div>
    <div class="form-item hidden-print" style="margin-top: 40px;">
        <a class="btn btn-info" href="{{URL::to('resources/' . $resource->id . '/quizzes')}}" style="background: rgb(45, 108, 162); font-size: 25px;">Quizzes</a>
    </div>
</div>
</div>
<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
@stop
