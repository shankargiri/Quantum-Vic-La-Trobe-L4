@extends('layouts.master')
@section('head')
	@parent
	{{HTML::style("css/jquery.fileupload.css")}}
    {{HTML::script("js/vendor/jquery.ui.widget.js")}}
	{{HTML::script("js/jquery.iframe-transport.js")}}
    {{HTML::script("js/jquery.fileupload.js")}}
	
	<!-- Generic page styles -->
	<!-- blueimp Gallery styles -->
    {{HTML::style("css/blueimp-gallery.min.css")}}
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    {{HTML::style('css/jquery.fileupload.css')}}
    {{HTML::style('css/jquery.fileupload-ui.css')}}
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript>{{HTML::style('css/jquery.fileupload-noscript.css')}}</noscript>
<noscript>{{HTML::style('css/jquery.fileupload-ui-noscript.css')}}</noscript>
@stop
@section('content')
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
                <input type="checkbox" class="toggle">
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
                <button type="button" class="btn btn-danger delete pull-right">
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete all</span>
                </button>
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
            <input type="checkbox" name="delete" value="1" class="toggle">&nbsp;&nbsp;&nbsp;&nbsp;
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
                <button class="btn btn-danger delete pull-right" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
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
{{HTML::script("/js/tmpl.min.js")}}
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
{{HTML::script("js/load-image.min.js")}}

<!-- The Canvas to Blob plugin is included for image resizing functionality -->
{{HTML::script("js/canvas-to-blob-min.js")}}
<!-- blueimp Gallery script -->
{{HTML::script("js/blueimp-gallery.min.js")}}
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
@stop