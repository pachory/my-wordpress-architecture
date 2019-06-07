<?php

use src\repository\StaticFrontPageRepository;

$staticFrontPageRepository = new StaticFrontPageRepository();
$staticFrontPageEntity     = $staticFrontPageRepository->findById(get_the_ID());
?>

<?php get_header(); ?>

<h1>固定ページサンプル</h1>

<div>タイトル: <?= $staticFrontPageEntity->getTitle() ?></div>
<div>リンク: <?= $staticFrontPageEntity->getLink() ?></div>
<div>本文: <?= $staticFrontPageEntity->getBody() ?></div>
<div>スラッグ: <?= $staticFrontPageEntity->getSlug() ?></div>
<div>記事ID: <?= $staticFrontPageEntity->getPostId() ?></div>

<?php get_footer(); ?>
