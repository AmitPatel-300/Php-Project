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
$cid=$_REQUEST['id'];
$cname=$_REQUEST['name'];
?>
<?php require 'header.php' ; ?>
<?php require 'sidebar.php';?>
<?php require 'config.php' ;?>

<div id="main-content"> <!-- Main Content Section with everything -->

<noscript> <!-- Show a notification if the user has disabled javascript -->
<div class="notification error png_bg">
<div>
Javascript is disabled or is not supported by your browser. Please 
<a href="http://browsehappy.com/" title="Upgrade to a better browser">
upgrade</a> your browser or 
<a href="http://www.google.com/support/bin/answer.py?answer=23852"
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

<h3>Category</h3>


<div class="clear"></div>

</div> <!-- End .content-box-header -->



</div> <!-- End #tab1 -->

<div class="tab-content" id="tab2">

<form action="updateCategory.php?id=<?php echo $cid;?>" method="post">

<fieldset> <!-- Set class to "column-left" 
or "column-right" on fieldsets to divide the form into columns -->

            <p>
                        <label>Name</label>
                        <input class="text-inputmedium-input datepicker" 
                        type="text" id="medium-input" 
                        name="cname" value=<?php echo "'$cname'"?>/> 
                        <br/><small>Update Category</small>
            </p>

    
    <p>
        <input class="button" type="submit" value="Update" name="upcat" />
    </p>
    
    
</fieldset>
<?php require 'footer.php' ;?>

<div class="clear"></div><!-- End .clear -->

</form>

</div> <!-- End #tab2 -->        

</div> <!-- End .content-box-content -->

</div> <!-- End .content-box -->
</div>
