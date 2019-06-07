<?php


namespace src\repository;

use src\entities\StaticFrontPageEntity;
use WP_Post;
use WP_Query;

class StaticFrontPageRepository
{
    // 特定の記事を取得する
    public function findById(int $postId): StaticFrontPageEntity
    {
        $postData = new WP_Query([
            'page_id'     => $postId,
            'post_status' => 'publish',
        ]);

        return $this->mapToEntity($postData->posts[0]);
    }

    // 作成した entity クラスへマップする
    protected function mapToEntity(WP_Post $query): StaticFrontPageEntity
    {
        return new StaticFrontPageEntity(
            $query->ID,
            $query->post_title,
            $query->post_content,
            $query->post_name,
            get_permalink($query->ID)
        );
    }
}
