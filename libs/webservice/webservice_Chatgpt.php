<?php
//sk-proj-uZ4K6uh0u2LpyQuqmvH5T3BlbkFJllDGOq7b4la9X2GsZilX

function appelOpenAi($message){
    $openai_endpoint = "https://api.openai.com/v1/completions";
    $token = "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";
    $data = array(
        "model" => "text-embedding-3-small",
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
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

