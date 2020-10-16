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

<h3>Tags</h3>

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
        <th>Tag_Id</th>
        <th>Tag_name</th>
        <th>Action</th>
    </tr>
    
</thead>

<tbody>
    <tr>
    <?php
    $sql="SELECT * FROM tags";
    $result=$conn->query($sql);
    if ($result->num_rows>0) {
        while ($rows=$result->fetch_assoc()) {
            $tid = $rows['tag_id'];
            $tname = $rows['tname'];

            echo '<td>'.$tid.'</td>';
            echo '<td>'.$tname.'</td>';
           
            echo '<td>
            <!-- Icons -->
            <a href="editTag.php?id='.$rows['tag_id'].'&name='.$rows['tname'].'" 
             title="Edit">
            <img src="resources/images/icons/pencil.png" alt="Edit" /></a>
            <a href="deleteTag.php?id='.$rows['tag_id'].'" title="Delete">
            <img src="resources/images/icons/cross.png" alt="Delete" /></a> 
          </td></tr>';
        }
    }
    ?>
</tbody>

</table>

</div> <!-- End #tab1 -->

<div class="tab-content" id="tab2">

<form action="addTag.php" method="post">

<fieldset> <!-- Set class to "column-left" 
or "column-right" on fieldsets to divide the form into columns -->

    <p>
            <label>Name</label>
            <input class="text-input medium-input datepicker" 
            type="text" id="medium-input" name="tname" /> 
            <br/><small>Add Tag</small> 
    </p>

    
    <p>
        <input class="button" type="submit" value="submit" name="tag" />
    </p>
    
</fieldset>

<div class="clear"></div><!-- End .clear -->

</form>

</div> <!-- End #tab2 -->        

</div> <!-- End .content-box-content -->

</div> <!-- End .content-box -->
<?php require 'footer.php' ;?>
