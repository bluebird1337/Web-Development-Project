<?php

    if (array_key_exists('city', $_GET)){

        $city = $_GET['city'];

        $city = str_replace(' ', '-', $city);

        $exists = true;

        $error = "";

        $weather = "";

        $file = 'https://www.weather-forecast.com/locations/'.$city.'/forecasts/latest';
        $file_headers = @get_headers($file);
        if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
            $exists = false;
            $error = '<div class="alert alert-danger" role="alert">'."Could't find that city.".'</div';
        }

        if($exists == true){

            $page = file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");

            $first_p = explode('<p class="b-forecast__table-description-content"><span class="phrase">', $page);
            
            if (sizeof($first_p) < 1){
                $error = '<div class="alert alert-danger" role="alert">'."Could't find that city.".'</div';
                
            }else{

                $second_p = explode('</span></p></td><td class="b-forecast__table-description-cell--js" colspan="9">', $first_p[1]);
                
                if(sizeof(($second_p) < 1) ){
                    $error = '<div class="alert alert-danger" role="alert">'."Could't find that city.".'</div';
                }else{
                    $weather = '<div class="alert alert-info" role="alert">'.$second_p[0].'</div>';
                }
            }
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
      
      
      <style type="text/css">
          
      html { 
          background: url(background.jpeg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
          
          body{
              
              background: none;
              
          }
          
          #container{
              
              text-align: center;
              margin: 0 auto;
              margin-top: 200px;
              width: 450px;
          }
          #weather{
              
              margin-top: 25px;
              
          }
      
      </style>
  </head>
  <body>
    
      <div id="container">
      
        <h1>What't the weather?</h1>
          
        <p>Enter the name of city</p>
          
        <form>
          <div class="form-group">
            <input type="text" class="form-control" id="city" name="city" placeholder="Eg. London, Tokyo" value="<?php
                
                 if (array_key_exists('city', $_GET)) {
																										   
				    echo $_GET['city']; 
																										   
				}                                                                                                  
                                                                                                                 
            ?>">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
          
        <div id="weather">
        <?php
            
          if($error == ""){
              echo $weather;
          }else{
              echo $error;
          }
          
        ?>
        </div>
          
      
      </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>