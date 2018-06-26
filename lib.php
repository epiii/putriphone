<?php
  // require 'koneksi.php';
  function phone_format_id($nohp) {
    $nohp = str_replace(" ","",$nohp);
    $nohp = str_replace("(","",$nohp);
    $nohp = str_replace(")","",$nohp);
    $nohp = str_replace(".","",$nohp);

    if(!preg_match('/[^+0-9]/',trim($nohp))){
      if(substr(trim($nohp), 0, 3)=='+62'){ // +62xxxx
        $hp = trim($nohp);
      } elseif(substr(trim($nohp), 0, 1)=='0'){ // 08xxxx
        $hp = '+62'.substr(trim($nohp), 1);
      } else {
        $hp = 0;
      }
    } return $hp;
  }

  function phone_format($no){
    if(!is_numeric($no)){
      return false;
    }else{
      require 'koneksi.php';
      $no = str_replace(" ","",$no);
      $no = str_replace("(","",$no);
      $no = str_replace(")","",$no);
      $no = str_replace(".","",$no);
      // $_1 = substr(trim($no), 0, 1); // 0
      // $_2 = substr(trim($no), 0, 2); // 08
      $_3 = substr(trim($no), 1); // 85xxxx..
  // pr($no);
      $s='SELECT nama FROM parameter WHERE param1="nomor"';
      $e=mysqli_query($conn,$s);
      $res=$no;
      // $arr=[];
      while ($r=mysqli_fetch_assoc($e)) {
        $code=substr($r['nama'],1);
        $pos= strpos($_3,$code);
        if(is_numeric($pos) && $pos==0){ // jika ada di awal posisi
          $res='+'.$_3;
          break;
        }
        // $arr['code'][]=$r['nama'];
        // $arr['pos'][]=strpos($_3,$code);
      }
      // return $arr;
      return $res;
    }
    // var_dump($arr);
  }

  function pr($par){
    echo "<pre>";
      print_r($par);
    echo"</pre>";
    exit();
  }
