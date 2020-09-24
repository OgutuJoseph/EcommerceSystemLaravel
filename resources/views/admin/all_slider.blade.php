@extends('admin_layout')

@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{ URL::to('/dashboard') }}">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="{{ URL::to('/all-slider') }}">Sliders</a></li>
</ul>
<p class="alert-success">
    <?php
        $message=Session::get('message');
        if($message)
        {
            echo $message;
            Session::put('message',null);
        }
    ?>
</p>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>All Sliders</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Slider ID</th> 
                        <th>Slider Image</th> 
                        <th>Publication Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                @foreach($all_slider_info as $v_slider)
                <tbody>
                    <tr>
                        <td class="center">{{ $v_slider->slider_id }}</td>
                        <td ><img src="{{URL::to($v_slider->slider_image)}}" style="height: 100px; width: 200px;"></td> 
                        <td class="center">
                            @if($v_slider->publication_status==1)
                            <span class="label label-success">Active</span>
                            @else
                            <span class="label label-danger">Inactive</span>
                            @endif
                        </td>
                        <td class="center">
                            @if($v_slider->publication_status==1)
                            <a class="btn btn-info" href="{{ URL::to('/inactive_slider/'.$v_slider->slider_id) }}"><i class="halflings-icon white thumbs-up"></i></a>
                            @else
                            <a class="btn btn-info" href="{{ URL::to('/active_slider/'.$v_slider->slider_id) }}"><i class="halflings-icon white thumbs-down"></i></a>
                            @endif

                        </td>
                    </tr>       
                </tbody>
                @endforeach
            </table>            
        </div>
    </div><!--/span-->

</div><!--/
@endsection