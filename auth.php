<?php
include("./bootstrap/init.php");
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    // dd($_POST);
    $action = $_GET['action'];
    if ($action == 'sign-in') {
        if (empty($_POST['username']) and empty($_POST['email'])) {
              setError('All input fields required');
        }
        elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            setError('Enter your correctly email');
        }
        elseif(isUserExist($_POST['email'])) {
            setError('this user exits');
        }
        elseif(createUser($_POST)){
            $_SESSION['email'] = $_POST['email'];
           redirect('auth.php?action=confirm');
        }else{
            setError('this user already exits');
        }
    }
    if ($action == 'confirm') {
        $token = findTokenByHash($_SESSION['hash'])->token;
        if ($token === $_POST['token']) {
            $session = bin2hex(random_bytes(32));
            changeLoginSession($session, $_SESSION['email']);
            setcookie('auth', $session, time() + 1728000, '/');
            deleteLoginSession($_SESSION['hash']);
            unset($_SESSION['hash'], $_SESSION['email']);
            redirect('index.php');

        } else {
            setError('The enter token is wrong');
            redirect('auth.php?action=confrim');
        }
    }
}

if(isset($_GET['action']) and $_GET['action'] == 'confirm' and !empty($_SESSION['email'])) {
    if(!isUserExist($_SESSION['email'])) {
        setError('this user not exist');
        redirect('auth.php?action=login');
    }
    else{
        if (isset($_SESSION['hash']) and isAliveToken($_SESSION['hash'])) {
            sendTokenByEmail($_SESSION['email'], findTokenByHash($_SESSION['hash'])->token);
        } else {
            $resault = createLoginToken();
            sendTokenByEmail($_SESSION['email'], $resault['token']);
            $_SESSION['hash'] = $resault['hash'];
        }
    }
}


if ($_GET['action'] == 'confirm') {
    include('./template/confirm.php');
    die();
    
}
if (isset($_GET["action"]) and $_GET["action"]  == 'sign-in') {
    include('./template/sing-in.php');
} else {
    include('./template/login.php');
}