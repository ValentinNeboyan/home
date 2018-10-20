<?php
session_start();
require_once 'forms/Session.php';


?>


<h1><a href="register.php">Регистрация</a></h1>
<br/>


<?php if (Session::has('user')) : ?>
    <h1><a href="logout.php">Logout (<?=Session::get('user'); ?>)</a></h1>
<?php else : ?>
    <h1><a href="login.php">Login</a></h1>
<?php endif; ?>

    <h1><a href="admin.php">Go to admin page</a></h1>

    <br/>

<?=isset($_GET['msg']) ? $_GET['msg'] : '';?>