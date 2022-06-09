<?php

$page_title = 'kikiFarm';
?>
<?php  include ('./inc/header.inc.php'); ?>

<!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box text-left">
                            <div class="page-title-heading">
                                <h1 class="title">Latest Nigeria Agro News Feed</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep ttm-textcolor-white">&nbsp;   →  &nbsp;</span>
                                <span class="ttm-textcolor-skincolor">Nigeria Agro News Feed</span>
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


 <div class="mt-25">
    <ul class="ttm-list ttm-list-style-icon">
                                        
                                   
    <?php


$xml = simplexml_load_file("https://www.agropreneurszone.com/feed/");
$url = 'https://www.agropreneurszone.com/feed/';


foreach ($xml->channel->item as $feed_item) {
    $title = $feed_item->title;
    $link = $feed_item->link;
    $description = $feed_item->description;
    $pubDate = $feed_item->pubDate;
    $pubDate = date('D, d M Y',strtotime($pubDate));
    $image = $xml->channel->image->url;
    echo '<li><i class="fa fa-check-circle-o ttm-textcolor-skincolor"></i><span class="ttm-list-li-content"><a class="feed_title" target="_blank" href="'.$link.'" style="font-size:20px;">'.$title.'</a></span></li>'.$pubDate.'<br><br>';
}


$xml = simplexml_load_file("https://sabiagrik.com/feed/");
$url = 'https://sabiagrik.com/feed/';


foreach ($xml->channel->item as $feed_item) {
    $title = $feed_item->title;
    $link = $feed_item->link;
    $description = $feed_item->description;
    $pubDate = $feed_item->pubDate;
    $pubDate = date('D, d M Y',strtotime($pubDate));
    $image = $xml->channel->image->url;
    echo '<li><i class="fa fa-check-circle-o ttm-textcolor-skincolor"></i><span class="ttm-list-li-content"><a class="feed_title" target="_blank" href="'.$link.'" style="font-size:20px;">'.$title.'</a></span></li>'.$pubDate.'<br><br>';
}




$xml = simplexml_load_file("https://agric4profits.com/feed/");
$url = 'https://agric4profits.com/feed/';


foreach ($xml->channel->item as $feed_item) {
    $title = $feed_item->title;
    $link = $feed_item->link;
    $description = $feed_item->description;
    $pubDate = $feed_item->pubDate;
    $pubDate = date('D, d M Y',strtotime($pubDate));
    $image = $xml->channel->image->url;
    echo '<li><i class="fa fa-check-circle-o ttm-textcolor-skincolor"></i><span class="ttm-list-li-content"><a class="feed_title" target="_blank" href="'.$link.'" style="font-size:20px;">'.$title.'</a></span></li>'.$pubDate.'<br><br>';
}


$xml = simplexml_load_file("https://agricincome.com/feed/");
$url = 'https://agricincome.com/feed/';


foreach ($xml->channel->item as $feed_item) {
    $title = $feed_item->title;
    $link = $feed_item->link;
    $description = $feed_item->description;
    $pubDate = $feed_item->pubDate;
    $pubDate = date('D, d M Y',strtotime($pubDate));
    $image = $xml->channel->image->url;
    echo '<li><i class="fa fa-check-circle-o ttm-textcolor-skincolor"></i><span class="ttm-list-li-content"><a class="feed_title" target="_blank" href="'.$link.'" style="font-size:20px;">'.$title.'</a></span></li>'.$pubDate.'<br><br>';
}




?>

 </ul>
                                
</div>


</div>
</div>
</div>
</div>
<?php  include ('./inc/footer.inc.php'); ?>