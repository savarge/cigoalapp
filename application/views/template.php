<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title; ?></title>
        <link href="/public/css/style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="holder">
            <div class="headercontainer">
                <div class="headercontent">
                    <img class="logo" src="/public/images/main_logo.png" width="285" height="51" alt="LOGO" />
                    <p class ="login"><?php echo anchor("users/register", "Register"); ?> | <?php if ($this->session->userdata('logged_in')) { ?><?php echo anchor("users/logout", "Logout", "color=#fff");
                    echo $this->session->userdata('id'); ?><?php } else { ?><?php echo anchor("users/login", "Login", "color=#fff"); ?></<?php } ?></p>
                    <form class="search" method="get" id="searchform" action="">
                        <label style="color:#FFF" for="s">Search:</label>
                        <input class="searchbox" type="text" value="" name="s" id="s" size="14" />
                        <input type="hidden" id="searchsubmit" value="Search" />
                    </form>
                    <div class="clear"></div>
                    <ul class="nav">
                        <li class="current_page_item"><a href="http://codeigniter">MY GOALS</a></li>
                        <li><a href="http://codeigniter/friendsgoals">FRIENDS GOALS</a></li>
                        <li><a href="http://codeigniter/settings">SETTINGS</a></li>
                        <li><a href="http://codeigniter/about">ABOUT</a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>


            <div class="mainconainer">
                <div class="maincontent">    
                    <?php $this->load->view($main); ?>
                </div>
            </div>		

            <div class ="footercontainer">
                <div class ="footercontent">
                    <p><span class="credits">&copy; 2012 Goal Setter | <a style="color:#fff; text-decoration:none" href="#"></a><a style="color:#fff; text-decoration:none"  href="#">App Settings</a> | <a style="color:#fff; text-decoration:none" href="#">About</a></span><br /></p>
                </div>
            </div>
        </div>
    </body>
</html>

