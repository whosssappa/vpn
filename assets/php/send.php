<?php

// Токен бота, который прислал @botFather
$token = "7565511682:AAEkQ9Z7RVGuHRGcYElqiKTm_i0P98DAfOA";

// Chat ID
$chat_id = "340877123";

// Проверка, что форма отправлена
if ($_POST['act'] == 'order') {
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $msg_subject = $_POST['msg_subject'];
    $message = $_POST['message'];

    // Массив с данными для отправки
    $arr = array(
        'Имя:' => $name,
        'E-mail:' => $email,
        'Телефон:' => $phone_number,
        'Тема сообщения:' => $msg_subject,
        'Сообщение:' => $message
    );

    // Инициализируем переменную для текста
    $txt = "";
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    }

    // Отправка данных боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");

    // Проверка успешности отправки
    if ($sendToTelegram) {
        echo 'Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.';
    } else {
        echo 'Что-то пошло не так. Попробуйте отправить форму ещё раз.';
    }
}

?>
