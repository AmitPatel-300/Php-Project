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
if (isset($_POST['cate'])) {
    $cname=isset($_POST['cname'])?$_POST['cname']:'';
    $sql="INSERT INTO categories(`cname`) VALUES ('".$cname."')";
    $result=$conn->query($sql);
    if ($result === true) {
        header('location:categories.php'); 
    } else {
        $errors= array('input' => 'form', 'msg'=> $conn->error);
    }
    $conn->close();
}