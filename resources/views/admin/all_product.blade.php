@extends('admin_layout')

@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{ URL::to('/dashboard') }}">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="{{ URL::to('/all-product') }}">Products</a></li>
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
            <h2><i class="halflings-icon user"></i><span class="break"></span>All Products</h2>
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
                        <th>Product ID</th> 
                        <th>Category Name</th>
                        <th>Manufacture Name</th>
                        <th>Product Name</th> 
                        <th>Product Price</th>
                        <th>Product Image</th>
                        <th>Product Size</th> 
                        <th>Product Color</th>
                        <th>Publication Status</th>
                        <th>Actions</th>
                        <th></th>
                    </tr>
                </thead>   
                @foreach($all_product_info as $v_product)
                <tbody>
                    <tr>
                        <td class="center">{{ $v_product->product_id }}</td>
                        <td class="center">{{ $v_product->category_name }}</td>
                        <td class="center">{{ $v_product->manufacture_name }}</td>
                        <td class="center">{{ $v_product->product_name }}</td> 
                        <td class="center">{{ $v_product->product_price }} KES/-</td>
                        <td><img src="{{URL::to($v_product->product_image)}}" style="height: 80px; width: 80px;"></td>
                        <td class="center">{{ $v_product->product_size }}</td>
                        <td class="center">{{ $v_product->product_color }}</td>
                        <td class="center">
                            @if($v_product->publication_status==1)
                            <span class="label label-success">Active</span>
                            @else
                            <span class="label label-danger">Inactive</span>
                            @endif
                        </td>
                        <td class="center">
                            @if($v_product->publication_status==1)
                            <a class="btn btn-info" href="{{ URL::to('/inactive_product/'.$v_product->product_id) }}"><i class="halflings-icon white thumbs-up"></i></a>
                            @else
                            <a class="btn btn-info" href="{{ URL::to('/active_product/'.$v_product->product_id) }}"><i class="halflings-icon white thumbs-down"></i></a>
                            @endif
                        </td>
                        <td>
                        <a class="btn btn-info" href="{{ URL::to('/delete-product/'.$v_product->product_id) }}" id="delete" ><i class="halflings-icon white trash"></i></a>
                        </td>
                    </tr>       
                </tbody>
                @endforeach
            </table>            
        </div>
    </div><!--/span-->

</div><!--/
@endsection