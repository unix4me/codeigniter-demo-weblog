<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="blog-post">
    <h2 class="blog-post-title"><?php echo $news_item['title']; ?></h2>
    <?php echo $news_item['text']; ?><br /><br />
    <?php echo anchor('news/', ' Back'); ?> 
</div>