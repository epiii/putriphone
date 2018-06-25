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
    $s = 'SELECT * FROM pengguna order by no_wa DESC ';
  	$e = mysqli_query($conn,$s);
    $arr=[];
    while ($r=mysqli_fetch_assoc($e)) {
      $arr[]=[
        'id'=>$r['id'],
        'username'=>$r['username'],
        'no_wa_old'=>$r['no_wa'],
        'no_wa_new'=>convert_id($r['no_wa'])=='0'?'not Indonesia':convert_id($r['no_wa']),
      ];
    }
    $out=json_encode([
      'status'=>'phonelist',
      'data'=>$arr
    ]);
  } elseif ($_POST['mode']=='phoneupdate'){
    // $s = 'UPDATE '
  }
}
echo $out;
?>
