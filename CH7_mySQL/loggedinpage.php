<?php

    session_start();

    $diarycontent = "";

    if (array_key_exists("id", $_COOKIE)) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }

    if (array_key_exists("id", $_SESSION)) {
        
        
        include("connection.php");
        
        $query = "SELECT diary FROM `users` WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
        
        $row = mysqli_fetch_array(mysqli_query($link, $query));
        
        $diarycontent = $row['diary'];
        
    } else {
        
        header("Location: index.php");
        
    }
    
    include("header.php");
?>

    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        
        <p class="navbar-brand">Secret Diary</p>
        
        <div class="form-inline">
          <a href ='index.php?logout=1'>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button></a>
        </div>

    </nav>

<div id="logincontainer">

    <textarea class="form-control" id="diary" rows="30"><?php echo $diarycontent; ?></textarea>
    
</div>


<?php
    include("footer.php");

?>