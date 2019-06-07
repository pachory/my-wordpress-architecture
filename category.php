<?php
/** @var WP_Term $categoryObj */

use src\repository\DynamicFrontPageRepository;

$categoryObj                = get_category(get_query_var('cat'));
$dynamicFrontPageRepository = new DynamicFrontPageRepository();
$dynamicFrontPageEntities = $dynamicFrontPageRepository->findByCategoryId($categoryObj->term_id);
?>

<?php get_header(); ?>

<h1>カテゴリー別記事一覧ページ</h1>

<ul>
  <?php foreach($dynamicFrontPageEntities as $entity): ?>
  <li>
    <a href="<?= $entity->getLink() ?>"><?= $entity->getTitle() ?></a>
  </li>
  <?php endforeach; ?>
</ul>

<?php get_footer(); ?>
