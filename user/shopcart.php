<?php include_once("header.php");?>
<!--.slider_area-->  
<section class="slider_area" style="background-image:url(images/slider/4.jpg);">
    <div class="container">
        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
               <div class="slider">
                    <h2>CART</h2>
                    <p> <a href="index.php">Home <span>/</span> Shop <span>/</span></a> Cart</p>
               </div>
            </div>
		</div>
	</div>
</section> 
<!--/slider_area-->

<!-- cart-page -->
<section class="cart-page cart-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <table class="table cart-table">
                    <thead>
                        <tr>
                            <th class="preview">PRODUCT</th>
                            <th class="quantity">QUANTITY</th>
                            <th class="price">PRICE</th>
                            <th class="total">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="preview">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                <img src="images/resources/product.jpg" height="100px" width="100px">
                                Product #1
                            </td>
                            <td class="quantity">
                                <div class="select-input-wrapper">
                                    <input class="quantity-spinner" type="number" name="quantity" min="1" value="1"> 
						        </div>
                            </td>
                            
                            <td class="price">
                                ₹ 200
                            </td>
                            
                            <td class="total">
                                ₹ 200
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 pull-left cupon-box">
                <input type="text" placeholder="Coupon Code">
                <button type="submit">APPLY COUPON</button>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 pull-right add-to-cart-wrap">
                <a class="contact-button" href="#">
                    <div class="contact-us-button">UPDATE CART</div>
                </a>
            </div>
        </div> 
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-6 pull-right">
                <div class="update-cart pull-right">
                    <div class="update-cart-box">
                        <p>Subtotal<span>₹ 200</span></p>
                        <p class="tolte">Total<span>₹ 200</span></p>
                    </div>
                    <div class="button">PROCEED TO CHECKOUT</div>
                </div>
            </div>
        </div>
    </div>	
</section>
<?php include_once("footer.php");?>