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

    public function create(Post $post): Post
    {
        $this->posts[] = $post;
        return $post;
    }

    public function update(int $id, array $changes): ?Post
    {
        foreach ($this->posts as $post) {
            if ($post->id === $id) {
                if (isset($changes['title']))     $post->title = $changes['title'];
                if (isset($changes['body']))      $post->body = $changes['body'];
                if (isset($changes['author']))    $post->author = $changes['author'];
                if (isset($changes['published'])) $post->published = $changes['published'];
                return $post;
            }
        }
        return null;
    }

    public function delete(int $id): bool
    {
        foreach ($this->posts as $key => $post) {
            if ($post->id === $id) {
                unset($this->posts[$key]);
                return true;
            }
        }
        return false;
    }
}
