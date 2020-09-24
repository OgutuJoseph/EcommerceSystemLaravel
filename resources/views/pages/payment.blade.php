@extends('layout')

@section('content')

<section id="cart_items">
    <div class="container col-sm-12">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ URL::to('/payment') }}">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php
                $contents=Cart::content(); 
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($contents as $v_content) {?>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{URL::to($v_content->options->image)}}" alt="" style="height: 80px; width: 80px;"></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$v_content->name}}</a></h4> 
                        </td>
                        <td class="cart_price">
                            <p>{{$v_content->price}} Ksh/-</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{url('/update-cart')}}" method="post">
                                    {{ csrf_field() }}
                                    <input class="cart_quantity_input" type="text" name="qty" value="{{$v_content->qty}}" autocomplete="off" size="2">
                                    <input type="hidden" name="rowId" value="{{$v_content->rowId}}" autocomplete="off">
                                    <input type="submit" name="submit" value="update" class="btn btn-sm btn-default">
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{$v_content->total}}</p>
                        </td>
                        <td class="cart_delete">

                            <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container col-sm-10"> 
        
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('/payment') }}">Home</a></li>
                <li class="active">Payment Method</li>
            </ol>
        </div>
        <div class="paymentCont">
            <div class="headingWrap">
                <h3 class="headingTop text-center">Select Payment Method</h3> 
            </div>
            <!--<form action="" method="post"> -->
                <div class="paymentWrap">
                    <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                        <label class="btn paymentMethod active">
                            <div class="method visa"></div>
                            <!--<input type="radio" name="payment_gateway" value="handcash" checked>-->
                        </label>
                        <label class="btn paymentMethod active">
                            <div class="method master-card"></div> 
                        </label>
                        <label class="btn paymentMethod active">
                            <div class="method amex"></div> 
                        </label>
                        <label class="btn paymentMethod active">
                            <div class="method vishwa"></div> 
                        </label>
                        <!-- <label class="btn paymentMethod active">
                            <div class="method ezcash"></div> 
                        </label> -->
                    </div> 
                </div>
            <!--</form>-->
            <form action="{{url('/order-place')}}" method="post">
                {{ csrf_field() }}
                <input type="radio" name="payment_method" value="handcash">Handcash<br>
                <input type="radio" name="payment_method" value="visa">Visa<br>
                <input type="radio" name="payment_method" value="master_card">Master Card<br>
                <input type="radio" name="payment_method" value="amex">America Express<br>
                <input type="radio" name="payment_method" value="ez_cash">EZ-Cash<br>
                <input type="submit" name="" value="Done">
            </form>
            <!--<div class="footerNavWrap clearfix">
                <div class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span>Done</div>
            </div>-->
        </div>
    </div>
</section>
@endsection