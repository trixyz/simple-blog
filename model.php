<?

function database_connect(){

    $settings = parse_ini_file('blog.ini');
    $link = new PDO($settings['db_name'], $settings['user'] , $settings['pass']);
    return $link;
}

function database_connect_close($link){
    $link = null;
}

function get_posts($post_per_page = 3, $page = 1){
    
    $link = database_connect();

    $result = $link->query('SELECT COUNT(*) FROM posts');
    $posts_quantity = $result->fetch(PDO::FETCH_NUM)[0];
    $pages_quantity = ceil($posts_quantity/$post_per_page);

    if($post_per_page==0){

        $result = $link->query('SELECT * FROM posts');
        $posts = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $posts[] = $row;
        } 
    } else {

        $result = $link->query('SELECT * FROM posts LIMIT '.($page-1)*$post_per_page.','.$post_per_page);
        $posts = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $posts[] = $row;
        } 
    }

    database_connect_close($link);
    return ['posts'=>$posts,'pages_quantity'=>$pages_quantity];
}

function get_post_by_id($id){

    $link = database_connect();
    $result = $link->query('SELECT * FROM posts where id='. $id);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row;
}

?>