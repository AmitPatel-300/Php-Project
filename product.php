<?php include 'header.php'?>
<?php 
/**
 * Template File Doc Comment
 *
 *  PHP version 7
 * 
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/licenses/MIT MIT license
 * @link     http://localhost/
 */

$page='page1';
?>

  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Fashion</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>         
          <li class="active">Women</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="">
                    <option value="1" selected="Default">Default</option>
                    <option value="2">Name</option>
                    <option value="3">Price</option>
                    <option value="4">Date</option>
                  </select>
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="">
                    <option value="1" selected="12">12</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                  </select>
                </form>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>

            <div class="aa-product-catg-body">
<?php require 'config.php' ?>
  <?php 

    if (isset($_GET['page1']))
    {
      $page='page1';
    } else 
    if (isset($_GET['page2'])) {
      $page='page2';
    }
    else 
    if (isset($_GET['page3'])) {
      $page='page3';
    }
    else 
    if (isset($_GET['page4'])) {
        $page='page4';
    }
    else 
    if (isset($_GET['page5'])) {
        $page='page5';
    }

  
    if($page=='page1') {
        $sql="Select * from products LIMIT 10 OFFSET 0";
    }else
    if($page == 'page2')
    {
        $sql="Select * from products LIMIT 10 OFFSET 10";
    }
    else
    if($page == 'page3')
    {
        $sql="Select * from products LIMIT 10 OFFSET 20";
    }
    else
    if($page == 'page4')
    {
        $sql="Select * from products LIMIT 10 OFFSET 30";
    } else
    if($page == 'page5') {
        $sql="Select * from products LIMIT 10 OFFSET 40";
    }

    if (isset($_REQUEST['catid'])) {
        $cid=$_REQUEST['catid'];
         $sql="SELECT * from products WHERE category_id='".$cid."'";
    }

    if (isset($_REQUEST['tagid'])) {
        $tagid=$_REQUEST['tagid'];
        $sql="SELECT * from products where `tags`='".$tagid."'";
    }

    if (isset($_REQUEST['colorid'])) {
        $colorid=$_REQUEST['colorid'];
        $sql="SELECT * from products where `color_id`='".$colorid."'";
    }

    $result=$conn->query($sql);
    if ($result->num_rows>0) {
        while ($rows=$result->fetch_assoc()) {
             $img=$rows['image'];
             $price=$rows['price'];
             $name=$rows['pname'];  
             $desc=$rows['description'];
             $pid=$rows['product_id'];   
            ?>  
          
              <ul class="aa-product-catg">
                <!-- start single product item -->
                <li>
                  
                  <figure>
                  <a class="aa-product-img"
                   href="product-detail.php?pid=<?php echo $pid;?>">
                  <img style="width:250px;height:260px" 
                    src="<?php echo $img ?>" 
                    alt="polo shirt img"></a>
                    <a class="aa-add-card-btn" 
                    href="product-detail.php?pid=<?php echo $pid;?>">
                    <span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href=""><?php echo $name?>
                      </a></h4>
                      <span class="aa-product-price"><?php echo "$".$price.".00" ?>
                      </span>
                      <span class="aa-product-price"><del>$65.50</del></span>
                      <p class="aa-product-descrip">Lorem ipsum dolor sit amet,
                       consectetur adipisicing elit. Numquam accusamus facere iusto,
                        autem soluta amet sapiente ratione inventore nesciunt a,
                         maxime quasi consectetur, rerum illum.</p>
                    </figcaption>
                  </figure>
                                        
                  <div class="aa-product-hvr-content">
                    <a href="#"  data-toggle2="tooltip" data-placement="top" 
                    title="Quick View" data-toggle="modal"
                     data-target="#quick-view-modal">
                <span class="fa fa-search"></span></a>                            
                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>
              </ul>
     
              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal"  tabindex="-1"
               role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" 
                    aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
      <div class="col-md-6 col-sm-6 col-xs-12">                              
        <div class="aa-product-view-slider">                                
          <div class="simpleLens-gallery-container" id="demo-1">
            <div class="simpleLens-container">
                <div class="simpleLens-big-image-container">
                    <a class="simpleLens-lens-image" 
                    data-lens-image="img/view-slider/large/polo-shirt-1.png">
                      <img src="img/view-slider/medium/polo-shirt-1.png"
                         class="simpleLens-big-image">
                    </a>
                </div>
            </div>
            <div class="simpleLens-thumbnails-container">
                <a href="#" class="simpleLens-thumbnail-wrapper"
                    data-lens-image="img/view-slider/large/polo-shirt-1.png"
                    data-big-image="img/view-slider/medium/polo-shirt-1.png">
                    <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                </a>                                    
                <a href="#" class="simpleLens-thumbnail-wrapper"
                    data-lens-image="img/view-slider/large/polo-shirt-3.png"
                    data-big-image="img/view-slider/medium/polo-shirt-3.png">
                    <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                </a>

                <a href="#" class="simpleLens-thumbnail-wrapper"
                    data-lens-image="img/view-slider/large/polo-shirt-4.png"
                    data-big-image="img/view-slider/medium/polo-shirt-4.png">
                    <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3><?php echo $name?></h3>
                            <div class="aa-price-block">
                            <span class="aa-product-view-price"><?php echo $price ?>
                              </span>
                          <p class="aa-product-avilability">
                          Avilability: <span>In stock</span></p>
                      </div>
                      <p><?php echo $desc ?></p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <!-- <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a> -->
                            </div>
                            <div class="aa-prod-quantity">
                              <form action="">
                                <select name="" id="">
                                  <option value="0" selected="1">1</option>
                                  <option value="1">2</option>
                                  <option value="2">3</option>
                                  <option value="3">4</option>
                                  <option value="4">5</option>
                                  <option value="5">6</option>
                                </select>
                              </form>
                              <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn">
                              <span class="fa fa-shopping-cart">
                              </span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <?php
        }

    }
    ?> 
              <!-- / quick view modal -->   
            </div>
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="product.php?page1">1</a></li>
                  <li><a href="product.php?page2">2</a></li>
                  <li><a href="product.php?page3">3</a></li>
                  <li><a href="product.php?page4">4</a></li>
                  <li><a href="product.php?page5">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>

      
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
        <?php
        $sql="Select * from categories";
        $result=$conn->query($sql);
        if ($result->num_rows>0) {
            while ($rows=$result->fetch_assoc()) {
                $cat=$rows['cname']; 
                ?>  
                <li><a href="product.php?catid=<?php echo $rows['category_id'];?>" >
                <?php echo $cat?></a></li>
                <!-- <li><a href="">Women</a></li>
                <li><a href="">Kids</a></li>
                <li><a href="">Electornics</a></li>
                <li><a href="">Sports</a></li> -->
                <?php
            }
        }
        ?>
              </ul>
            </div>
      
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Tags</h3>
              <div class="tag-cloud">
            <?php
            $sql="Select * from tags ";
            $result=$conn->query($sql);
            if ($result->num_rows>0) {
                while ($rows=$result->fetch_assoc()) {
                    $tag=$rows['tname']; 
                    ?>  
                <a href="product.php?tagid=<?php echo $rows['tag_id'];?>"><?php echo $tag?></a>

                    <?php
                }
            }
            ?>
              </div>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>              
              <!-- price range -->
              <div class="aa-sidebar-price-range">
              <?php
                  $sql3="SELECT Max(`price`) AS max, Min(`price`) As min from products";
                  $result3=$conn->query($sql3);
                if ($result3->num_rows >0) {
                    while ($rows=$result3->fetch_assoc()) {
                            $max=$rows['max'];
                            $min=$rows['min']; 
                        ?>
               <form action="">
                  <div id="skipstep" class="noUi-target noUi-ltr 
                  noUi-horizontal noUi-background">
                  </div>
                  <span ><?php echo  $min ?>.00</span>
                 <span ><?php echo $max ?>.00</span>
                 <button class="aa-filter-btn" type="submit">Filter</button>
               </form>
                        <?php
                    }
                }
                ?>
              </div>              

            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
            
              <h3>Shop By Color</h3>
              <div class="aa-color-tag">
                        <?php
                        $sql="Select * from colors ";
                        $result=$conn->query($sql);
                        if ($result->num_rows>0) {
                            while ($rows=$result->fetch_assoc()) {
                                $colorcode=$rows['color_code']; 
                                ?>

                <div style="float:left;">
                <a  href="product.php?colorid=<?php echo $rows['color_id'];?>">
                <input type="color" value="<?php echo $colorcode ;?>" 
                style="border:none;width:40px;height:30px;margin-left:10px"
                disabled></a></div>
                <!-- <a class="aa-color-yellow" href="#"></a>
                <a class="aa-color-pink" href="#"></a>
                <a class="aa-color-purple" href="#"></a>
                <a class="aa-color-blue" href="#"></a>
                <a class="aa-color-orange" href="#"></a>
                <a class="aa-color-gray" href="#"></a>
                <a class="aa-color-black" href="#"></a>
                <a class="aa-color-white" href="#"></a>
                <a class="aa-color-cyan" href="#"></a>
                <a class="aa-color-olive" href="#"></a>
                <a class="aa-color-orchid" href="#"></a> -->
                                    <?php
                            } 
                        } 
                        ?>
               </div>                            
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Recently Views</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img">
                    <img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img">
                    <img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img">
                    <img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Top Rated Products</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img">
                    <img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img">
                    <img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img">
                    <img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div>
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->


  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
             Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->
<?php include 'footer.php'?>