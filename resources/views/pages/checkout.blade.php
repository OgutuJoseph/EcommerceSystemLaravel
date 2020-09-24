@extends('layout')

@section('content')
<section id="cart_items">
    <div class="container"> 

        <div class="register-req col-sm-10" >
            <p>Please fill out this form:</p>
        </div><!--/register-req-->

        <div class="shopper-informations col-sm-12">
            <div class="row"> 

                <div class="clearfix col-sm-12">
                    <div class="bill-to">
                        <p>Shipping Details</p>
                        <div class="form-one">
                            <form action="{{url('/save-shipping-details')}}" method="post">
                                {{ csrf_field() }}
                                <input type="text" required="" name="shipping_email" placeholder="Email *">
                                <input type="text" required="" name="shipping_first_name" placeholder="First Name *">
                                <input type="text" required="" name="shipping_last_name" placeholder="Last Name *"> 
                                <input type="text" required="" name="shipping_address" placeholder="Address *">
                                <input type="text" required="" name="shipping_mobile_number" placeholder="Mobile Number *">
                                <input type="text" required="" name="shipping_city" placeholder="City *"> 
                                <input type="submit" class="btn btn-warning" value="Done"> 
                            </form>
                        </div> 
                    </div>
                </div> 					
            </div>
        </div>
        <div class="review-payment col-sm-5">
            <h2>Review & Payment</h2>
        </div>

         
        <div class="table-responsive cart_info col-sm-8">
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
                                    <input class="cart_quantity_input" type="text" name="qty" value="{{$v_content->qty}}" autocomplete="off" size="2"> 
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
</section>
@endsection