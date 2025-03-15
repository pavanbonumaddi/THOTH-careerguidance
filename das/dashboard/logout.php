<?PHP 
    session_start();
    $data = $_SESSION['user'];
    if(!isset($data)){
        header("Location: ../../login.php");
    }
    session_destroy();
    unset($_SESSION['user']);
    header("Location: ../../login.php");
?>