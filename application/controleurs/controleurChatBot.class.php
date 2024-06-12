<?php
require_once "C:/wamp64/www/BelbachaBoutique/libs/webservice/webservice_Chatgpt.php";
class ControleurChatBot {

    public function reponseMessage() {  
        if (isset($_POST['message']) && isset($_POST['envoie'])){
            $message = $_POST['message'];
            $resultat = appelOpenAi($message);
            var_dump($resultat);
            $data = json_decode($resultat, true);
            echo "<p>".$data['choices'][0]['message']['content']."</p>";
        }
    }
}

