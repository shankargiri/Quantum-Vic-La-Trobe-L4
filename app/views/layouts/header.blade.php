<?php if (Auth::user()->role == 'Admin'):  echo 'admin'; ?>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
<?php else: ?>
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<?php endif ?>

  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand logo" href="{{URL::to('/')}}"> {{HTML::image('img/quantum_logo.png') }} </a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown {{Request::is('posts*') ? 'active' : '' }}" >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Posts <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <?php if (Auth::user()->role == 'Admin'): ?>
              <li>
                <a href="{{URL::to('posts')}}">
                  <i class="fa fa-search"></i> 
                  View all posts
                </a>
              </li>
              <li>
                <a href="{{URL::to('posts/create')}}">
                <i class="fa fa-pencil-square-o"></i> Create new post</a>
              </li>
            <?php else: ?>
              <li><a href="{{URL::to('viewposts')}}">View all posts</a></li>
            <?php endif ?>
          </ul>
        </li>  
        <li class="dropdown {{Request::is('resources*') ? 'active' : '' }}">
          <a href="" class="dropdown-toggle" data-toggle="dropdown">Resources <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{ URL::to('resources')}}"><i class="fa fa-search"></i> View all resources</a></li>
            <?php if (Auth::user()->role == 'Admin'): ?>
            <li><a href="{{ URL::to('resources/create') }}">
              <i class="fa fa-pencil-square-o"></i> Create new resource</a>
            </li>
            <li><a href="{{ URL::to('admin/resource_report') }}">
              <i class="fa fa-users"></i> Resource report </a>
            </li>
            <li><a href="{{ URL::to('addphotos') }}">
              <i class="fa fa-plus-square"></i> Add photos to resources </a>
            </li>
            <?php endif; ?>
          </ul>
        </li>
        <?php if (Auth::user()->role == 'Admin'): ?>
         <li class="dropdown {{Request::is('tags*') ? 'active' : '' }}" >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tags <b class="caret"></b></a>
          <ul class="dropdown-menu {{Request::is('tags') ? 'active' : '' }}">
            <li><a href="{{ URL::to('tags')}}"><i class="fa fa-search"></i> View all tags</a></li>
            
              <li class="{{Request::is('tags/create') ? 'active' : '' }}">
                <a href="{{ URL::to('tags/create')}}">
                  <i class="fa fa-pencil-square-o"></i> Create new tag
                </a>
              </li>
          </ul>
        </li>  
        <?php endif ?>
        <li class= "{{Request::is('photos') ? 'active' : '' }}"><a href="{{URL::to('photos')}}">Gallery</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
            <li><a href="{{URL::to('logout')}}"><i class="fa fa-power-off"></i>  Logout</a></li>
          </ul>
        </li>        
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>