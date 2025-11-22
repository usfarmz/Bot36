<?php
$token = "8532082529:AAHCiDhoHsPzp43m5tX4fPsZFFwRqeRTTAw";
$update = json_decode(file_get_contents('php://input'), true);

if (isset($update["message"])) {
    $chat_id = $update["message"]["chat"]["id"];
    $text = $update["message"]["text"];

    if ($text === "/start") {
        $keyboard = [
            "inline_keyboard" => [
                [
                    ["text" => "Ouvrir la Mini-App 🚀", "url" => "https://clope36.42web.io/?i=1#"]
                ]
            ]
        ];

        $data = [
            "chat_id" => $chat_id,
            "text" => "Bienvenue dans Clope36 Bot !\nAppuie sur le bouton ci-dessous 👇",
            "reply_markup" => json_encode($keyboard)
        ];

        file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));
    }
}
?>