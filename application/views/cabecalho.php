<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            
            <?php if ($this->session->flashdata('message')) : ?>
                <p class="alert alert-<?php echo $this->session->flashdata('type'); ?>"><?php echo $this->session->flashdata('message'); ?></p>
            <?php endif; ?>