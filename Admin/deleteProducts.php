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
$tid;
<?php
$tid=$_REQUEST['id'];
?>

<?php
$sql="DELETE FROM products WHERE product_id='".$tid."'";
$result=$conn->query($sql);
if ($result === true) {
    header('location:products.php'); 
} else {
    $errors= array('input' => 'form', 'msg'=> $conn->error);
}
$conn->close();
?>