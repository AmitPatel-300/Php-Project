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
$cid=$_REQUEST['id'];
?>
<?php
if (isset($_POST['upcat'])) {
    $cname=isset($_POST['cname'])?$_POST['cname']:'';
    $sql="UPDATE categories SET cname='".$cname."' WHERE category_id='".$cid."'";
    $result=$conn->query($sql);
    if ($result === true) {
        header('location:categories.php'); 
    } else {
        $errors= array('input' => 'form', 'msg'=> $conn->error);
    }
    $conn->close();
}
?>