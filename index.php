<?php
require_once 'Post.php';
require_once 'BlogReader.php';



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


$posts = [$post1, $post2, $post3];
$reader = new BlogReader($posts);

echo "------Create New Post----- \n";
$post4 = new Post();
$post4->id = 4;
$post4->title = "C#";
$post4->body = "Learn C#";
$post4->author = "Ahmed";
$post4->published = false;

$reader->create($post4);
echo "Total count after create: " . count($reader->listAll()) . "\n\n";


echo "------Update Post----- \n";
$id = 1;
$updatedPost = $reader->update($id, ['title' => "Updated Title"]);
if ($updatedPost !== null) {
    echo "New Title: " . $reader->findById($id)->title . "\n\n";
}

echo "------Delete Post----- \n";
$reader->delete(2);
echo "Remaining count after delete: " . count($reader->listAll()) . "\n\n";


echo "------ Find Post After Deleting ------\n";
$id = 2;
$foundPost = $reader->findById($id);
if ($foundPost !== null) {
    echo "Post #{$id}: {$foundPost->title} by {$foundPost->author}\n";
} else {
    echo "Post #{$id} not found\n";
}

foreach ($reader->listAll() as $post) {
    echo "{$post->title} \n";
}
/* 
foreach ($reader->listAll() as $post) {
    echo "{$post->title} \n";
}
echo "\n";

echo "------Published Posts----- \n";

foreach ($reader->listPublished() as $post) {
    if ($post->published) {
        echo "{$post->title}" . " by " . "{$post->author}" . "\n";
    }
}

echo "\n";
echo "------Find By ID----- \n";

$id = 1;
$foundPost = $reader->findById($id);
if ($foundPost !== null) {
    echo "Post #{$id}: {$foundPost->title} by {$foundPost->author}\n";
} else {
    echo "Post #{$id} not found\n";
}

$id = 99;
$foundPost = $reader->findById($id);
if ($foundPost !== null) {
    echo "Post #{$id}: {$foundPost->title} by {$foundPost->author}\n";
} else {
    echo "Post #{$id} not found\n";
}
 */