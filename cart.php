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
$page='page1';
?>
<?php require 'config.php'?>
<?php 
if (isset($_POST['cart'])) {
    $pname=isset($_POST['pname'])?$_POST['pname']:'';
    $price=isset($_POST['price'])?$_POST['price']:'';
    $qnt=isset($_POST['quan'])?$_POST['quan']:'';
    $img=isset($_POST['img'])?$_POST['img']:'';
    $total=($price*$qnt);

    $sql="INSERT INTO cartdata(`pname`, `pprice`, `image`, `quantity`, `total`) 
    VALUES ('".$pname."','".$price."', '".$img."', '".$qnt."', '".$total."')";

      $result=$conn->query($sql);
    if ($result === true) {
            header('location:showcart.php'); 
    } else {
        $errors= array('input' => 'form', 'msg'=> $conn->error);
    }
      $conn->close();
}
?>
