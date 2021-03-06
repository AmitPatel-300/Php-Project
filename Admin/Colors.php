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
?>

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

<h3>Color</h3>

<ul class="content-box-tabs">
<li><a href="#tab1" class="default-tab">Manage</a>
</li> <!-- href must be unique and match the id of target div -->
<li><a href="#tab2">Add</a></li>
</ul>

<div class="clear"></div>

</div> <!-- End .content-box-header -->

<div class="content-box-content">

<div class="tab-content default-tab" id="tab1"> 
<!-- This is the target div. id must match the href of this div's tab -->

<div class="notification attention png_bg">
<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" 
title="Close this notification" alt="close" /></a>
<div>
    This is a Content Box. You can put whatever you want in it. By the way,
     you can close this notification with the top-right cross.
</div>
</div>

<table>

<thead>
    <tr>
        <th>Color_id</th>
        <th>Color_code</th>
        <th>Action</th>
    </tr>
    
</thead>

<tbody>
    <tr>
    <?php
    $sql="SELECT * FROM colors";
    $result=$conn->query($sql);
    if ($result->num_rows>0) {
        while ($rows=$result->fetch_assoc()) {
            $colorid = $rows['color_id'];
            $colorcode = $rows['color_code'];
            
            echo '<td>'.$colorid.'</td>';
            echo '<td>'.$colorcode.'</td>';
            
            echo '<td>
            <!-- Icons -->
            <a href="editColors.php?id='.$rows['color_id'].'&code='.$rows['color_code'].' " title="Edit">
            <img src="resources/images/icons/pencil.png" alt="Edit" /></a>
            <a href="deleteColors.php?id='.$rows['color_id'].'" title="Delete">
            <img src="resources/images/icons/cross.png" alt="Delete" /></a> 
          </td></tr>';

        }
    }
    ?>

           
   
</tbody>

</table>

</div> <!-- End #tab1 -->

<div class="tab-content" id="tab2">

<form action="addColor.php" method="post">

<fieldset> <!-- Set class to "column-left" 
or "column-right" on fieldsets to divide the form into columns -->

    <p>
            <label>Color</label>
            <input type="color" id="medium-input" name="colour"
            style="border:none;width:40px;height:30px;" /> 
            <br/><small>Add color</small> 
    </p>

    
    <p>
        <input class="button" type="submit" value="Add" name="col" />
    </p>
    
</fieldset>

<div class="clear"></div><!-- End .clear -->

</form>

</div> <!-- End #tab2 -->        

</div> <!-- End .content-box-content -->

</div> <!-- End .content-box -->
<?php require 'footer.php' ;?>
