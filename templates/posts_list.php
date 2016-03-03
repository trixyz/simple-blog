
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>
</head>
<body>
    <?php foreach($posts as $post): ?>
        <a href="index.php/post?id=<?php echo $post['id']?>">
        <?php echo $post['title']?><br>
        </a>
    <?php endforeach;?>
    <?php for($i = 1; $i<$pages_quantity+1; $i++): ?>
        <a href="index.php?page=<?php echo $i?>">
        <?php echo $i?>
        </a>
    <?php endfor;?>
</body>
</html>