<?php

    $error="";

    $success = "";

    if($_POST['email'] == ""){
        
        $error.= 'The email address is required<br>';
        
    }
    
    if($_POST['subject'] == ""){
        
        $error.= 'The subject is required<br>';
        
    }

    if($_POST['contents'] == ""){
        
        $error.= 'The contents is required<br>';
        
    }

    if ($_POST['email'] && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

      $error.= 'The email address is invalid';
        
    }
    
    if($error != ""){
        
        $error = '<div class="alert alert-danger" role="alert"><h4 class="alert-heading">There\'s some error(s) in your form.</h4>'.$error.'</div>';
        
    }
    else{
        
        $emailTo = "whwen0528@gmail.com";
        
        $subject = $_POST['subject'];
        
        $body = $_POST['contents'];
        
        $headers = "From: ".$_POST['email'];
          
        if(mail($emailTo, $subject, $body, $headers)){
            
            $success =  '<div class="alert alert-success" role="alert">Your message was sent, we\'ll get back to you ASAP!</div>';
            
        }else{
            
             $error = '<div class="alert alert-danger" role="alert">Your message couldn\'t be sent - please try again later</div>';
                
        }
        
    }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
      

  </head>
  <body>
      
    <div id="container">
        
        <h1>Get in touch!</h1>
        
        <div id="display"><? echo $error.$success; ?></div>
        
        <form method="post">
          <fieldset class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            <small class="text-muted">We'll never share your email with anyone else.</small>
          </fieldset>
          <fieldset class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" >
          </fieldset>
          <fieldset class="form-group">
            <label for="exampleTextarea">What would you like to ask us?</label>
            <textarea class="form-control" id="content" name="contents" rows="3"></textarea>
          </fieldset>
          <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
      
      <script type="text/javascript">
          
        $("form").submit(function(e) {
          
            var error="";

            if($("#email").val() == ""){
                error += "The Email address is required<br>";
            }  

            if($("#subject").val() == ""){
                error += "The subject is required<br>";
            }  

            if($("#content").val() == ""){
                error += "The content is required";
            }  

            if(error!=""){

                $("#display").html('<div class="alert alert-danger" role="alert"><h4 class="alert-heading">There\'s some error(s) in your form.</h4>'+ error+'</div>');
                
                return false;

            }else{
                
                return true;
            }
             
        })

        

      </script>
      
  </body>
</html>
