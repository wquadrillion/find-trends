<?php

/*#1:  DOWNTREND
Input array: [57, 5, 30, 19, 18, 12, 7, 18, 22, 32, 20, 11, 8, 5]
Expected output:
 [false, true, 2]

#2: UPTREND
Input array: [32, 5, 11, 7, 8, 10, 11, 18, 5, 2]
Expected output:
[true, false,  4]

#3: NO TREND
Input array: [32, 12, 15, 11, 22, 11, 18, 18, 15, 7]
Expected output:
[false, false, -1]*/


    //$trends = array(57, 5, 30, 19, 18, 12, 7, 18, 22, 32, 20, 11, 8, 5);
    //$trends = array(32, 5, 11, 7, 8, 10, 11, 18, 5, 20);
    $trends = array(32, 12, 15, 11, 22, 11, 18, 18, 15, 7);

    function detect_trend($trends){
        $trend_index = 0;
        $uptrend = 0;
        $downtrend = 0;
        $down_consecutive = false;
        $up_consecutive  = false;
        for ($i = 0; $i < count($trends); $i++ ){
             if($i != 0){
                 if($trends[$i-1] < $trends[$i]){
                     if($up_consecutive){
                         $uptrend++;
                     }else{
                         $uptrend = 1;
                         $trend_index = $i;
                         $up_consecutive = true;
                         $down_consecutive = false;
                     }
                     if($uptrend == 3){
                         return array($up_consecutive, $down_consecutive, $trend_index);
                     }
                     //$uptrend++;
                 }elseif ($trends[$i-1] > $trends[$i]){
                     if($down_consecutive){
                         $downtrend++;
                     }else{
                         $downtrend = 1;
                         $trend_index = $i-1;
                         $down_consecutive = true;
                         $up_consecutive = false;
                     }
                     if($downtrend == 3){
                         return array($up_consecutive, $down_consecutive, $trend_index);
                     }
                     //$downtrend++;
                 }
             }
        }
        return array(false,false, -1);
    }

    var_dump(detect_trend($trends));
?>