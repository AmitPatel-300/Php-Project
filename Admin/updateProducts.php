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
<?php require 'config.php' ;?>
<?php
$pid=$_REQUEST['id'];
?>
<?php

if (isset($_POST['update'])) {
    $pname = isset($_POST['pname'])?$_POST['pname']:'';
    $price = isset($_POST['price'])?$_POST['price']:'';
    // $image = time().'_'. $_FILES['productimage']['name'];
    // $target = 'images/'.$image;

    // move_uploaded_file($_FILES['productimage']['name'], $target);
    $image = $_FILES["productimage"]["name"];
    $tempname = $_FILES["productimage"]["tmp_name"];
    $desc = isset($_POST['desc'])?$_POST['desc']:'';
    $cid = isset($_POST['catid'])?$_POST['catid']:'';
    $tag = implode(' ', $_POST['tag']);
    $color=isset($_POST['col'])?$_POST['col']:'';
    echo $color;

    $folder = "images/".$image;
    if (move_uploaded_file($tempname, $folder)) {
        $errors=array('input'=> 'form' , 'msg'=>'image added successfully');
    } else {
        $errors=array('input'=> 'form' , 'msg'=>'image added failed');
        
    } 
    
    $sql="UPDATE products SET pname='".$pname."', price='".$price."',
    `image`='".$folder."', `description`='".$desc."', category_id='".$cid."',
     tags='".$tag."', `color_id`='".$color."' WHERE product_id='".$pid."'";
     $result=$conn->query($sql);
    if ($result === true) {
        header('location:products.php'); 
    } else {
        $errors= array('input' => 'form', 'msg'=> $conn->error);
    }
    $conn->close();
}
?>