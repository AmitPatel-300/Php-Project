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
$PNAME=$_REQUEST['pname'];
echo $PNAME;
?>

<?php     
$sql="DELETE FROM cartdata WHERE `pname`='".$PNAME."' ";
$result=$conn->query($sql);
if ($result === true) {
       header('location:showcart.php');
     
} else {
    $errors= array('input' => 'form', 'msg'=> $conn->error);
}
$conn->close();
?>