<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php foreach ($news as $news_item): ?>
    <div class="blog-post">
        <h2 class="blog-post-title"><?php echo anchor('news/' . $news_item['slug'], $news_item['title']); ?></h2>
        <p class="blog-post-meta">March 1, 2016 by <a href="#">User</a></p>
        <?php echo $news_item['excerpt']; ?><br /><br />
        <?php echo anchor('news/create/', 'Create'); ?>
        <?php echo anchor('news/' . $news_item['slug'], 'Read'); ?>
        <?php echo anchor('news/update/' . $news_item['slug'], ' Update'); ?>            
        <?php echo anchor('news/delete/' . $news_item['id'], ' Delete'); ?>
    </div>
<?php endforeach ?>

<div class="row">
    <nav class="text-center">
        <?php echo $page_links; ?>  
    </nav>
</div>







