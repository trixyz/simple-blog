<?

require_once('controller.php');

session_start();
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

///////////
//Temporary
///////////
$uri = str_replace('/blog', '', $uri);
///////////
if($uri === '/index.php' or $uri ==='/'){
    if(isset($_GET['page'])){
        main_page($_GET['page']);
    }
    main_page();
} elseif ($uri === '/index.php/post' and isset($_GET['id'])){
    post($_GET['id']);
} elseif ($uri === '/index.php/admin' and (isset($_SESSION['user']) and $_SESSION['user'] == 'admin')){
    admin_page();
} elseif ($uri === '/index.php/admin'){
    echo 'raz';
    if(isset($_POST['login'])){
        login_page($_POST['login'], $_POST['password']);
    } else {
        echo 'dva';
        login_page();
    }
}

?>
