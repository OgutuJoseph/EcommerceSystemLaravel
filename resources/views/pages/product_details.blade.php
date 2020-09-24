@extends('layout')
@section('content')

<div class="col-sm-9 padding-right">
    <div class="product-details"><!-- product details -->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="{{URL::to($product_by_details->product_image)}}" alt="" /> 
            </div>
        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--Product information -->
                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                <h2>{{$product_by_details->product_color}}</h2>
                <img src="{{URL::to('frontend/images/product-details/rating.png')}}">
                <span>
                    <span>{{$product_by_details->product_price}} KES/-</span>
                    <form action="{{url('/add-to-cart')}}" method="post">
                        {{ csrf_field() }}
                        <label>Quantity:</label>
                        <input name="qty" type="text" value="1" />
                        <input type="hidden" name="product_id" value="{{$product_by_details->product_id}}">
                        <button type="submit" class="btn btn-default cart">
                            <i class="fa fa-shopping-cart"></i>Add To Cart
                        </button>
                    </form>
                </span>
                <p><b>Availability:</b> In Stock</p>
                <p><b>Condition:</b> New</p>
                <p><b>Brand:</b>{{$product_by_details->manufacture_name}}</p>
                <p><b>Category:</b>{{$product_by_details->category_name}}</p>
                <p><b>Size:</b>{{$product_by_details->product_size}}</p>
                <a href=""><img src="{{URL::to('frontend/images/product-details/share.png')}}" class="share img-responsive" /></a>
            </div><!-- /products information -->
        </div>
    </div><!-- /product-details -->

    <div class="category-tab shop-details-tab"><!-- category tab -->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li><a href="#details" data-toggle="tab">Details</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li> 
                <li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="details">
                <p>{{$product_by_details->product_description}}</p>
            </div>
            <div class="tab-pane fade" id="companyprofile">
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$ </h2>
                                <p></p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart">Add to cart</i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade active in" id="reviews">
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 pm</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>31 Dec 2014</a></li>
                    </ul>
                    <p>Lorem ipsum</p>
                    <p><b>Write Your Review</b></p>

                    <form action="#" style="background-color:black; ">
                        <span>
                            <input type="text" placeholder="Your Name" />
                            <input type="text" placeholder="Email Address" />
                        </span>
                        <textarea name=""></textarea>
                        <b>Rating: </b><img src="{{URL::to('frontend/images/product-details/rating.png')}}" alt="" />
                        <button type="button" class="btn btn-default pull-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection