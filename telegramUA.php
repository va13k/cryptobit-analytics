<?php

// https://api.telegram.org/bot5002877609:AAEH-H5camnhapq6keSIFHDgEi-TqMqPFQU/getUpdates

    $name = $_POST['user_name'];
    $phone = $_POST['user_phone'];
    $contact = $_POST['ContactVar'];
    $token = "5002877609:AAEH-H5camnhapq6keSIFHDgEi-TqMqPFQU";
    $chat_id = "-545662346";
    $arr = array(
        'Потенциальный заказчик ' => $name,
        'Телефон ' => $phone,
        'Предпочитает ' => $contact
    );
    $txt = '';

        foreach ($arr as $key => $value) {
            $txt .= "<b>".$key."</b> ".$value."%0A";
        };
    
$sendToTelegram = fopen("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&parse_mode=html&text=$txt","r");
    
        if ($sendToTelegram) {
            header("Location: orderUA.php");
            return true;
        }
        else {
            echo "ERROR";
        }

?>