<?php

$page_title = 'kikiFarm';
?>
<?php  include ('./inc/header.inc.php'); 


?>








<?php
 


  $query_basket = mysqli_query($con,"SELECT *
                                            FROM `basket`
                                            LEFT JOIN `products`
                                            ON `basket`.`product_id` = `products`.`product_id`
                                            WHERE `basket`.`added_by` = '$user_id' AND `basket`.`done` = 'no' ORDER BY `basket`.`id` DESC  "); 

 
$counter = mysqli_num_rows($query_basket);

?>


 <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box text-left">
                            <div class="page-title-heading">
                                <h1 class="title">Added Basket Products (<?php echo $counter;  ?>)</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep ttm-textcolor-white">&nbsp;   →  &nbsp;</span>
                                <span class="ttm-textcolor-skincolor">Added Basket Products</span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->



         <!--site-main start-->
        <div class="site-main">

            <!-- sidebar -->
            <div class="ttm-row only-one-section ttm-bgcolor-white clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row">





<aside class="widget widget-categories">
             <h3 class="widget-title" style="color: #e61b1b; font-family: tahoma;">To check your food tracker only, click

                 <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-square ttm-icon-btn-right ttm-btn-bgcolor-skincolor" href="basket-products2" title=""> FOOD TRACKER BASKET <i class="fa fa-shopping-cart"></i></a>
             </h3>
         </aside>



                        <div class="col-lg-12">
                            <!-- ttm-cart-form -->
                            <form class="ttm-cart-form" action="#" method="post">
                                <table class="shop_table shop_table_responsive">
                                    <thead>
                                        <tr style="color:#173e43">
                                            <th class="product-remove">&nbsp;</th>
                                           
                                            <th class="product-thumbnail">Product</th>
                                            <th class="product-mainprice">Price</th>
                                            <th class="product-name">Measurement</th>
                                            <th class="product-name">Availability</th>
                                            <th class="product-thumbnail">Farmer</th>
                                            <th class="product-subtotal">Shop name</th>
                                            <th class="product-remove">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php $i = 1; while($rowbasket = mysqli_fetch_array($query_basket)) : ?>

    <?php 
                    $ownerID =   $rowbasket['user_id'];
                    $product_id = $rowbasket['product_id'];
                    $prod_name = $rowbasket['name'];
                    $prod_price = $rowbasket['price'];
                    $prod_measure = $rowbasket['measure'];
                    $date_available = $rowbasket['date_available'];
                    $type = $rowbasket['type'];
                    $date_available = $rowbasket['date_available'];



$query_profile = mysqli_query($con,"SELECT * FROM users WHERE user_id='$ownerID' ");
    $result = mysqli_fetch_assoc($query_profile);
    $pixd = $result['pix']; 

    $sname = $result['sname']; 
$oname = $result['oname']; 
$owner = $result['username'];
$owner_id = $result['user_id'];
    $shop_name = $result["shop_name"]; 

$state_product = $result["state_name"]; 
$state_id_product = $result["state_id"]; 


    if($pixd==''){
    $profilepixd = "images/avatar.png";
    }
    else{
    $profilepixd = "uploads/thumbs/$pixd";
      }




        
                            $pix1 = $rowbasket['pix1'];

//date availaibe notification starts here............................
                            $current_date = date('y-m-d');  

$available_day = date("jS F, Y", strtotime($date_available));


$notifation_days =  abs(strtotime($date_available) - strtotime($current_date));



$negative_days = strtotime($date_available) - strtotime($current_date);




if($negative_days < 1){
    $neg_days = '-';
}else{
    $neg_days = '+';
}


                    
                $suffix = '';
                switch(1)
                    {
                        case($notifation_days < 60):
                        $count = $notifation_days;
                        if($count===0)
                            $count = 'a moment';
                        else if($count==1)
                            $suffix = 'second';
                        else
                            $suffix  = 'seconds';
                        break;  
                        
                        case($notifation_days >= 60 && $notifation_days < 3600):
                        $count = floor($notifation_days/60) ;
                         if($count==1)
                            $suffix = 'minute';
                        else
                            $suffix  = 'minutes';
                        break;  
                        
                        case($notifation_days >= 3600 && $notifation_days < 86400):
                        $count = floor($notifation_days/3600) ;
                         if($count==1)
                            $suffix = 'hour';
                        else
                            $suffix  = 'hours';
                        break;
                        
                        case($notifation_days >= 86400 && $notifation_days < 604800):
                        $count = floor($notifation_days/86400) ;

                         if($count==1)
                            $suffix = 'day';
                        else
                            $suffix  = 'days';
                        break;

                        case($notifation_days >= 604800 && $notifation_days < 2629743):
                        $count = floor($notifation_days/604800) ;


if($count==1){
 $dy =  floor(($notifation_days-604800)/86400);   
}else if($count==2){
$dy =  floor(($notifation_days-(604800*2))/86400);
}
else if($count==3){
$dy =  floor(($notifation_days-(604800*3))/86400);
}
else if($count==4){
$dy =  floor(($notifation_days-(604800*4))/86400);
}


                         if($count==1)
                            $suffix = 'week '.$dy.' days';
                        else
                            $suffix  = 'weeks '.$dy.' days';
                        break;
                        
                        case($notifation_days >= 2629743 && $notifation_days < 31556926):
                        $count = floor($notifation_days/2629743) ;


if($count==1){
 $dy =  floor(($notifation_days-2629743)/86400);   
}else if($count==2){
$dy =  floor(($notifation_days-(2629743*2))/86400);
}
else if($count==3){
$dy =  floor(($notifation_days-(2629743*3))/86400);
}
else if($count==4){
$dy =  floor(($notifation_days-(2629743*4))/86400);
}
else if($count==5){
$dy =  floor(($notifation_days-(2629743*5))/86400);
}

else if($count==6){
$dy =  floor(($notifation_days-(2629743*6))/86400);
}

else if($count==7){
$dy =  floor(($notifation_days-(2629743*7))/86400);
}

else if($count==8){
$dy =  floor(($notifation_days-(2629743*8))/86400);
}

else if($count==9){
$dy =  floor(($notifation_days-(2629743*9))/86400);
}

else if($count==10){
$dy =  floor(($notifation_days-(2629743*10))/86400);
}
else if($count==11){
$dy =  floor(($notifation_days-(2629743*11))/86400);
}

else if($count==12){
$dy =  floor(($notifation_days-(2629743*12))/86400);
}




                         if($count==1)
                            $suffix = 'month '.$dy.' days';
                        else
                            $suffix  = 'months '.$dy.' days';
                        break;
                        
                        case($notifation_days >= 31556926):
                        $count = floor($notifation_days/31556926) ;
                         if($count==1)
                            $suffix = 'year';
                        else
                            $suffix  = 'years';
                        break;
                    }
//date availaibe notification ends here............................
                            



    ?>

                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a href="#" class="remove"><?php echo $i; ?></a>
                                            </td>
                                           
                                            <td class="product-thumbnail" data-title="Product">
                                                <a href="<?php echo $owner; ?>"><?php echo ucfirst($prod_name); ?>
                                                    
                                                    <img class="img-fluid" src="<?php echo 'uploads_product/thumbs/'.$pix1; ?>" alt="" style="float: left; margin-right: 5px; margin-left: 5px;">
                                                    
                                                </a>
                                            </td>
                                            <td class="product-name" data-title="Price" style="color: #7cda0a;">
                                                <a href="<?php echo $owner; ?>" style="color: #173e43;"><del class="product-Price-currencySymbol">N</del> <?php echo number_format($prod_price); ?></a>
                                            </td>
                                             <td class="product-name" data-title="Measurement">
                                                <a href="<?php echo $owner; ?>">1 <?php echo $prod_measure; ?></a>
                                            </td>

                                            <?php if($type == 1) : ?>
                                             <td class="product-name" data-title="Time Available">

                                             <a style="color: #e61b1b" href="<?php echo $owner; ?>"><?php echo $neg_days ?><?php echo  $count.' '.$suffix; ?></a>
                                            </td>
                                            <?php else: ?>
                                            <td class="product-name" data-title="" style="color: #7cda0a;">
                                            </td>
                                            <?php endif; ?>


                                             <td class="product-thumbnail" data-title="Farmer">
                                                <a href="<?php echo $owner; ?>">
                                                    <b><?php echo ucfirst($owner); ?></b>
                                                    <img class="img-fluid" src="<?php echo $profilepixd; ?>" alt="" style="float: left; margin-right: 5px; margin-left: 5px;">

                                                </a>
                                            </td>
                                           
                                            <td class="product-name" data-title="Shop Name" style="color: #7cda0a;">
                                                <a href="<?php echo $owner; ?>"><?php echo $shop_name; ?></a><br>

                                                 <i class="fa fa-map-marker" style="color: #e61b1b"></i> 
                                            <span><?php echo $state_product; ?> State</span>
                                            </td>


                                            

                                             <td class="product-name" data-title="" style="padding:0px">
                                               
                                                 <a href="product-page?product-id=<?php echo $product_id; ?>" class="button ttm-btn-size-sm ttm-btn ttm-btn-bgcolor-darkgrey" >View</a>

                                                 <a href="order-states?state_id=<?php echo $state_id_product; ?>&product_id=<?php echo $product_id; ?> " class="button ttm-btn-size-sm ttm-btn ttm-btn-bgcolor-skincolor">Order</a>
                                            </td>
                                           
                                        </tr>
                                       
<?php $i++; endwhile; ?> 

 








                                    </tbody>
                                </table>
                            </form><!-- ttm-cart-form end -->


                             <!-- cart-collaterals -->
                          <!--   <div class="cart-collaterals">
                                <div class="cart_totals ">
                                    <h2>Cart totals</h2>
                                    <table class="shop_table shop_table_responsive">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td data-title="Subtotal">
                                                    <span class="Price-amount">
                                                        <span class="Price-currencySymbol">$</span>128.00
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td data-title="Total">
                                                    <strong><span class="Price-amount">
                                                        <span class="Price-currencySymbol">$</span>128.00</span>
                                                    </strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="proceed-to-checkout">
                                        <a href="checkout.html" class="button ttm-btn ttm-btn-bgcolor-darkgrey checkout-button">Proceed to checkout</a>
                                    </div>
                                </div>
                            </div> -->
                            <!-- cart-collaterals end-->




                            
                        </div>
                    </div><!-- row end -->
                </div>
            </div>
            <!-- sidebar end -->

        </div><!--site-main end-->

<?php  include ('./inc/footer.inc.php'); ?>