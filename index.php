<?php

require_once 'posts.php';

function byAuthor($posts, $name)
{
    $list = [];
    foreach ($posts as $post) {
        if ($post['author'] === $name) {
            $list[] = $post;
        }
    }
    return $list;
}

foreach ($posts as $post) {
    echo $post['title'] . "\n";
}

echo "\n";

$filteredPosts = byAuthor($posts, "Ahmed");

foreach ($filteredPosts as $post) {
    echo $post['title'] . "\n";
}
