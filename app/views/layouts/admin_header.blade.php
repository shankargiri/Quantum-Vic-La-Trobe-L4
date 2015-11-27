<style>
  .sidebar-subheading{
    color:#008cba;
    font-weight: bold;
    padding:10px;
    border-bottom:1px dotted #ccc;
  }
</style>
<li class="sidebar-subheading">Posts</li>
<li>
  <a href="{{URL::to('posts')}}">
    View all posts
  </a>
</li>
<li>
  <a href="{{URL::to('posts/create')}}">
    Create new post</a>
</li>
<li class="sidebar-subheading">Resources</li>
<li>
  <a href="{{ URL::to('resources')}}">
    View all resources
  </a>
</li>
<li>
  <a href="{{ URL::to('resources/create') }}">
    Create new resource
  </a>
</li>
<li>
  <a href="{{ URL::to('admin/resource_report') }}">
    Resource report 
  </a>
</li>
<li class="sidebar-subheading">Posters</li>
<li>
  <a href="{{ URL::route('posters')}}">
    View all Posters
  </a>
</li>
<li>
  <a href="{{ URL::route('createposters') }}">
    Create new Poster
  </a>
</li>
<li class="sidebar-subheading">Tags</li>
<li>
  <a href="{{ URL::to('tags')}}">
    View all tags
  </a>
</li>
<li class="{{Request::is('tags/create') ? 'active' : '' }}">
  <a href="{{ URL::to('tags/create')}}"> 
    Create new tag
  </a>
</li>
<li class="sidebar-subheading">Photos</li>
<li class= "{{Request::is('photos') ? 'active' : '' }}">
  <a href="{{URL::to('photos')}}">
    Gallery
  </a>
</li>
<li>
  <a href="{{ URL::to('addphotos') }}">
     Add photos to resources 
  </a>
</li>
<li>
  <a href="{{ URL::to('tagPhotos') }}">
     Tag Photos
  </a>
</li>
<li>
  <a href="{{URL::to('admin/resources')}}">Approve photos <span class="badge alert-danger">{{sizeof(Resource::unApprovedResourcePhotos())}}</span></a>
</li>
<li>
  <a class="sidebar-subheading" href="{{URL::to('logout')}}">
    Logout
  </a>
</li>