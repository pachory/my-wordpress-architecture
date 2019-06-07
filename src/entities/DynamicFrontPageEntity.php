<?php


namespace src\entities;


class DynamicFrontPageEntity
{
    private $postId = 0;
    private $publicAt = '';
    private $title = '';
    private $body = '';
    private $slug = '';
    private $category = '';
    private $link = '';

    public function __construct(
        int $postId,
        string $publicAt,
        string $title,
        string $body,
        string $slug,
        string $link,
        CategoryEntity $category
    ) {
        $this->postId   = $postId;
        $this->publicAt = $publicAt;
        $this->title    = $title;
        $this->body     = $body;
        $this->slug     = $slug;
        $this->link     = $link;
        $this->category = $category;
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
        return apply_filters('the_content', $this->body);
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getPublicAt(): string
    {
        return $this->publicAt;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getLink(): string
    {
        return $this->link;
    }
}
