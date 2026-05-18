<?php

require_once 'posts.php';
require_once 'actions.php';

echo "-----[View All Posts Title]-----\n";
foreach (listAll($posts) as $post) {
    echo $post['title'] . "\n";
}
echo "\n";


echo "-----[View Titles Of The Bublished Posts Only]-----\n";
foreach (listPublished($posts) as $post) {
    echo $post['title'] . "\n";
}
echo "\n";


echo "-----[Display Post Title By Post ID]-----\n";
$id = 1;
$findById = findById($posts, $id);

if ($findById != null) {
    echo "Post #1: " . $findById['title'] . " by " . $findById['author'] . "\n";
} else {
    echo "Post #{$id} not found" . "\n";
}


$id = 99;
$findById = findById($posts, $id);

if ($findById != null) {
    echo "Post #1: " . $findById['title'] . " by " . $findById['author'] . "\n";
} else {
    echo "Post #{$id} not found" . "\n";
}
