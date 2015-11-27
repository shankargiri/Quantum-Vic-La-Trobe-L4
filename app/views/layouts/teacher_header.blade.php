<style>
a{
    color: #690000;
}
a:hover {
    color: #690000;
}
  .sidebar-subheading{
    color:#690000;
    font-weight: bold;
    padding:10px;
    border-bottom:1px dotted #ccc;
  }
</style>
<li class="sidebar-subheading">Posts</li>
<li>
  <a href="{{URL::to('viewposts')}}">
    View all posts
  </a>
</li>
<li class="sidebar-subheading">Resources</li>
<li>
  <a href="{{ URL::to('resources')}}">
    View all resources
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

<li class="sidebar-subheading">Tags</li>
<li>
  <a href="{{ URL::to('tags')}}">
    View all tags
  </a>
</li>
<li>
  <a class="sidebar-subheading" href="{{URL::to('logout')}}">
    Logout
  </a>
</li>