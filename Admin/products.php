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
?>
<?php require 'header.php' ; ?>
<?php require 'sidebar.php';?>
<?php require 'config.php' ;?>

<div id="main-content"> <!-- Main Content Section with everything -->

<noscript> <!-- Show a notification if the user has disabled javascript -->
    <div class="notification error png_bg">
        <div>
            Javascript is disabled or is not supported by your browser. 
            Please <a href="http://browsehappy.com/" 
            title="Upgrade to a better browser">upgrade</a> your browser 
            or <a href="http://www.google.com/support/bin/answer.py?answer=23852" 
            title="Enable Javascript in your browser">enable</a> Javascript 
            to navigate the interface properly.
        </div>
    </div>
</noscript>

<!-- Page Head -->
<h2>Welcome John</h2>
<p id="page-intro">What would you like to do?</p>

<div class="clear"></div> <!-- End .clear -->

<div class="content-box"><!-- Start Content Box -->
    
    <div class="content-box-header">
        
        <h3>Product</h3>
        
        <ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab">Manage</a></li> 
            <!-- href must be unique and match the id of target div -->
            <li><a href="#tab2">Add</a></li>
        </ul>
        
        <div class="clear"></div>
        
    </div> <!-- End .content-box-header -->
    
    <div class="content-box-content">
        
        <div class="tab-content default-tab" id="tab1"> 
        <!-- This is the target div. id must match the href of this div's tab -->
            
            <div class="notification attention png_bg">
                <a href="#" class="close">
                <img src="resources/images/icons/cross_grey_small.png" 
                title="Close this notification" alt="close" /></a>
                <div>
                    This is a Content Box. You can put whatever you want in it. 
                    By the way, you can close this notification with 
                    the top-right cross.
</div>
</div>

<table>

<thead>
    <tr>
        
        <th>id</th>
        <th>name</th>
        <th>price</th>
        <th>Image</th>
        <th>description</th>
        <th>Tags</th>
        <th>category Id</th>
        <th>color</th>
        <th>Action</th>
    </tr>
    
</thead>

<tbody>
    <tr>
    <?php
    $sql="SELECT * FROM products";
    $result=$conn->query($sql);
    if ($result->num_rows>0) {
        while ($rows=$result->fetch_assoc()) {
            $pid = $rows['product_id'];
            $pname = $rows['pname'];
            $price = $rows['price'];
            $image = $rows['image'];
            $desc = $rows['description'];
            $tags = $rows['tags'];
            $cid = $rows['category_id'];
            $color = $rows['color'];
          
           
            echo '<td>'.$pid.'</td>';
            echo '<td>'.$pname.'</td>';
            echo '<td>'.$price.'</td>';
            echo '<td><img src="'.$rows['image'].'"></td>';
            echo '<td>'.$desc.'</td>';
            echo '<td>'.$tags.'</td>';
            echo '<td>'.$cid.'</td>';
            echo '<td><input type="color" value='.$color.' disabled></td>';
            echo '<td>
            <!-- Icons -->
            <a href="editProducts.php?id='.$rows['product_id'].'&name='.$rows['pname'].'&price='.$rows['price'].'&image='.$rows['image'].'&desc='.$rows['description'].'&tags='.$rows['tags'].'&cate='.$rows['category_id'].' " title="Edit">
            <img src="resources/images/icons/pencil.png" alt="Edit" /></a>
            <a href="deleteProducts.php?id='.$rows['product_id'].' " title="Delete">
            <img src="resources/images/icons/cross.png" alt="Delete" /></a> 
          </td></tr>';
        }
    }
    ?>

           
    
</tbody>

</table>

</div> <!-- End #tab1 -->

<div class="tab-content" id="tab2">

<form action="addProduct.php" method="post" enctype="multipart/form-data">

<fieldset> <!-- Set class to "column-left" 
or "column-right" on fieldsets to divide the form into columns -->
    
      
    <p>
            <label>Name</label>
            <input class="text-input medium-input datepicker" 
            type="text" id="medium-input" name="pname" /> 
            <br/><small>Add product name</small> 
    </p>

    <p>
        <label>Price</label>
            <input class="text-input small-input" type="text" 
            id="small-input"  name="price" /> 
            <!-- <span class="input-notification success png_bg">
            Successful message</span> <!-- Classes for input-notification: 
            success, error, information, attention -->
            <br /><small>Add product price</small> 
    </p>

    <p>
        <label>Image</label>
            <input class="text-input small-input" type="file" 
            id="small-input"  name="productimage" accept="image/*" /> 
            <!-- <span class="input-notification success png_bg">
            Successful message</span> <!-- Classes for input-notification: 
            success, error, information, attention -->
            <br /><small>choose product image</small>
    </p>

    <p>
        <label>Color</label>
            <input  type="color" 
            id="clr"  name="colour"  /> 
            <br /><small>Add product color</small> 
    </p>
    
    <p>
            <?php $sql="SELECT * from categories" ?>
            <label>Category</label>
            <select name="catid" class="small-input">     
            <?php
            $result=$conn->query($sql);
            $count=$result->num_rows;
            ?>
            <?php
            for ($i=0;$i<=$count ;$i++) {
                $rows=$result->fetch_assoc();
                ?>         
                <option value="<?php echo $rows["category_id"] ;?>"><?php echo 
                $rows['cname'];?></option>
                <?php
            } 
            ?>
            </select> 
    <p>     
             <?php $sql="SELECT * from tags" ?>
            <label>Tags</label>
            <?php
            $result=$conn->query($sql);
            $count=$result->num_rows;
            ?>
            <?php
            for ($i=0;$i<=$count ;$i++) {
                $rows=$result->fetch_assoc();
                ?>         
        <input type="checkbox" name="tag[]" value="<?php echo $rows["tag_id"] ;?>">
                <?php echo $rows['tname'];?></option>
                <?php
            } 
            ?>
    <p>
        <label>Description</label>
        <p>
                        <textarea class="text-input textarea wysiwyg" id="textarea" 
                        name="desc" cols="79" rows="15"></textarea>
                    </p>
    </p>
    
    <p>
        <input class="button" type="submit" value="Add" name="add"/>
    </p>
    
</fieldset>

<div class="clear"></div><!-- End .clear -->

</form>

</div> <!-- End #tab2 -->        

</div> <!-- End .content-box-content -->

</div> <!-- End .content-box -->

<?php require 'footer.php' ;?>
