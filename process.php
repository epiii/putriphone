<?php
require_once 'koneksi.php';
require_once 'lib.php';

if(!isset($_POST)){
  $out=json_encode(array('status'=>'invalid_request'));
} else {
  if($_POST['mode']=='checkphone'){
    $out=json_encode(array('status'=>'checkphone'));
  } elseif ($_POST['mode']=='update'){
    $s = 'SELECT * FROM pengguna WHERE no_wa NOT LIKE "08%" ';
  	$e = mysqli_query($conn,$s);
    $out=json_encode(['status'=>(!$e?false:true)]);
  	// $out=json_encode(['status'=>'update']);
  }
}
echo $out;
?>
