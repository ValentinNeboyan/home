<?php

session_start();

$errors = [];
$destination = __DIR__ . '/uploads';
$file = $_FILES['image'];
$location = '/';

$extensions = [
    'jpg',
    'jpeg',
    'png'
];

$fileExt = pathinfo($file['name'], PATHINFO_EXTENSION);

if (!in_array($fileExt, $extensions)) {
    $errors[] = 'extension not allowed!';
} elseif ($file['size'] > 2 * 1024 * 1024) {
    $errors[] = 'file is too big!';
}

if (empty($errors)) {
    $fw = $file['tmp_name'];
    $name = basename($file["name"]);

    if (file_exists("{$destination}/${name}")) {
        $name = basename(time() . ".{$fileExt}");
    }

    move_uploaded_file($fw, "{$destination}/{$name}");
} else {
    $_SESSION['errors'] = $errors;
}

header('Location: ' . $location);
