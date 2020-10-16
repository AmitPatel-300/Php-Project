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
<?php
$pid=$_REQUEST['id'];
$name=$_REQUEST['name'];
$price=$_REQUEST['price'];
$image=$_REQUEST['image'];
$desc=$_REQUEST['desc'];
$tags=$_REQUEST['tags'];
$cid=$_REQUEST['cate'];
$color=$_REQUEST['color'];
$pcolor;
$pcatid;
$ptags;
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
<!-- Page Head -->
<h2>Welcome John</h2>
<p id="page-intro">What would you like to do?</p>

<div class="clear"></div> <!-- End .clear -->

<div class="content-box"><!-- Start Content Box -->

<div class="content-box-header">

<h3>Products</h3>


<div class="clear"></div>

</div> <!-- End .content-box-header -->



</div> <!-- End #tab1 -->


<div class="tab-content" id="tab2">

<form action="updateProducts.php?id=<?php echo $pid;?>" 
method="post" enctype="multipart/form-data">

<fieldset> <!-- Set class to "column-left" 
or "column-right" on fieldsets to divide the form into columns -->
    
      
    <p>
            <label>Name</label>
            <input class="text-input medium-input datepicker" 
            type="text" id="medium-input" value=<?php echo $name ;?> name="pname" /> 
            <br/><small>Add product name</small> 
    </p>

    <p>
        <label>Price</label>
            <input class="text-input small-input" type="text" 
            id="small-input" value=<?php echo $price ;?>   name="price" /> 
            <!-- <span class="input-notification success png_bg">
            Successful message</span> <!-- Classes for input-notification: 
            success, error, information, attention -->
            <br /><small>Add product price</small> 
    </p>

    <p>
        <label>Image</label>
            <input class="text-input small-input" type="file" 
            id="small-input" name="productimage" accept="image/*"  required/>
            <td><img src="<?php echo $image ?>"></td>
            <!-- <span class="input-notification success png_bg">
            Successful message</span> <!-- Classes for input-notification: 
            success, error, information, attention -->
            <br /><small>choose product image</small>
    </p>

    <p>     
             <?php $sql="SELECT * from colors" ?>
            <label>Color</label>
            <?php
            $result=$conn->query($sql);
            $count=$result->num_rows;
            ?>
            <?php
            for ($i=0;$i<$count ;$i++) {
                $rows=$result->fetch_assoc();
                ?> 
                <?php 
                $sql2="SELECT * from products where product_id='".$pid."'";
                $result2=$conn->query($sql2);
                if ($result2->num_rows>0) {
                    while ($row=$result2->fetch_assoc()) {
                        $pcolor=$row['color_id'];
                    }
                }
                ?>        
                 <input type="radio" name="col" required value="<?php echo $rows["color_id"] ;?>">
                <input type="color" value="<?php echo $rows["color_code"] ;?>"></option>
                <?php
            } 
            ?>
    <p>
    
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
                <option 

                    <?php 
                    $sql2="SELECT * from products where product_id='".$pid."'";
                    $result2=$conn->query($sql2);
                    if ($result2->num_rows>0) {
                        while ($row=$result2->fetch_assoc()) {
                            $pcatid=$row['category_id'];
                        }
                    }
                    ?>
                    <?php if($pcatid == $rows["category_id"] ) : echo "selected"?>
                     value="<?php echo $rows["category_id"] ;?>" 
                    <?php endif ;?> ><?php echo $rows['cname'];?></option>
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
            for ($i=0;$i<$count ;$i++) {
                $rows=$result->fetch_assoc();
                ?>
                <?php 
                $sql2="SELECT * from products where product_id='".$pid."'";
                $result2=$conn->query($sql2);
                if ($result2->num_rows>0) {
                    while ($row=$result2->fetch_assoc()) {
                            $ptags=$row['tags'];
                            $b=explode(" ", $ptags);
                    }
                }
                ?>         
            <input type="checkbox" name="tag[]" 
                <?php if(in_array($rows['tag_id'], $b)) : echo "checked"?> 
                 value="<?php echo $rows["tag_id"];?>" 
                <?php endif ;?>>
                <?php echo $rows['tname'];?></option>
                <?php
            } 
            ?>
    <p>
        <label>Description</label>
        <p>
                        <textarea class="text-input textarea wysiwyg" id="textarea" 
                        name="desc" cols="79" rows="15" ><?php echo $name ;?></textarea>
                    </p>
    </p>
    
    <p>
        <input class="button" type="submit" value="Update" name="update"/>
    </p>
    
</fieldset>

<div class="clear"></div><!-- End .clear -->

</form>
<?php require 'footer.php' ;?>
</div> <!-- End #tab2 -->        

</div> <!-- End .content-box-content -->

</div> <!-- End .content-box -->


