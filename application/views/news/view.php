<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="blog-post">
    <h2 class="blog-post-title"><?php echo $news_item['title']; ?></h2>
    <?php echo html_purify($news_item['text2html']); ?><br />
    <p class="blog-post-meta">
        <?php echo 'Last update on ' , html_purify($news_item['updated']); ?> by <a href="#">User</a>
    </p>
    <?php echo anchor('news/', ' Back'); ?> 
</div>