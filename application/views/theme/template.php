<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="robots" content="index, follow">
        
        <link rel="icon" href="../../favicon.ico">
        {header_view}
    </head>
    <body>
        <div class="blog-masthead-background">
            <div class="blog-masthead">
                <div class="container">
                    <nav class="blog-nav">
                        {menubar}
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="blog-header">
                <h1 class="blog-title">{blog_title}</h1>
                <p class="lead blog-description">{blog_description}</p>
            </div>
            <div class="row">
                <div class="col-sm-8 blog-main">
                    {content}
                </div>
                <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                    <div class="sidebar-module sidebar-module-inset">
                        <div class="text-center">
                            <img src="/images/ci-logo-big.png" alt="CodeIgniter">        
                        </div>
                        <br />
                        <p>Demo Weblog is an example of a simple weblog system based on the <a href="https://github.com/bcit-ci/codeigniter-website">CodeIgniter Website</a>.</p>
                    </div>
                    <div class="sidebar-module">
                        <h4>Elsewhere</h4>
                        <ol class="list-unstyled">
                            <li><a href="#">GitHub</a></li>
                            <li><a href="#">Bitbucket</a></li>
                            <li><a href="#">g+</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Linkedin</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <footer class="blog-footer">
            {footerbar}
            <p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
            <p><a href="#">Back to top</a></p>
        </footer>
        {footer_view}
    </body>
</html>