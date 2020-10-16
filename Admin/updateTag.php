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
$tid=$_REQUEST['id'];
?>
<?php
if (isset($_POST['uptag'])) {
    $tname=isset($_POST['tname'])?$_POST['tname']:'';
    $sql="UPDATE tags SET tname='".$tname."' WHERE tag_id='".$tid."'";
    $result=$conn->query($sql);
    if ($result === true) {
        header('location:tags.php'); 
    } else {
        $errors= array('input' => 'form', 'msg'=> $conn->error);
    }
    $conn->close();
}
?>