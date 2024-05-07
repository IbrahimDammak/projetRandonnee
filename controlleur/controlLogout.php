<?php 

session_start(); 

        if (isset($_POST['logout'])) {
             session_destroy();
            echo "<script> 
                alert(\"vous ete deconectez\"); 
                setTimeout(function() {
                window.location.href = '../view/authentification.html';
                }, 100);
              </script>";  
             exit();
            } 

?>