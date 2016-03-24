<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <meta name="description" content="">
        <meta name="author" content="AmineRifi">    
        <title><?= $titre_site ?></title>
        <link href="<?= site_url('assets/bootstrap-3.3.6-dist/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
        <style type="text/css">
            body {
                padding-top: 50px;
            }
            .starter-template {
                padding: 40px 15px;
                text-align: center;
            }
            @import url(https://fonts.googleapis.com/css?family=Oswald:400,300);
            @import url(https://fonts.googleapis.com/css?family=Open+Sans);
            body
            {
                font-family: 'Open Sans', sans-serif;
            }
            .chat_box .chat_message_wrapper ul.chat_message > li + li {
                margin-top: 4px;
            }
            .popup-box-on {
                display: block !important;
            }
            a:focus {
                outline: none;
                outline-offset: 0px;
            }
            .popup-head-left.pull-left h1 {
                color: #fff;
                float: left;
                font-family: oswald;
                font-size: 18px;
                margin: 2px 0 0 5px;

            }
            .popup-head-left a small {
                display: table;
                font-size: 11px;
                color: #fff;
                line-height: 4px;
                opacity: 0.5;
                padding: 0 0 0 7px;
            }
            .chat-header-button {
                background: transparent none repeat scroll 0 0;
                border: 1px solid #fff;
                border-radius: 7px;
                font-size: 15px;
                height: 26px;
                opacity: 0.9;
                padding: 0;
                text-align: center;
                width: 26px;
            }
            .popup-head-right {
                margin: 9px 0 0;
            }
            .popup-head .btn-group {
                margin: -5px 3px 0 -1px;
            }
            .gurdeepoushan .dropdown-menu {
                padding: 6px;
            }
            .gurdeepoushan .dropdown-menu li a span {
                border: 1px solid;
                border-radius: 50px;
                display: list-item;
                font-size: 19px;
                height: 40px;
                line-height: 36px;
                margin: auto;
                text-align: center;
                width: 40px;
            }
            .gurdeepoushan .dropdown-menu li {
                float: left;
                text-align: center;
                width: 33%;
            }
            .gurdeepoushan .dropdown-menu li a {
                border-radius: 7px;
                font-family: oswald;
                padding: 3px;
                transition: all 0.3s ease-in-out 0s;
            }
            .gurdeepoushan .dropdown-menu li a:hover {
                background:#304445 none repeat scroll 0 0 !important;
                color: #fff;
            }
            .popup-head {
                background: #304445 none repeat scroll 0 0 !important;
                border-bottom: 3px solid #ccc;
                color: #fff;
                display: table;
                width: 100%;
                padding: 8px;
            }
            .popup-head .md-user-image {
                border: 2px solid #5a7172;
                border-radius: 12px;
                float: left;
                width: 44px;
            }
            .uk-input-group-addon .glyphicon.glyphicon-send {
                color: #ffffff;
                font-size: 21px;
                line-height: 36px;
                padding: 0 6px;
            }
            .chat_box_wrapper.chat_box_small.chat_box_active {

                height: 342px;
                overflow-y: scroll;
                width: 316px;
            }
            aside {
                background-attachment: fixed;
                background-clip: border-box;
                background-color: rgba(0, 0, 0, 0);
                background-image: url("https://z-1-scontent-cdg2-1.xx.fbcdn.net/hphotos-xpt1/v/t1.0-9/12670232_624826600991767_3547881030871377118_n.jpg?oh=b4541268dfcdc6c8b2758066dba9c0c7&oe=572DDCE7");
                background-origin: padding-box;
                background-position: center top;
                background-repeat: repeat;
                border: 1px solid #304445;
                bottom: 0;
                display: none;
                height: 466px;
                position: fixed;
                right: 70px;
                width: 300px;
                font-family: 'Open Sans', sans-serif;
            }
            .chat_box {
                padding: 16px;
            }
            .chat_box .chat_message_wrapper::after {
                clear: both;
            }
            .chat_box .chat_message_wrapper::after, .chat_box .chat_message_wrapper::before {
                content: " ";
                display: table;
            }
            .chat_box .chat_message_wrapper .chat_user_avatar {
                float: left;
            }
            .chat_box .chat_message_wrapper {
                margin-bottom: 32px;
            }
            .md-user-image {
                border-radius: 50%;
                width: 34px;
            }
            img {
                border: 0 none;
                box-sizing: border-box;
                height: auto;
                max-width: 100%;
                vertical-align: middle;
            }
            .chat_box .chat_message_wrapper ul.chat_message, .chat_box .chat_message_wrapper ul.chat_message > li {
                list-style: outside none none;
                padding: 0;
            }
            .chat_box .chat_message_wrapper ul.chat_message {
                float: left;
                margin: 0 0 0 20px;
                max-width: 77%;
            }
            .chat_box.chat_box_colors_a .chat_message_wrapper ul.chat_message > li:first-child::before {
                border-right-color: #616161;
            }
            .chat_box .chat_message_wrapper ul.chat_message > li:first-child::before {
                border-color: transparent #ededed transparent transparent;
                border-style: solid;
                border-width: 0 16px 16px 0;
                content: "";
                height: 0;
                left: -14px;
                position: absolute;
                top: 0;
                width: 0;
            }
            .chat_box.chat_box_colors_a .chat_message_wrapper ul.chat_message > li {
                background: #FCFBF6 none repeat scroll 0 0;
                color: #000000;
            }
            .open-btn {
                border: 2px solid #189d0e;
                border-radius: 32px;
                color: #189d0e !important;
                display: inline-block;
                margin: 10px 0 0;
                padding: 9px 16px;
                text-decoration: none !important;
                text-transform: uppercase;
            }
            .chat_box .chat_message_wrapper ul.chat_message > li {
                background: #ededed none repeat scroll 0 0;
                border-radius: 4px;
                clear: both;
                color: #212121;
                display: block;
                float: left;
                font-size: 13px;
                padding: 8px 16px;
                position: relative;
                word-break: break-all;
            }
            .chat_box .chat_message_wrapper ul.chat_message, .chat_box .chat_message_wrapper ul.chat_message > li {
                list-style: outside none none;
                padding: 0;
            }
            .chat_box .chat_message_wrapper ul.chat_message > li {
                margin: 0;
            }
            .chat_box .chat_message_wrapper ul.chat_message > li p {
                margin: 0;
            }
            .chat_box.chat_box_colors_a .chat_message_wrapper ul.chat_message > li .chat_message_time {
                color: rgba(185, 186, 180, 0.9);
            }
            .chat_box .chat_message_wrapper ul.chat_message > li .chat_message_time {
                color: #727272;
                display: block;
                font-size: 11px;
                padding-top: 2px;
                text-transform: uppercase;
            }
            .chat_box .chat_message_wrapper.chat_message_right .chat_user_avatar {
                float: right;
            }
            .chat_box .chat_message_wrapper.chat_message_right ul.chat_message {
                float: right;
                margin-left: 0 !important;
                margin-right: 24px !important;
            }
            .chat_box.chat_box_colors_a .chat_message_wrapper.chat_message_right ul.chat_message > li:first-child::before {
                border-left-color: #E8FFD4;
            }
            .chat_box.chat_box_colors_a .chat_message_wrapper ul.chat_message > li:first-child::before {
                border-right-color: #FCFBF6;
            }
            .chat_box .chat_message_wrapper.chat_message_right ul.chat_message > li:first-child::before {
                border-color: transparent transparent transparent #ededed;
                border-width: 0 0 29px 29px;
                left: auto;
                right: -14px;
            }
            .chat_box .chat_message_wrapper ul.chat_message > li:first-child::before {
                border-color: transparent #ededed transparent transparent;
                border-style: solid;
                border-width: 0 29px 29px 0;
                content: "";
                height: 0;
                left: -14px;
                position: absolute;
                top: 0;
                width: 0;
            }
            .chat_box.chat_box_colors_a .chat_message_wrapper.chat_message_right ul.chat_message > li {
                background: #E8FFD4 none repeat scroll 0 0;
            }
            .chat_box .chat_message_wrapper ul.chat_message > li {
                background: #ededed none repeat scroll 0 0;
                border-radius: 12px;
                clear: both;
                color: #212121;
                display: block;
                float: left;
                font-size: 13px;
                padding: 8px 16px;
                position: relative;
            }
            .gurdeep-chat-box {
                background: #fff none repeat scroll 0 0;
                border-radius: 5px;
                float: left;
                padding: 3px;
            }
            #submit_message {
                background: transparent none repeat scroll 0 0;
                border: medium none;
                padding: 4px;
            }
            .gurdeep-chat-box i {
                color: #333;
                font-size: 21px;
                line-height: 1px;
            }
            .chat_submit_box {
                bottom: 0;
                box-sizing: border-box;
                left: 0;
                overflow: hidden;
                padding: 10px;
                position: absolute;
                width: 100%;
            }
            .uk-input-group {
                border-collapse: separate;
                display: table;
                position: relative;
            }

        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?= $titre_site ?></a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Accueil</a></li>                   
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
                <div class="container text-center">
                    <div class="row">
                        <h2 style="color: rgb(24, 157, 14);"><i aria-hidden="true" class="fa fa-whatsapp"></i> Whatsapp Chat Box POPUP</h2>
                        <h4 style="font-size: 14px; line-height: 22px;">#simple #html #css #User #Profile #jquery #Social #contact<br> #accordion #popup #chat #messages #jquery</h4>
                        <div class="round hollow text-center">
                            <a href="#" class="open-btn" id="addClass"><i class="fa fa-whatsapp" aria-hidden="true"></i> Click Here</a>
                        </div>

                        <hr>

                        MORE

                        <a target="_blank" href="#"> Creative User Profile  </a>, <a target="_blank" href="#">Open in chat (popup-box chat-popup)</a>
                    </div>
                </div>


                <aside id="sidebar_secondary" class="tabbed_sidebar ng-scope chat_sidebar">

                    <div class="popup-head">
                        <div class="popup-head-left pull-left"><a Design and Developmenta title="Gurdeep Osahan (Web Designer)" target="_blank" href="https://web.facebook.com/iamgurdeeposahan">
                                <img class="md-user-image" alt="Gurdeep Osahan (Web Designer)" title="Gurdeep Osahan (Web Designer)" src="https://scontent.xx.fbcdn.net/hphotos-xtf1/v/t1.0-9/11986965_571879149619846_4942737019629149212_n.jpg?oh=280b3fd238a5308f8e5c7ea5ba33c48e&oe=56FB8357" title="Gurdeep Osahan (Web Designer)" alt="Gurdeep Osahan (Web Designer)">
                                <h1>Gurdeep Osahan</h1><small><br> <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Web Designer</small></a></div>
                        <div class="popup-head-right pull-right">
                            <button class="chat-header-button" type="button"><i class="glyphicon glyphicon-facetime-video"></i></button>
                            <button class="chat-header-button" type="button"><i class="glyphicon glyphicon-earphone"></i></button>
                            <div class="btn-group gurdeepoushan">
                                <button class="chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">
                                    <i class="glyphicon glyphicon-paperclip"></i> </button>
                                <ul role="menu" class="dropdown-menu pull-right">
                                    <li><a href="#"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Gallery</a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Photo</a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> Video</a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-headphones" aria-hidden="true"></span> Audio</a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Location</a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Contact</a></li>
                                </ul>
                            </div>

                            <button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-remove"></i></button>
                        </div>
                    </div>

                    <div id="chat" class="chat_box_wrapper chat_box_small chat_box_active" style="opacity: 1; display: block; transform: translateX(0px);">
                        <div class="chat_box touchscroll chat_box_colors_a">
                            <div class="chat_message_wrapper">
                                <div class="chat_user_avatar">
                                    <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" >
                                        <img alt="Gurdeep Osahan (Web Designer)" title="Gurdeep Osahan (Web Designer)"  src="https://z-n.ak.fbcdn.net/sphotos-b.ak/hphotos-ak-xtp1/v/t1.0-9/10672068_611175545690206_6037235061660836500_n.jpg?oh=95d141c46858a48a31b0753ffa486aef&oe=57077635&__gda__=1464465923_f873c14b7338c1071034f7cf62e7ddb3" class="md-user-image">
                                    </a>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, eum? </p>
                                    </li>
                                    <li>
                                        <p> Lorem ipsum dolor sit amet.<span class="chat_message_time">13:38</span> </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat_message_wrapper chat_message_right">
                                <div class="chat_user_avatar">
                                    <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" >
                                        <img alt="Gurdeep Osahan (Web Designer)" title="Gurdeep Osahan (Web Designer)" src="https://scontent.xx.fbcdn.net/hphotos-xtf1/v/t1.0-9/11986965_571879149619846_4942737019629149212_n.jpg?oh=280b3fd238a5308f8e5c7ea5ba33c48e&oe=56FB8357" class="md-user-image">
                                    </a>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem delectus distinctio dolor earum est hic id impedit ipsum minima mollitia natus nulla perspiciatis quae quasi, quis recusandae, saepe, sunt totam.
                                            <span class="chat_message_time">13:34</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat_message_wrapper">
                                <div class="chat_user_avatar">
                                    <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" >
                                        <img alt="Gurdeep Osahan (Web Designer)" title="Gurdeep Osahan (Web Designer)" src="https://z-n.ak.fbcdn.net/sphotos-b.ak/hphotos-ak-xtp1/v/t1.0-9/10672068_611175545690206_6037235061660836500_n.jpg?oh=95d141c46858a48a31b0753ffa486aef&oe=57077635&__gda__=1464465923_f873c14b7338c1071034f7cf62e7ddb3" class="md-user-image">
                                    </a>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ea mollitia pariatur porro quae sed sequi sint tenetur ut veritatis.https://www.facebook.com/iamgurdeeposahan
                                            <span class="chat_message_time">23 Jun 1:10am</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ea mollitia pariatur porro quae sed sequi sint tenetur ut veritatis.https://www.facebook.com/iamgurdeeposahan
                                            <span class="chat_message_time">23 Jun 1:10am</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ea mollitia pariatur porro quae sed sequi sint tenetur ut veritatis.https://www.facebook.com/iamgurdeeposahan
                                            <span class="chat_message_time">23 Jun 1:10am</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat_message_wrapper chat_message_right">
                                <div class="chat_user_avatar">
                                    <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" >
                                        <img alt="Gurdeep Osahan (Web Designer)" title="Gurdeep Osahan (Web Designer)" src="https://scontent.xx.fbcdn.net/hphotos-xtf1/v/t1.0-9/11986965_571879149619846_4942737019629149212_n.jpg?oh=280b3fd238a5308f8e5c7ea5ba33c48e&oe=56FB8357" class="md-user-image">
                                    </a>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p> Lorem ipsum dolor sit amet, consectetur. </p>
                                    </li>
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            <span class="chat_message_time">Friday 13:34</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat_message_wrapper">
                                <div class="chat_user_avatar">
                                    <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" >
                                        <img alt="Gurdeep Osahan (Web Designer)" title="Gurdeep Osahan (Web Designer)" src="https://z-n.ak.fbcdn.net/sphotos-b.ak/hphotos-ak-xtp1/v/t1.0-9/10672068_611175545690206_6037235061660836500_n.jpg?oh=95d141c46858a48a31b0753ffa486aef&oe=57077635&__gda__=1464465923_f873c14b7338c1071034f7cf62e7ddb3" class="md-user-image">
                                    </a>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ea mollitia pariatur porro quae sed sequi sint tenetur ut veritatis.https://www.facebook.com/iamgurdeeposahan
                                            <span class="chat_message_time">23 Jun 1:10am</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ea mollitia pariatur porro quae sed sequi sint tenetur ut veritatis.https://www.facebook.com/iamgurdeeposahan
                                            <span class="chat_message_time">23 Jun 1:10am</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ea mollitia pariatur porro quae sed sequi sint tenetur ut veritatis.https://www.facebook.com/iamgurdeeposahan
                                            <span class="chat_message_time">23 Jun 1:10am</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat_message_wrapper chat_message_right">
                                <div class="chat_user_avatar">
                                    <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" >
                                        <img alt="Gurdeep Osahan (Web Designer)" title="Gurdeep Osahan (Web Designer)" src="https://scontent.xx.fbcdn.net/hphotos-xtf1/v/t1.0-9/11986965_571879149619846_4942737019629149212_n.jpg?oh=280b3fd238a5308f8e5c7ea5ba33c48e&oe=56FB8357" class="md-user-image">
                                    </a>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p> Lorem ipsum dolor sit amet, consectetur. </p>
                                    </li>
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            <span class="chat_message_time">Friday 13:34</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat_message_wrapper">
                                <div class="chat_user_avatar">
                                    <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" >
                                        <img alt="Gurdeep Osahan (Web Designer)" title="Gurdeep Osahan (Web Designer)" src="https://z-n.ak.fbcdn.net/sphotos-b.ak/hphotos-ak-xtp1/v/t1.0-9/10672068_611175545690206_6037235061660836500_n.jpg?oh=95d141c46858a48a31b0753ffa486aef&oe=57077635&__gda__=1464465923_f873c14b7338c1071034f7cf62e7ddb3" class="md-user-image">
                                    </a>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ea mollitia pariatur porro quae sed sequi sint tenetur ut veritatis.https://www.facebook.com/iamgurdeeposahan
                                            <span class="chat_message_time">23 Jun 1:10am</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ea mollitia pariatur porro quae sed sequi sint tenetur ut veritatis.https://www.facebook.com/iamgurdeeposahan
                                            <span class="chat_message_time">23 Jun 1:10am</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ea mollitia pariatur porro quae sed sequi sint tenetur ut veritatis.https://www.facebook.com/iamgurdeeposahan
                                            <span class="chat_message_time">23 Jun 1:10am</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat_message_wrapper chat_message_right">
                                <div class="chat_user_avatar">
                                    <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" >
                                        <img alt="Gurdeep Osahan (Web Designer)" title="Gurdeep Osahan (Web Designer)" src="https://scontent.xx.fbcdn.net/hphotos-xtf1/v/t1.0-9/11986965_571879149619846_4942737019629149212_n.jpg?oh=280b3fd238a5308f8e5c7ea5ba33c48e&oe=56FB8357" class="md-user-image">
                                    </a>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p> Lorem ipsum dolor sit amet, consectetur. </p>
                                    </li>
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            <span class="chat_message_time">Friday 13:34</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="chat_submit_box">
                        <div class="uk-input-group">
                            <div class="gurdeep-chat-box">
                                <span style="vertical-align: sub;" class="uk-input-group-addon">
                                    <a href="#"><i class="fa fa-smile-o"></i></a>
                                </span>
                                <input type="text" placeholder="Type a message" id="submit_message" name="submit_message" class="md-input">
                                <span style="vertical-align: sub;" class="uk-input-group-addon">
                                    <a href="#"><i class="fa fa-camera"></i></a>
                                </span>
                            </div>

                            <span class="uk-input-group-addon">
                                <a href="#"><i class="glyphicon glyphicon-send"></i></a>
                            </span>
                        </div>
                    </div>

            </div>
        </div>
        <script src="<?= site_url('assets/scripts/jquery-1.12.2.min.js') ?>" type="text/javascript"></script>        
        <script src="<?= site_url('assets/bootstrap-3.3.6-dist/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
                $("#addClass").click(function () {
                    $('#sidebar_secondary').addClass('popup-box-on');
                });

                $("#removeClass").click(function () {
                    $('#sidebar_secondary').removeClass('popup-box-on');
                });
            })
        </script>
    </body>
</html>
