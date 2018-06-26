<?php
require 'koneksi.php';
require 'lib.php';

// var_dump($_POST['mode']);
// exit();
$out=[];
if(!isset($_POST)){
  $out[]=['status'=>'invalid_request'];
  // $out=json_encode(array('status'=>'invalid_request'));
} else {
  if($_POST['mode']=='phonecheck'){
    $no_wa = phone_format($_POST['no_wa']);
    $out=[
      'status'=>'checkphone',
      'data'=>$no_wa
    ];
  } elseif ($_POST['mode']=='phonelist'){
    $s = 'SELECT * FROM pengguna order by no_wa DESC ';
  	$e = mysqli_query($conn,$s);
    $arr=[];
    while ($r=mysqli_fetch_assoc($e)) {
      $arr[]=[
        'id'=>$r['id'],
        'username'=>$r['username'],
        'no_wa_old'=>$r['no_wa'],
        'no_wa_new'=>phone_format($r['no_wa'])=='0'?'not Indonesia':phone_format($r['no_wa']),
      ];
    }
    $out=[
      'status'=>'phonelist',
      'data'=>$arr
    ];
  }
  // elseif ($_POST['mode']=='phoneupdate'){
  //   // $s = 'UPDATE '
  // }
}
echo json_encode($out);
?>
