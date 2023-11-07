
<?php
include "header.php";

include "content.php";

$content = new ContentController();
$content->handleRequest();


include "footer.php";
?>

