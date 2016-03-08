<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h2>Contact</h2>
<p>
    Etiam porta sem malesuada magna mollis euismod. Cras mattis consectetur purus sit 
    amet fermentum. Aenean lacinia bibendum nulla sed consectetur.
</p>

<?php if (validation_errors()) : ?>
    <div class="alert alert-warning">
        <p><?php echo validation_errors(); ?></p></div>
<?php endif; ?>

<div class="well">
    <?php echo form_open('contact'); ?> 
    <div class="form-group col-md-6">
        <?php
        echo form_label('Name');
        $options = array(
            'id' => 'name',
            'name' => 'name',
            'value' => set_value('name'),
            'class' => ' form-control',
        );
        echo form_input($options);
        ?>
    </div>
    <div class="form-group col-md-6">
        <?php
        echo form_label('Email');
        $options = array(
            'id' => 'email',
            'name' => 'email',
            'value' => set_value('email'),
            'class' => ' form-control',
        );
        echo form_input($options);
        ?>
    </div>
    <div class="form-group col-md-12">
        <?php
        echo form_label('Message');
        $options = array(
            'id' => 'message',
            'name' => 'message',
            'value' => set_value('message'),
            'class' => 'form-control',
            'rows' => '8'
        );
        echo form_textarea($options);
        ?>
    </div>
    <div class="form-group col-md-12">
        <?php
        echo form_submit('submit', 'Submit', 'class="btn btn-primary"');
        echo form_close();
        ?>
    </div>
    <div class="clearfix"></div>
</div>