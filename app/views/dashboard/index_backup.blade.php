@extends('layouts.master')
@section('content')
{{HTML::script('/js/jquery.countdown.min.js')}}
<style>
    .post_title{text-transform: uppercase;line-height:1.5em;}
    .published_date{color: #808080;}
</style>
<div class="section-content">
<div class="resource-photo-wrapp">
    <div class="row">
        <div class="col-md-6 col-sm-12 vertical-separator">
            <div class="row page-heading">Recent Posts
            </div>
            <div class="panel-body">
                <?php if(!empty($latestPosts)): ?>
                    <div class="sigle_post">
                        @foreach($latestPosts as $lastPost)
                                <h4>
                                    <a class="post_title" target="_blank" href="{{URL::to('/posts/'.$lastPost -> id)}}">{{ $lastPost->title }}</a>
                                </h4>
                                <em class="published_date"><i class="fa fa-clock-o">&nbsp;</i><?php $postDate =  $lastPost->created_at;
                                            $date = date_create($postDate);
                                            echo date_format($date,'F j, Y')." at ".date_format($date,'g:i a'); ?>
                                    </em>
                                    <p>
                                        {{Str::limit ($lastPost->body, 150)}} 
                                        <a href="{{ URL::to('posts/'.$lastPost->id) }}">Read More</a>          
                                    </p>
                        @endforeach
                    </div>
                <?php else: echo "No any posts found. Please check back later."; ?>
                <?php endif ?>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="row page-heading">Popular Resources</div>
            <div class="panel-body">
                <?php if(!empty($popularResources)): ?>
                    <div class="sigle_post">
                        @foreach($popularResources as $popResource)
                            <h4>
                                    <a class="post_title" target="_blank" href="{{URL::to('/resources/'.$popResource->resource_id)}}">{{ $popResource->name }}</a>
                            </h4>
                            <p>
                            {{Str::limit ($popResource->description, 150)}} 
                                        <a href="{{ URL::to('resources/'.$popResource->resource_id) }}">Read More</a> 
                            </p>
                             <em class="published_date">
                                Views: {{ $popResource->count }}</em>
                        @endforeach
                    </div>
                <?php else: echo "Nothing published yet. Please check back later."; ?>
                <?php endif ?>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6 col-sm-12 vertical-separator">
            <div class="row page-heading">New Resources</div>
            <div class="panel-body">
                <?php if(!empty($latestResources)): ?>
                    <div class="sigle_post">
                    @foreach($latestResources as $latResource)
                    <h4>
                        <a  class="post_title" target="_blank" href="{{URL::to('/resources/'.$latResource -> id)}}">{{ $latResource->name }}</a>
                    </h4>
                    <em class="published_date">
                        <i class="fa fa-clock-o">&nbsp;</i><?php $resDate =  $latResource->created_at;
                                        $date = date_create($resDate);
                                        echo date_format($date,'F j, Y')." at ".date_format($date,'g:i a'); ?>
                      </em>
                      <p>
                        {{Str::limit ($latResource->description, 150)}} 
                                        <a href="{{ URL::to('resources/'.$latResource->id) }}">Read More</a>
                    </p>
                    @endforeach
                    </div>
                    <?php else: echo "Nothing published yet. Please check back later."; ?>
                <?php endif ?>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="row page-heading">Coming Soon</div>
            <div class="panel-body">
            <div id="getting-started"></div>
                <?php if(!empty($comingSoon)): ?>
                    <div class="sigle_post">
                        @foreach($comingSoon as $key => $comingSoon)
                            <h4 class="post_title">{{$comingSoon->name}}</h4>
                            <p>
                                {{str_limit ( $comingSoon->description, $limit=100, $end = '&nbsp;<a href="">Read More [+]</a>') }}
                            </p>
                        @endforeach
                    </div>
                <?php else: echo "Please, check back later for upcoming resources"; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    var $release_date = '{{ $releasing_date }}';
    $("#getting-started")
    .countdown($release_date, function(event) {
      $(this).text(
        event.strftime('%D days %H:%M:%S')
      );
   });
 </script>
@stop
