<?php


namespace src\entities;

class StaticFrontPageEntity
{
    private $postId = 0;
    private $title = '';
    private $body = '';
    private $slug = '';
    private $link = '';

    public function __construct(
        int $postId,
        string $title,
        string $body,
        string $slug,
        string $link
    ) {
        $this->postId = $postId;
        $this->title  = $title;
        $this->body   = $body;
        $this->slug   = $slug;
        $this->link   = $link;
    }

    // 以下 getter

    public function getPostId()
    {
        return $this->postId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getLink(): string
    {
        return $this->link;
    }
}
