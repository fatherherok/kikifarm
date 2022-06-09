<?php

$page_title = 'kikiFarm';
?>
<?php  include ('./inc/header.inc.php'); 




//to check for validity of the user.....................
// if($user_idP != $user_id){
//   header("Location: index.php");
// }
//.......................................................








?>
  


 <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box text-left">
                            <div class="page-title-heading">
                                <h1 class="title">Product Image Search</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index"><i class="ti ti-search"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep ttm-textcolor-white">&nbsp;   →  &nbsp;</span>
                                <span class="ttm-textcolor-skincolor">Product Image Search</span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->
       

   <!--site-main start-->
        <div class="site-main">
        <!-- sidebar -->
        <div class="sidebar ttm-bgcolor-white clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-9 content-area">
                        <div class="row">
                            <div class="col-md-12">
                                

                                
                           
<p style="color: #890912; margin-top: -20px; margin-bottom: 30px;"><b>All Farm products</b></p>

                                
                            </div>

                        </div>

                        <aside class="widget widget-search">
                            
                               
                                    

                                    
 <h5 class="title qucikSearchImage" style=""><img class="img-fluid qucikSearchImage" height="80" width="80" src="images/search/farmsearch.png" > Quick Search Product by Image</h5>


                              
                            
                        </aside>
                        <hr>

<script>
$(document).ready(function(){
 
 $('#find_word').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"ajax/fetch_cat2",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
});
</script>




                        <script>
var limit = 9; //The number of records to display per request
 var start = 0; //The starting pointer of the data
 var action = 'inactive'; //Check if current action is going on or not. If not then inactive otherwise active


 function load_post_data(limit, start)
 {
  $.ajax({
   url:"ajax/load_all_farm",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
    $('#load_data').append(data);
    if(data == 0)
    {
     $('#load_data_message').html('');
     action = 'active';
    }
    else
    {
     $('#load_data_message').html('<div class="process-comm"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>');
     action = 'inactive';
    }
    
   }
  });
 }


if(action == 'inactive')
 {
  action = 'active';
  load_post_data(limit, start);
 }


$(window).scroll(function(){

if($(window).scrollTop() == $(document).height() - $(window).height() || $(window).scrollTop() + $(window).height() > $("#load_data").height()  && action == 'inactive'){
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_post_data(limit, start);
   }, 1000);
                }

 });



// $(window).scroll(function(){
//   if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
//   {
//    action = 'active';
//    start = start + limit;
//    setTimeout(function(){
//     load_post_data(limit, start);
//    }, 1000);
//   }
//  });
</script>

<div class="row" id="load_data"></div>
                         <div id="load_data_message"></div>

                        
                    </div>
                    <div class="col-lg-3 widget-area">
                        
                        <aside class="widget widget-categories">
                                <h3 class="widget-title">Product Categories</h3>
                                <ul>
                                    <li><a href="#">Dairy Farm</a><span>4</span></li>
                                    <li><a href="#">Flower</a><span>2</span></li>
                                    <li><a href="#">Gardening</a><span>1</span></li>
                                    <li><a href="#">Tips &amp; Tricks</a><span>4</span></li>
                                    <li><a href="#">Watering Plants</a><span>2</span></li>
                                </ul>
                            </aside>
                        <aside class="widget widget-top-rated-products">
                            <h3 class="widget-title">Popular Product</h3>
                            <ul class="">
                                <li class="clearfix">
                                    <a href="#"><img src="images/product/product-one.jpg" alt="">
                                        <span class="product-title">Corn Tree</span>
                                    </a>
                                    <div class="ttm-ratting-star"><!-- ratting-star -->
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span class="product-Price-amount amount"><span class="product-Price-currencySymbol">$</span>33.00</span>
                                </li>
                                <li class="clearfix">
                                    <a href="#"><img src="images/product/product-two.jpg" alt="">
                                        <span class="product-title">Fresh Okra</span>
                                    </a>
                                    <div class="ttm-ratting-star"><!-- ratting-star -->
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span class="product-Price-amount amount">
                                        <span class="product-Price-currencySymbol">
                                                <del><span class="product-Price-amount">
                                                        <span class="product-Price-currencySymbol">$</span>50.00
                                                    </span>
                                                </del>
                                                <ins><span class="product-Price-amount">
                                                        <span class="product-Price-currencySymbol">$</span>40.00
                                                    </span>
                                                </ins>
                                            </span>
                                    </span>
                                </li>
                                <li class="clearfix">
                                    <a href="#"><img src="images/product/product-eight.jpg" alt="">
                                        <span class="product-title">Green Broccoli</span>
                                    </a>
                                    <div class="ttm-ratting-star"><!-- ratting-star -->
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span class="product-Price-amount amount"><span class="product-Price-currencySymbol">$</span>33.00</span>
                                </li>
                            </ul>
                        </aside>
                        <aside class="widget tagcloud-widget">
                            <h3 class="widget-title">Tags</h3>
                            <div class="tagcloud">
                                <a href="#" class="tag-cloud-link">Bulbsplant</a>
                                <a href="#" class="tag-cloud-link">Care</a>
                                <a href="#" class="tag-cloud-link">Farm</a>
                                <a href="#" class="tag-cloud-link">Gardening</a>
                                <a href="#" class="tag-cloud-link">Gardens</a>
                                <a href="#" class="tag-cloud-link">Landscaping</a>
                                <a href="#" class="tag-cloud-link">Planting</a>
                                <a href="#" class="tag-cloud-link">Seed Saving</a>
                            </div>
                        </aside>
                    </div>
                </div><!-- row end -->
            </div>
        </div>
        <!-- sidebar end -->
    </div><!--site-main end-->


<?php  include ('./inc/footer.inc.php'); ?>