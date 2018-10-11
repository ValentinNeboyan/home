<?php
declare(strict_types=1);

$types = [
    'posts' => 'Посты',
    'todos' => 'Задачи',
    'users' => 'Пользователи'
];

$apiUrl = 'https://jsonplaceholder.typicode.com';
$data = [];

require_once(__DIR__ . '/layout/header.php');

if (isset($_POST['api'])) {
    $url = "{$apiUrl}/$_POST[api]";
    $data = json_decode(file_get_contents($url));
}
?>

<div class="container py-5">
    <form action="" method="post">
        <div class="form-group">
        <?php foreach($types as $key => $type) : ?>
        <label>
            <input type="radio" name="api" value="<?= $key ?>"
            <?= $_POST['api'] === $key ? ' checked' : '' ?>
            >
            <?= $type ?>
        </label>
        <?php endforeach; ?>
        </div>

        <button class="btn btn-primary">Отправить</button>
    </form>

<?php if (count($data)) : ?>

<div class="mt-5 row">

<?php

foreach($data as $item) {


}
?>

</div>

<?php endif; ?>

<?php require_once(__DIR__ . '/layout/footer.php');