<?php
require_once 'koneksi.php';
require_once 'lib.php';

if(!isset($_POST)){
  $out=json_encode(array('status'=>'invalid_request'));
} else {
  if($_POST['mode']=='phonecheck'){
    $no_wa = convert_id($_POST['no_wa']);
    $out=json_encode(array(
      'status'=>'checkphone',
      'data'=>$no_wa
    ));
  } elseif ($_POST['mode']=='phonelist'){
    // $s = 'SELECT * FROM pengguna WHERE no_wa NOT LIKE "08%" ';
    $s = 'SELECT * FROM pengguna WHERE no_wa order by no_wa DESC ';
  	$e = mysqli_query($conn,$s);
    $arr=[];
    while ($r=mysqli_fetch_assoc($e)) {
      $arr[]=[
        'id'=>$r['id'],
        'username'=>$r['username'],
        'no_wa'=>convert_id($r['no_wa']),
      ];
    }
    $out=json_encode([
      'status'=>'phonelist',
      'data'=>$arr
    ]);
    // $out=json_encode(['status'=>(!$e?false:true)]);
  	// $out=json_encode(['status'=>'update']);
  }
}
echo $out;
?>
