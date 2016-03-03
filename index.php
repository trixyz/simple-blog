<?

require_once('controller.php');


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
}

?>
