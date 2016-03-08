<?

require_once('controller.php');

session_start();
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

///////////
//Temporary
///////////
$uri = str_replace('/blog', '', $uri);
///////////
if($uri === '/index.php' or $uri ==='/' or $uri === '/index.php/'){
    if(isset($_GET['page'])){
        main_page($_GET['page']);
    }
    main_page();
}elseif ($uri === '/index.php/ajax' and isset($_GET['action'])) {
    ajax($_GET['action']);
} elseif ($uri === '/index.php/post' and isset($_GET['id'])){
    post($_GET['id']);
} elseif ($uri === '/index.php/admin' and (isset($_SESSION['user']) and $_SESSION['user'] == 'admin')){
    admin_page();
} elseif ($uri === '/index.php/admin'){

    if(isset($_POST['login'])){
        login_page($_POST['login'], $_POST['password']);
    } else {
        login_page();
    }
}

?>
