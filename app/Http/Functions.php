<?php  
function getTypeArray(){
   $a = 
   [
       '0' => 'Amenazas de tipo natural',
       '1' => 'Amenazas de tipo antropico',
       '2' => 'Amenazas de tipo ambiental',
       '3' => 'otra',
   ];
   return $a;

}
function getSubTypeArray(){
    $b = 
    [
        '0' => 'Amenazas de tipo tecnológicas ',
        '1' => 'Amenazas de tipo sociales',
        '2' => 'otra',
    ];
    return $b;
 
 }

 if (!function_exists('getShorterString')) {
     function getShorterString($text, $length=null)
     {
         $formatedString = ucfirst($text);
 
         if ($length != null) {
             if (strlen($formatedString) <= $length) {
                 return $formatedString;
             } else {
                 $y=substr($formatedString, 0, $length) . '...';
                 return $y;
             }
         } else {
             return $formatedString;
         }
     }
 }
?>
