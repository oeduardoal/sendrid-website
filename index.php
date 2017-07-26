<?php

  require "sendgrid-email.php";
  
  $eao = new SendMailSendGrid("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");
  
  $eao->sendFor("eduardoalmeida258@gmail.com");
  $eao->sendFields("Eduardo", "eduardoalmeida258@gmail.com", "Assunto", "Conteetnt asdjdsajdsajnd");
  $eao->send();