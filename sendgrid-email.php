<?php

    // autoload composer
    require 'vendor/autoload.php';
    

    // Headers for CROSS
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS');


    // $enviaPara = $_POST['send'];
    // $nome = $_POST['Nome'];
    // $email = $_POST['Email'];
    // $telefone = $_POST['Telefone'];
    // $assunto = "VIA SITE: " . $_POST['Assunto'];
    // $domain = preg_replace('/^www\./', '', trim($_POST['domain']));;
    // $mensagem = $_POST['Inf_gerais'];


    // $envia .= "Olá! <strong>".$nome."</strong> enviou uma mensagem.";
    // $envia .= "<br /><br /><strong>Nome Completo:</strong> ".$nome."<br>";
    // $envia .= "<strong>Email:</strong> ".$email."<br>";
    // $envia .= "<strong>Telefone:</strong> ".$telefone."<br>";
    // $envia .= "<strong>Assunto:</strong> ".$assunto."<br>";
    // $envia .= "<strong>Mensagem:</strong> ".$mensagem."<br>";
    // if ($domain) {
    //     $envia .= "<br><br><small>Mensagem enviada de: </small>" . $domain;
    // }

    $from = new SendGrid\Email("Eduardo Almeida", "eduardoalmeida258@gmail.com");
    $subject = "Assunto";
    $to = new SendGrid\Email("Eduardo Almeida 2", "oeduardoal@gmail.com");
    $content = new SendGrid\Content("text/html", "asdasddaaddasdsadsa <hr/>");
    $mail = new SendGrid\Mail($from, $subject, $to, $content);

    $apiKey = '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';
    $sg = new \SendGrid($apiKey);

    $response = $sg->client->mail()->send()->post($mail);
    echo $response->statusCode();
    print_r($response->headers());
    echo $response->body();
