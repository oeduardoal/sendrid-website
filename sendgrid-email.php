<?php

    // autoload composer
    require 'vendor/autoload.php';

    // Create a class for Send Email for Send Grid
    class SendMailSendGrid{
        private $name;        
        private $email;
        private $subject;
        private $content;
        private $attachment;
        private $emailFor;
        private $captcha;
        
        private $apiKey;

        function __construct($apiKey){
            $this->apiKey = $apiKey;
        }
        
        function sendFor($emailFor){
            $this->emailFor = $emailFor;
        }

        function sendFields($name, $email, $subject, $content){
            $this->name = $name;
            $this->email = $email;
            $this->subject = $subject;
            $this->content = $content;
        }

        function send(){

            $from = new SendGrid\Email("CONTATO", "contato");

            $to = new SendGrid\Email($this->name, $this->sendFor);

            $content = new SendGrid\Content("text/html", $this->content);

            $mail = new SendGrid\Mail($from, $this->subject, $to, $content);

            $sg = new \SendGrid($this->apiKey);

            $mail = new SendGrid\Mail($from, $this->subject, $to, $content);
            
            $response = $sg->client->mail()->send()->post($mail);
            
            if($response->statusCode() != 202){
                $return = array(
                    'success' => false,
                    'status' => $response->statusCode()
                );
                echo json_encode($return);
            }else{
                $return = array(
                    'success' => true,
                    'status' => $response->statusCode()
                );
                echo json_encode($return);
            }
        }

    }