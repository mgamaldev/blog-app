<?php
require_once 'Post.php';

$post1 = new Post();
$post1->id = 1;
$post1->title = "PHP";
$post1->body = "Learn PHP";
$post1->author = "Ahmed";
$post1->published = true;

$post2 = new Post();
$post2->id = 2;
$post2->title = "C++";
$post2->body = "Learn C++";
$post2->author = "Mohamed";
$post2->published = true;


$post3 = new Post();
$post3->id = 3;
$post3->title = "JS";
$post3->body = "Learn JS";
$post3->author = "Gamal";
$post3->published = false;


$post4 = new Post();
$post4->id = 4;
$post4->title = "C#";
$post4->body = "Learn C#";
$post4->author = "Ahmed";
$post4->published = false;

$post5 = new Post();
$post5->id = 5;
$post5->title = "JAVA";
$post5->body = "Learn JAVA";
$post5->author = "Mohamed";
$post5->published = true;

$posts = [$post1, $post2, $post3, $post4, $post5];

echo "------All Posts----- \n";
foreach ($posts as $post) {
    echo "{$post->title} \n";
}
echo "\n";

echo "------Published Posts----- \n";

foreach ($posts as $post) {
    if ($post->published) {
        echo "{$post->title}" . " by " . "{$post->author}" . "\n";
    }
}
