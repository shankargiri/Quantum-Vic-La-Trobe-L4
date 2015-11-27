<!DOCTYPE html>
<html>
<head>
    <title>Online Resource Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        {{ HTML::style("css/componentResGall.css") }}
        {{ HTML::style("css/style.css") }}
        {{ HTML::style("css/componentImages.css") }}
        {{HTML::style("css/resourceResponsive.css")}}
        {{ HTML::style("css/search.css")}} 
        {{ HTML::style("css/componentMenu.css")}}

        <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="../favicon.ico"> 
        {{ HTML::script("js/snap.svg-min.js")}}
        {{ HTML::script("js/modernizr.custom.js")}}
        {{ HTML::script("js/uisearch.js")}}
        <!--  -->
        {{ HTML::style("css/main_style.css") }}
        {{ HTML::style("css/admin_style.css") }}
        {{ HTML::style("css/responsive_style.css") }}
        {{HTML::style("css/bootstrap.min.css")}}
        {{HTML::style("css/bootstrap-theme.min.css")}}
        {{ HTML::style("css/font-awesome.min.css")}} 
        {{ HTML::style("css/jquery.dataTables.css")}}
        {{ HTML::style("css/jquery-ui.css")}}
        {{ HTML::script("js/jquery.min.js")}}
        {{ HTML::script("js/jquery.dataTables.js")}}
        {{HTML::script("js/bootstrap.min.js")}}
        {{ HTML::script("js/custom.js")}}
    {{HTML::style("css/jquery.fileupload.css")}}
    {{HTML::script("js/vendor/jquery.ui.widget.js")}}
    {{HTML::script("js/jquery.iframe-transport.js")}}
    {{HTML::script("js/jquery.fileupload.js")}}
    
    <!-- Generic page styles -->
    <!-- blueimp Gallery styles -->
<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    {{HTML::style('css/jquery.fileupload.css')}}
    {{HTML::style('css/jquery.fileupload-ui.css')}}
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript>{{HTML::style('css/jquery.fileupload-noscript.css')}}</noscript>
<noscript>{{HTML::style('css/jquery.fileupload-ui-noscript.css')}}</noscript>
</head>
<body style="background:#D8D8D8">
<div class="mp-pusher" id="mp-pusher">
                <!-- mp-menu -->
                <nav id="mp-menu" class="mp-menu">
                      <div class="mp-level">
                        <a href="{{URL::to('/')}}"><h2 class="">{{HTML::image('img/logoShogo.png', $alt = 'Resource Portal')}}</h2></a>
                        <a class="mp-back" href="#">back</a>
                        <ul>
                            <li >
                                <a  href="{{ URL::to('resources') }}">Resources</a>
                            </li>
                            <li><a href="{{ URL::to('resources') }}">View All Resources</a></li>
                            <li ><a href="{{ URL::to('viewposts') }}">View All Posts</a></li>
                            <li><a href="{{ URL::to('addphotos') }}">Add Photos to Resource</a></li>
                            <li><a href="{{ URL::to('photos') }}">Upload Photos</a></li>
                        </ul>
                            
                    </div>
                </nav>
                <!-- /mp-menu -->
                <div>
                <div class="block block-40 ">
                    <p>
                        <a href="#" id="trigger" class="menu-trigger">Menu</a>
                        <a style="font-size:.8em;float:right" href="{{URL::to('logout')}}">Logout</a>
                    </p>    
                </div>

                {{ HTML::script("js/classie.js")}}
                {{ HTML::script("js/mlpushmenu.js")}}
                
        
                <script>
            new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
        </script>

<div class="page-heading">
    Upload photos
</div>
<div class="section-content">
<div class="instruction-panel">
    <ul class="instructions">
        <li>Only image files (<strong>JPG, GIF, PNG</strong>) are allowed to upload.</li>
        <li>You can <strong>drag &amp; drop</strong> files from your desktop on this webpage (see <a href="https://github.com/blueimp/jQuery-File-Upload/wiki/Browser-support">Browser support</a>).</li>
        <li>You need to click "start" button once file is added.</li>
    </ul>   
</div>
    <!-- The file upload form used as target for the file upload widget -->
    <form id="fileupload" action="{{ URL::to('photos/store') }}" method="POST" enctype="multipart/form-data">
        <!-- Redirect browsers with JavaScript disabled to the origin page -->
        <noscript><input type="hidden" name="redirect" value="http://blueimp.github.io/jQuery-File-Upload/"></noscript>
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <div class="col-md-12">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add photos</span>
                    <input type="file" name="files[]" multiple>
                </span>
                <button type="submit" class="btn btn-primary start">
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start upload</span>
                </button>
                <button type="reset" class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel upload</span>
                </button>
                &nbsp;&nbsp;
                <?php if (sizeof($photos) > 0): ?>
                    <a href="{{ URL::to('addphotos') }}" class="btn btn-info"><i class="fa fa-asterisk"></i>&nbsp;Add photos to resources</a>
                <?php endif ?>
                <button type="button" class="btn btn-danger delete">
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete all</span>
                </button>
                <input type="checkbox" class="toggle">
                <!-- The global file processing state -->
                <span class="fileupload-process"></span>
            </div>
            <!-- The global progress state -->
            <div class="col-lg-5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <!-- The extended global progress state -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
    </form>
<!-- The blueimp Gallery widget -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
</div>

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}" class="preview-thumb"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<?php echo $photos->links(); ?>
<script src="http://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<!-- The File Upload processing plugin -->
{{HTML::script("js/jquery.fileupload-process.js")}}
<!-- The File Upload image preview & resize plugin -->
{{HTML::script("js/jquery.fileupload-image.js")}}
<!-- The File Upload audio preview plugin -->
{{HTML::script("js/jquery.fileupload-audio.js")}}
<!-- The File Upload video preview plugin -->
{{HTML::script("js/jquery.fileupload-video.js")}}
<!-- The File Upload validation plugin -->
{{HTML::script("js/jquery.fileupload-validate.js")}}
<!-- The File Upload user interface plugin -->
{{HTML::script("js/jquery.fileupload-ui.js")}}
<!-- The main application script -->
{{HTML::script("js/main.js")}}
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="/js/cors/jquery.xdr-transport.js"></script>
<![endif]-->
</body>
</html>    
