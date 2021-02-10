<?php

    $emailTo = "whwen0528@gmail.com";

    $subject = "I hope this works!";

    $body = "I think you're great!";

    $headers = "From: howard@bluebird1337-com.stackstaging.com/";

    if (mail($emailTo, $subject, $body, $headers)) {
        
        echo "The email was sent successfully";
        
    } else {
        
        echo "The email could not be sent.";
        
    }


?>
