<?php

$page_title = 'kikiFarm';
?>
<?php  include ('./inc/header.inc.php'); 


?>








<?php
 



$type = 1;

//for pagination of the  list on the homepage
$get = mysqli_query($con,"SELECT * FROM products WHERE type='$type' ORDER BY date_available DESC ") or die (mysqli_error());

$total = mysqli_num_rows($get);

$limit =(isset($_GET['limit'])) ? (int)$_GET['limit'] : 8;
$page =(isset($_GET['page'])) ? (int)$_GET['page'] : 1;
(int)$link = 2;
$row_start = (($page - 1) * $limit);
(int)$limit = 100;
//$page = 1;

$last = ceil($total / $limit);

$start = (($page - $link) > 0) ? $page - $link : 1;
$end = (($page + $link) < $last) ? $page + $link : $last;       
        
$getproduct = mysqli_query($con,"SELECT * FROM products WHERE type='$type' ORDER BY date_available DESC LIMIT $row_start, $limit  ") or die (mysqli_error()); 

?>


 <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box text-left">
                            <div class="page-title-heading">
                                <h1 class="title">Food Rescue Save Stores</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep ttm-textcolor-white">&nbsp;   →  &nbsp;</span>
                                <span class="ttm-textcolor-skincolor">Food Rescue Save Stores</span>
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

<?php $i = 1; while($rowbasket = mysqli_fetch_array($getproduct)) : ?>

    <?php 
                    $owner =   $rowbasket['user_id'];
                    $product_id = $rowbasket['product_id'];
                    $prod_name = $rowbasket['name'];
                    $prod_price = $rowbasket['price'];
                    $prod_measure = $rowbasket['measure'];
                    $date_available = $rowbasket['date_available'];
                    $type = $rowbasket['type'];
                    $date_available = $rowbasket['date_available'];



$query_profile = mysqli_query($con,"SELECT * FROM users WHERE user_id='$owner' ");
    $result = mysqli_fetch_assoc($query_profile);
    $pixd = $result['pix']; 

    $sname = $result['sname']; 
$oname = $result['oname']; 
$owner = $result['username'];
    $shop_name = $result["shop_name"]; 

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




$food_rescue_days = 604800*2;





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

    <?php if($negative_days <= $food_rescue_days) : ?>

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
                                                <a href="<?php echo $owner; ?>"><?php echo $shop_name; ?></a>
                                            </td>


                                            

                                             <td class="product-name" data-title="">


                                            <?php if(isset($username)) : ?><!-- to check it user logged in -->                  
                                               
                                                 <a href="#" class="button ttm-btn ttm-btn-bgcolor-darkgrey" >Order</a>


                                            <?php else : ?><!-- to check it user logged in -->

                                                <a href="javascript:;" id="notl<?php echo $product_id; ?>"  class="button ttm-btn ttm-btn-bgcolor-darkgrey notLoggedIn" style="padding: 10px;">Order</a>
                                                                                                

                                                <?php endif; ?><!-- to check it user logged in -->



                                            </td>
                                           
                                        </tr>
        
            <?php endif; ?> 


<?php $i++; endwhile; ?> 

 








                                    </tbody>
                                </table>
                            </form><!-- ttm-cart-form end -->
                            
                        </div>
                    </div><!-- row end -->
                </div>
            </div>
            <!-- sidebar end -->

        </div><!--site-main end-->

<?php  include ('./inc/footer.inc.php'); ?>