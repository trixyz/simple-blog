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

?>