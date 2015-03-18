<ul id="nav">
    <li><a href="index.php" <?php if (basename($_SERVER['SCRIPT_FILENAME']) == 'index.php') {	
		echo 'id="here"'; } ?>>Home</a></li>	
    <li><a href="blog.php" <?php if (basename($_SERVER['SCRIPT_FILENAME']) == 'blog.php') {	
		echo 'id="here"'; } ?>>Blog</a></li>
    <li><a href="gallery.php" <?php if (basename($_SERVER['SCRIPT_FILENAME']) == 'gallery.php') {	
		echo 'id="here"'; } ?>>Gallery</a></li>
    <li><a href="contact.php" <?php if (basename($_SERVER['SCRIPT_FILENAME']) == 'contact.php') {	
		echo 'id="here"'; } ?>>Contact</a></li>
</ul>
