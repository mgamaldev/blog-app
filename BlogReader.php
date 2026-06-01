<?php
require_once 'Post.php';
class BlogReader
{
    private array $posts;

    public function __construct(array $posts)
    {
        $this->posts = $posts;
    }

    public function listAll(): array
    {
        return $this->posts;
    }

    public function listPublished(): array
    {
        $list = [];
        foreach ($this->posts as $post) {
            if ($post->published) {
                $list[] = $post;
            }
        }
        return $list;
    }

    public function findById(int $id): ?Post
    {
        foreach ($this->posts as $post) {
            if ($post->id === $id) {
                return $post;
            }
        }
        return null;
    }
}
