<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $path = "pages/$page.php";
    if (file_exists($path)) {
        $content = file_get_contents($path);
    } else {
        $content = file_get_contents('pages/404.php');
    }
}else{
    $content=null;
}
?>

<?php include 'elements/layout.php'; ?>