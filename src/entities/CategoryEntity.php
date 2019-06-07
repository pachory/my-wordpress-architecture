<?php


namespace src\entities;

class CategoryEntity
{
    private $id = 0;
    private $name = '';
    private $slug = '';
    private $permalink = '';

    public function __construct(
        int $id,
        string $name,
        string $slug,
        string $permalink
    ) {
        $this->id        = $id;
        $this->name      = $name;
        $this->slug      = $slug;
        $this->permalink = $permalink;
    }

    // 以下 getter

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getPermalink(): string
    {
        return $this->permalink;
    }

    public function getId(): string
    {
        return $this->id;
    }
}
