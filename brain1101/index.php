<?php

header('Cache-control: public');
header('Expires: ' . date('r', time() + 3600));

require_once(__DIR__ . '/app/Template.php');

// $content = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, dicta, similique! Deleniti cupiditate accusamus similique harum est animi sunt error numquam sequi eum voluptatum hic in sed, delectus assumenda maxime.';

(new Template())->render(__DIR__ . '/app/templates/page.html', [
    '{{$title}}' => 'Test title',
    '{{$content}}' => $content
]);

var_dump($_SERVER['REQUEST_URI']);
