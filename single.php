<?php

use src\repository\DynamicFrontPageRepository;

$categoryObj                = get_the_category();
$dynamicFrontPageRepository = new DynamicFrontPageRepository();
$dynamicFrontPageEntity   = $dynamicFrontPageRepository->findById(
    get_the_ID(),
    $categoryObj[0]
);
?>

<?php get_header(); ?>

<h1>投稿ページサンプル</h1>

<div>タイトル: <?= $dynamicFrontPageEntity->getTitle() ?></div>
<div>リンク: <?= $dynamicFrontPageEntity->getLink() ?></div>
<div>本文: <?= $dynamicFrontPageEntity->getBody() ?></div>
<div>スラッグ: <?= $dynamicFrontPageEntity->getSlug() ?></div>
<div>記事ID: <?= $dynamicFrontPageEntity->getPostId() ?></div>
<div>公開日: <?= $dynamicFrontPageEntity->getPublicAt() ?></div>
<div>カテゴリーID: <?= $dynamicFrontPageEntity->getCategory()->getId() ?></div>
<div>カテゴリースラッグ: <?= $dynamicFrontPageEntity->getCategory()->getSlug() ?></div>
<div>カテゴリー名: <?= $dynamicFrontPageEntity->getCategory()->getName() ?></div>
<div>カテゴリーリンク: <?= $dynamicFrontPageEntity->getCategory()->getPermalink() ?></div>

<?php get_footer(); ?>
