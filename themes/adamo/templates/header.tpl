<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <html>       
        <head>
            {block name=head}
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                <title>{$header_info['page_title']}</title>
                <meta name="description" content="">
                {$header_info['page_meta_tags']}
                <meta name="viewport" content="width=device-width">
                <link rel="stylesheet" href="{$theme_path}css/bootstrap.min.css">
                <style>
                    body {
                        padding-top: 60px;
                        padding-bottom: 40px;
                    }
                </style>
                <link rel="stylesheet" href="{$theme_path}css/bootstrap-responsive.min.css">
                <link rel="stylesheet" href="{$theme_path}css/main.css">

                <script type='text/javascript' src="{$theme_path}js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
                <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <script type='text/javascript'>window.jQuery || document.write('<script type="text/javascript" src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

                <script type='text/javascript' src="{$theme_path}js/vendor/bootstrap.min.js"></script>

                <script type='text/javascript' src="{$theme_path}js/plugins.js"></script>
                <script type='text/javascript' src="{$theme_path}js/main.js"></script>
                <script type="text/javascript" src="themes/<?php echo $setts['default_theme']; ?>/js/countdownpro.js" defer="defer"></script>
                <script type="text/javascript">
                    var currenttime = '$current_time_display';
                    var serverdate = new Date(currenttime);

                    function padlength(what) {
                        var output = (what.toString().length == 1) ? "0" + what : what;
                        return output;
                    }

                    function displaytime() {
                        serverdate.setSeconds(serverdate.getSeconds() + 1)
                        var timestring = padlength(serverdate.getHours()) + ":" + padlength(serverdate.getMinutes()) + ":" + padlength(serverdate.getSeconds());
                        document.getElementById("servertime").innerHTML = timestring;
                    }

                    window.onload = function() {
                        setInterval("displaytime()", 1000);
                    }

                </script>
            {/block}
        </head>
        <body>

            <!--[if lt IE 7]>
                <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
            <![endif]-->

            <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->
            {block name=navbar}
                <div class="navbar navbar-inverse navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container">
                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <a class="brand" href="#">Project name</a>
                            <div class="nav-collapse collapse">
                                <ul class="nav">
                                    <li class="active"><a href="#">Home</a></li>
                                    <li><a href="#about">About</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li class="nav-header">Nav header</li>
                                            <li><a href="#">Separated link</a></li>
                                            <li><a href="#">One more separated link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <form class="navbar-form pull-right">
                                    <input class="span2" type="text" placeholder="Email">
                                    <input class="span2" type="password" placeholder="Password">
                                    <button type="submit" class="btn">Sign in</button>
                                </form>
                            </div><!--/.nav-collapse -->
                        </div>
                    </div>
                </div>

            {/block}



