<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h2><?php echo $title ?></h2>

<?php if (validation_errors()) : ?>
    <div class="alert alert-warning">
        <p><?php echo validation_errors(); ?></p></div>
<?php endif; ?>
<?php 
    echo form_open('news/update');
    echo form_label('Title');
    $options = array(
        'id' => 'title',
        'name' => 'title',
        'value' => set_value('title', $news_item['title'], FALSE),
        'class' => 'form-control'
    );
    echo form_input($options);
    
    echo '<br />';
    
    echo form_label('Full Text');
    $options = array(
        'id' => 'text',
        'name' => 'text',
        'value' => set_value('text', $news_item['text'], FALSE),
        'class' => 'form-control'
    );
    echo form_textarea($options);
    
    echo '<br />';
    
    echo form_label('Excerpt');
    $options = array(
        'id' => 'excerpt',
        'name' => 'excerpt',
        'value' => set_value('excerpt', $news_item['excerpt'], FALSE),
        'class' => 'form-control'
    );
    echo form_textarea($options);
    
    echo '<br />';
    
    echo form_hidden('id', $news_item['id']);
    echo form_submit('submit', 'Update news item', 'class="btn btn-primary"');
    echo form_close();
    
    echo '<br />';
    
    echo anchor('news/', ' Back');
