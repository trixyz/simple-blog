<?
require_once ('model.php');

function main_page($page=1){

    $data = get_posts(3,$page);
    $posts = $data['posts'];
    $pages_quantity = $data['pages_quantity'];
    require_once('templates/posts_list.php');

}

function post($id){
    
    $post = get_post_by_id($id);
    require_once('templates/post.php');
}

function admin_page(){
    require_once('templates/admin_page.php');
}

function login_page($user = null, $password = null){
    if (!is_null($user) and !is_null($password)){
        if(login($user, $password)){
            $_SESSION['user']='admin';
            require_once('templates/admin_page.php');
        } 
    } else require_once('templates/login_page.php');
}

function ajax($action){

    if ($action == 'exit'){
        unset($_SESSION['user']);
    }
}

?>