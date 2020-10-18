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
$PNAME;
$QNT;
?>
<?php require 'config.php'?>
<?php include 'header.php'?>
  <!-- / catg header banner section -->
<?php
if (isset($_REQUEST['qnt'])) {
  $QNT=isset($_POST['$PNAME'])?isset($_POST['$PNAME']):'';
  echo $QNT;
}
?>
 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="Select * from cartdata ";
                        $result=$conn->query($sql);
                    if ($result->num_rows>0) {
                        while ($rows=$result->fetch_assoc()) {
                            $PNAME=$rows['pname'];
                            $PPRICE=$rows['pprice'];
                            $IMAGE=$rows['image'];
                            $QNT=$rows['quantity'];
                            $TOTAL=$rows['total'];

                            ?>
                        <tr>
                        <td><a class="remove" href="deletecart.php?pname=<?php echo $PNAME;?>">
                        <fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img style="width:150px;height:120px"
                         src="<?php echo $IMAGE ?>" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#">
                            <?php echo $PNAME?></a></td>
                        <td>$<?php echo $PPRICE ?></td>
                        <form action="showcart.php" method="POST">
                        <td><input class="aa-cart-quantity" 
                        type="number" min="1" value="<?php  echo $QNT?>" ></td>
                        <td>$<?php echo $TOTAL?></td>
                      </tr>
                            <?php
                        }
                    }
                    ?>
                      
                      
            <!-- <tr>
            <td><a class="remove" href="#"><fa class="fa fa-close"></fa></a></td>
            <td><a href="#"><img src="img/man/polo-shirt-2.png" alt="img"></a></td>
            <td><a class="aa-cart-title" href="#">Polo T-Shirt</a></td>
            <td>$150</td>
            <td><input class="aa-cart-quantity" type="number" value="1"></td>
            <td>$150</td>
            </tr>
            <tr>
            <td><a class="remove" href="#"><fa class="fa fa-close"></fa></a></td>
            <td><a href="#"><img src="img/man/polo-shirt-3.png" alt="img"></a></td>
            <td><a class="aa-cart-title" href="#">Polo T-Shirt</a></td>
            <td>$50</td>
            <td><input class="aa-cart-quantity" type="number" value="1"></td>
            <td>$50</td>
            </tr> -->
            <tr>
            <td colspan="6" class="aa-cart-view-bottom">
                <div class="aa-cart-coupon">
                <input class="aa-coupon-code" type="text" placeholder="Coupon">
                <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                </div>
                <input class="aa-cart-view-btn" type="submit" value="Update Cart" name="qnt">
            </td>
            </tr>
                      </tbody>
                  </table>
                </div>
             </form>
            <?php
             $sql2="SELECT SUM(`total`) AS grandtotal from cartdata";
                $result2=$conn->query($sql2);
                if ($result2->num_rows >0) {
                    while ($rows=$result2->fetch_assoc()) {
                            $grandtotal=$rows['grandtotal'];
                    }
                }
                ?>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td>$<?php echo $grandtotal?></td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td>$<?php echo $grandtotal?></td>
                   </tr>
                 </tbody>
               </table>
               <a href="checkout.php?grandtotal=<?php echo $grandtotal;?>" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur 
            adipisicing elit. Ex, velit!</p>
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

  <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Delivery</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Discount</a></li>
                      <li><a href="#">Special Offer</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#">Search</a></li>
                      <li><a href="#">Advanced Search</a></li>
                      <li><a href="#">Suppliers</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> 25 Astor Pl, NY 10003, USA</p>
                      <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                      <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
   <?php include 'footer.php'?>