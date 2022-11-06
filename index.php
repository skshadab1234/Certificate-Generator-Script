<?php
    $data = file_get_contents("data.json");
    $response = json_decode($data, true);
    header("content-type:image/jpeg");
    // echo "<pre>";
    // print_r($response);
    // die();
    foreach($response['GoogleSheetData'] as $key => $value){
        if($key != 0){
            $name =$value[1];
            $image = imagecreatefromjpeg("certificate.jpg");
            $font = "C:/xampp/htdocs/Generate-Certificate/GreatVibes-Regular.ttf";
            $color = imagecolorallocate($image, 19,21,22);
            imagettftext($image, 116, 0, 580, 740, $color, $font, $name);
            imagejpeg($image, 'certificates/'.$key."_".$name.'.jpg');
            imagedestroy($image);

        }
    }
?>