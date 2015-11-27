@extends('layouts.master')
@section('content')
<div class="page-heading">
    {{$resource->name}} photos to be approved
</div>
<div class="section-content">
<div class="row">
    <div class="col-md-12">
        <div class="panel-body">
            <table id="data-table" class="table table-bordered table-hover table-responsive tag_table">
                <thead>
                    <tr>
                        <th class="col-md-6"><div align ="center">Photo</div></th>
                        <th class="col-md-6"><div align ="center">Action</div></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($photo_resources as $photo_resource)
                    <tr>
                        <td>
                            <div align ="center">
                            <?php $thumbnailUrl = str_replace($photo_resource->photo_name, 'medium'."-".$photo_resource->photo_name, $photo_resource->url); ?>
                                <img src="{{$thumbnailUrl}}" class="img-responsive thumbnail"> 
                            </div>
                        </td>
                        <td>
                            <div align="right">
                                <a class="btn btn-info" href="{{URL::to('admin/resources/' . $photo_resource->resource_id . '/approve_photos/'. $photo_resource->photo_id)}}" >Approve</a>
                                <a class="btn btn-danger" href="{{URL::to('admin/resources/' . $photo_resource->resource_id . '/reject_photos/'. $photo_resource->photo_id)}}">Reject</a>
                            </div>
                        </td>
                    </tr>						
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

