<?php


namespace src\repository;

use DateTime;
use src\entities\CategoryEntity;
use src\entities\DynamicFrontPageEntity;
use WP_Post;
use WP_Query;
use WP_Term;

class DynamicFrontPageRepository
{
    // 特定の記事を取得する
    public function findById(int $postId, WP_Term $categoryObj): DynamicFrontPageEntity
    {
        $postData = new WP_Query([
            'p'           => $postId,
            'post_status' => 'publish'
        ]);

        $categoryEntity = $this->mapToCategoryEntity($categoryObj);

        return $this->mapToEntity($postData->posts[0], $categoryEntity);
    }

    /**
     * 特定のカテゴリーに所属した記事を取得する
     *
     * @param int $categoryId
     * @return DynamicFrontPageEntity[]
     */
    public function findByCategoryId(int $categoryId): array
    {
        $postData = new WP_Query([
            'post_type'    => 'post',
            'post_status'  => 'publish',
            'category__in' => $categoryId
        ]);

        return array_map(function ($post) {
            /** @var WP_Term $categoryObj */
            $categoryObj    = get_the_category($post->ID);
            $categoryEntity = $this->mapToCategoryEntity($categoryObj[0]);

            return $this->mapToEntity($post, $categoryEntity);
        }, $postData->posts);
    }

    // 作成した entity クラスへマップする
    private function mapToEntity(WP_Post $query, CategoryEntity $categoryEntity): DynamicFrontPageEntity
    {
        $dateTimeObj = new DateTime($query->post_date);
        $publishAt   = $dateTimeObj->format('Y.m.d');

        return new DynamicFrontPageEntity(
            $query->ID,
            $publishAt,
            $query->post_title,
            $query->post_content,
            $query->post_name,
            get_permalink($query->ID),
            $categoryEntity
        );
    }

    // 作成した entity クラスへマップする
    private function mapToCategoryEntity(WP_Term $categoryObj): CategoryEntity
    {
        return new CategoryEntity(
            $categoryObj->term_id,
            $categoryObj->name,
            $categoryObj->slug,
            get_category_link($categoryObj->term_id)
        );
    }
}
