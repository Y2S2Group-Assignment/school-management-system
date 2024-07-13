<?php
    
    session_start();
    function alertMessage()
    {
        if(isset($_SESSION['status']))
        {
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                '.$_SESSION['status'].'
               
            </div>';
            unset($_SESSION['status']) ;
        }
    }
// <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    function errorMessage()
    {
        if(isset($_SESSION['status']))
        {
            echo '
            <div style="color:red">
                '.$_SESSION['status'].'
            </div>';
            // unset($_SESSION['status']) ;
        }
    }

    function empityData()
    {
        if(isset($_SESSION['empitydata']))
        {
            echo '
            <div style="color:red">
                '.$_SESSION['empitydata'].'
            </div>';
             unset($_SESSION['empitydata']) ;
        }
    }


?>
