<?php

    // autoload composer
    require 'vendor/autoload.php';
    

    // Headers for CROSS
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS');


    // get Data Post
    $enviaPara = $_POST['send'];
    $nome = $_POST['Nome'];
    $email = $_POST['Email'];
    $telefone = $_POST['Telefone'];
    $assunto = "VIA SITE: " . $_POST['Assunto'];
    $domain = preg_replace('/^www\./', '', trim($_POST['domain']));;
    $mensagem = $_POST['Inf_gerais'];

    $content_html .= "Olá! <strong>".$nome."</strong> enviou uma mensagem.";
    $content_html .= "<br /><br /><strong>Nome Completo:</strong> ".$nome."<br>";
    $content_html .= "<strong>Email:</strong> ".$email."<br>";
    $content_html .= "<strong>Telefone:</strong> ".$telefone."<br>";
    $content_html .= "<strong>Assunto:</strong> ".$assunto."<br>";
    $content_html .= "<strong>Mensagem:</strong> ".$mensagem."<br>";

    if ($domain) {
        $content_html .= "<br><br><small>Mensagem enviada de: </small>" . $domain;
    }

    $from = new SendGrid\Email("Eduardo Almeida", "eduardoalmeida258@gmail.com");
    $subject = $assunto;
    $to = new SendGrid\Email($nome, $enviaPara);
    $content = new SendGrid\Content("text/html", $content_html);
    $mail = new SendGrid\Mail($from, $subject, $to, $content);

    $apiKey = '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';
    $sg = new \SendGrid($apiKey);

    $response = $sg->client->mail()->send()->post($mail);
    echo $response->statusCode();
    print_r($response->headers());
    echo $response->body();
