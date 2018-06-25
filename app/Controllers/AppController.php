<?php
use giggsey\libphonenumber;

/**
 *
 */
class AppController{
  public function getCountryCode($par){
    return 'wow'.$par;
    // $swissNumberStr = "044 668 18 00";
    // $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
    // try {
    //     $swissNumberProto = $phoneUtil->parse($swissNumberStr, "CH");
    //     var_dump($swissNumberProto);
    // } catch (\libphonenumber\NumberParseException $e) {
    //     var_dump($e);
    // }
  }
}

?>
