<?php
function campaign_image($filename, $prefix = "../"){
    $safeName = basename((string)$filename);
    $imagePath = __DIR__ . "/../assets/img/" . $safeName;

    if($safeName !== "" && file_exists($imagePath)){
        return $prefix . "assets/img/" . rawurlencode($safeName);
    }

    return $prefix . "assets/img/placeholder.svg";
}

function ensure_campaign_image_dir(){
    $dir = __DIR__ . "/../assets/img";

    if(!is_dir($dir)){
        mkdir($dir, 0777, true);
    }

    return $dir;
}

function payment_proof_image($filename, $prefix = "../"){
    $safeName = basename((string)$filename);
    $imagePath = __DIR__ . "/../assets/bukti/" . $safeName;

    if($safeName !== "" && file_exists($imagePath)){
        return $prefix . "assets/bukti/" . rawurlencode($safeName);
    }

    return "";
}

function ensure_payment_proof_dir(){
    $dir = __DIR__ . "/../assets/bukti";

    if(!is_dir($dir)){
        mkdir($dir, 0777, true);
    }

    return $dir;
}
?>
