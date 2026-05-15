<?php

function listAll($posts)
{
    return $posts;
}

function listPublished($posts)
{
    $list = [];
    foreach ($posts as $post) {
        if ($post['published'] === true) {
            $list[] = $post;
        }
    }
    return $list;
}

function findById($posts, $id)
{
    foreach ($posts as $post) {
        if ($post['id'] === $id) {
            return $post;
        }
    }
    return null;
}
