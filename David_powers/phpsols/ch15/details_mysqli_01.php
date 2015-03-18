<?php
require_once './includes/utility_funcs.php';
require_once './includes/connection.php';
// connect to the database
$conn = dbConnect('read');
// check for article_id in query string
if (isset($_GET['article_id']) && is_numeric($_GET['article_id'])) {
    $article_id = (int) $_GET['article_id'];
} else {
    $article_id = 0;
}
$sql = "SELECT title, article,DATE_FORMAT(updated, '%W, %M %D, %Y') AS updated, filename, caption
        FROM blog INNER JOIN images USING (image_id)
        WHERE blog.article_id = $article_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta  charset="utf-8">
    <title>Japan Journey</title>
    <link href="styles/journey.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>
    <h1>Japan Journey </h1>
</header>
<div id="wrapper">
    <?php require './includes/menu.php'; ?>
    <main>
        <h2><?php if ($row) {
                echo $row['title'];
            } else {
                echo 'No record found';
            }
            ?>
        </h2>
        <p><?php if ($row) { echo $row['updated']; } ?></p>
        <?php
        if ($row && !empty($row['filename'])) {
            $filename = "images/{$row['filename']}";
            $imageSize = getimagesize($filename)[3];
            ?>
            <figure>
                <img src="<?= $filename; ?>" alt="<?= $row['caption']; ?>" <?= $imageSize;?>>
            </figure>
        <?php } if ($row) { echo convertToParas($row['article']); } ?>
        <p><a href="blog.php">Back to the blog </a></p>
    </main>
    <?php include './includes/footer.php'; ?>
</div>
</body>
</html>