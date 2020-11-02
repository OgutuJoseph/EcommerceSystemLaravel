<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    
                
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-4">
                                <h1>E-Commerce</h1>
                                <p>Welcome to the online shopping store offering you a variety in products at very affordable prices!</p> 
                            </div>
                            <div class="col-sm-8">
                                <img src="{{ URL::to('frontend/images/Slider/ecommerce.jpeg') }}" class="girl img-responsive" alt="" style="height: 300px; width: 400px;" /> 
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-4">
                                <h1>E-Commerce</h1>
                                <p>Welcome to the online shopping store offering you a variety in products at very affordable prices!</p> 
                            </div>
                            <div class="col-sm-8">
                                <img src="{{ URL::to('frontend/images/Slider/happyshop.jpeg') }}" class="girl img-responsive" alt="" style="height: 300px; width: 400px;" />
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="col-sm-4">
                                <h1>E-Commerce</h1>
                                <p>Welcome to the online shopping store offering you a variety in products at very affordable prices!</p> 
                            </div>
                            <div class="col-sm-8">
                                <img src="{{ URL::to('frontend/images/Slider/shopstore.png') }}" class="girl img-responsive" alt="" style="height: 300px; width: 400px;" />
                            </div>
                        </div>
							
					</div>
                    
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</section><!--/slider-->