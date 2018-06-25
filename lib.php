<?php
  function convert_id($nohp) {
    $nohp = str_replace(" ","",$nohp);
    $nohp = str_replace("(","",$nohp);
    $nohp = str_replace(")","",$nohp);
    $nohp = str_replace(".","",$nohp);

    if(!preg_match('/[^+0-9]/',trim($nohp))){
      if(substr(trim($nohp), 0, 3)=='+62'){
        $hp = trim($nohp);
      } elseif(substr(trim($nohp), 0, 1)=='0'){
        $hp = '+62'.substr(trim($nohp), 1);
      }
    }
    return $hp;
  }

  function convert_all(){

  }

  function pr($par){
    echo "<pre>";
      print_r($par);
    echo"</pre>";
    exit();
  }
?>
