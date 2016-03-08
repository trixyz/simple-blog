<? 

if ($_GET){
    if (isset($_GET['action'])){
        $action = $_GET['action'];
        if ($action == 'exit'){
            unset($_SESSION['user']);
        }
    }
}

?>