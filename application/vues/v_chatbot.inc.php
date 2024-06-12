    <section class="banner-area-contact organic-breadcrumb">
        <div class="container-contact">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>ChatBot</h1>
                    <nav class="d-flex align-items-center">
                        <a href="../index.php">Accueil<span class="lnr lnr-arrow-right"></span></a>
                        <a href="<?php echo Chemins::VUES .'v_chatbot.inc.php'; ?>">chatBot</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
<?php
function appelOpenAi($message){
    $openai_endpoint = "https://api.openai.com/v1/completions";
    $token = "sk-proj-6poy188LjZBTOEdLoYvOT3BlbkFJrVNRRPd94V7qvP394CQ2";
    $data = array(
        "model" => "gpt-3.5-turbo",
        "messages" => array(
            array(
                "role" => "system",
                "content" => "Vous parlez avec chat-gpt"
            ),
            array(
                "role" => "user",
                "content" => $message
            )
        ),
        "max_token" => 100,
        "temperature" => 0.7
    );
    $headers = array(
      "content-Type: application/json",
      "Authorization: Bearer ".$token
    );
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $openai_endpoint);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

        if (isset($_POST['message']) && isset($_POST['envoie'])){
            $message = $_POST['message'];
            $resultat = appelOpenAi($message);
            var_dump($resultat);
            $data = json_decode($resultat, true);
            echo "<p>".$data['choices'][0]['message']['content']."</p>";
        }
?>

<form method="POST" style="height: 200px;">
    <input type="text" name="message" placeholder="Entrez un message">
    <input type="submit" name="envoie" value="Envoyer">
</form>