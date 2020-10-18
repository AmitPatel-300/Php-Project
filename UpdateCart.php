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
<?php require 'config.php'?>
<?php 
if (isset($_POST['update'])) {
    $pname=isset($_POST['pname'])?$_POST['pname']:'';
    $qnt=isset($_POST['QUANTITY'])?$_POST['QUANTITY']:'';
    $total=isset($_POST['total'])?$_POST['total']:'';
    $newtotal=$total*$qnt;

    $sql="UPDATE cartdata SET quantity='".$qnt."' , total='".$newtotal."' WHERE pname='".$pname."'";

      $result=$conn->query($sql);
    if ($result === true) {
            header('location:showcart.php'); 
    } else {
        $errors= array('input' => 'form', 'msg'=> $conn->error);
    }
      $conn->close();
}
?>
