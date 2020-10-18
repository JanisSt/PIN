<?php

require_once 'Block.php';
require_once 'BlockStorage.php';

$blocks = new BlockStorage('blocks.json');

if (isset($_POST['like'])) {
    $blocks->like($_POST['like']);
}
if (isset($_POST['dislike'])) {
    $blocks->dislike($_POST['dislike']);
}
?>

<html lang="en">
<link rel="stylesheet" href="style.css">
<body>
<?php foreach ($blocks->getBlocks() as $id => $file) : ?>
    <img src='<?= $file->getLink() ?>' alt="picture">

    <text class="text">Score: <?= $file->getLikes() ?></text>
    <form method="post" action="/">'
        <button class="press like" type="submit" name="like" value="<?= $id ?>">LIKE</button>
    </form>

    <form method="post" action="/">
        <button class="press dislike" type="submit" name="dislike" value="<?= $id ?>">DISLIKE</button>
    </form>
    ?>
<?php endforeach; ?>


</body>


</html>
