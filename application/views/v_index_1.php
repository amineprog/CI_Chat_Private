<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <meta name="description" content="">
        <meta name="author" content="AmineRifi">    
        <title><?= $titre_site ?></title>
        <link href="<?= site_url('assets/bootstrap-3.3.6-dist/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 50px;
                font-size: 12px;
                color: #777;
                background: #f9f9f9;
                font-family: 'Open Sans',sans-serif;
                margin-top:20px;
            }
            .starter-template {
                padding: 40px 15px;
                text-align: center;
            }
            .bg-white {
                background-color: #fff;
            }

            .friend-list {
                list-style: none;
                margin-left: -40px;
            }

            .friend-list li {
                border-bottom: 1px solid #eee;
            }

            .friend-list li a img {
                float: left;
                width: 45px;
                height: 45px;
                margin-right: 0px;
            }

            .friend-list li a {
                position: relative;
                display: block;
                padding: 10px;
                transition: all .2s ease;
                -webkit-transition: all .2s ease;
                -moz-transition: all .2s ease;
                -ms-transition: all .2s ease;
                -o-transition: all .2s ease;
            }

            .friend-list li.active a {
                background-color: #f1f5fc;
            }

            .friend-list li a .friend-name, 
            .friend-list li a .friend-name:hover {
                color: #777;
            }

            .friend-list li a .last-message {
                width: 65%;
                white-space: nowrap;
                text-overflow: ellipsis;
                overflow: hidden;
            }

            .friend-list li a .time {
                position: absolute;
                top: 10px;
                right: 8px;
            }

            small, .small {
                font-size: 85%;
            }

            .friend-list li a .chat-alert {
                position: absolute;
                right: 8px;
                top: 27px;
                font-size: 10px;
                padding: 3px 5px;
            }

            .chat-message {
                padding: 60px 20px 115px;
            }

            .chat {
                list-style: none;
                margin: 0;
            }

            .chat-message{
                background: #f9f9f9;  
            }

            .chat li img {
                width: 45px;
                height: 45px;
                border-radius: 50em;
                -moz-border-radius: 50em;
                -webkit-border-radius: 50em;
            }

            img {
                max-width: 100%;
            }

            .chat-body {
                padding-bottom: 20px;
            }

            .chat li.left .chat-body {
                margin-left: 70px;
                background-color: #fff;
            }

            .chat li .chat-body {
                position: relative;
                font-size: 11px;
                padding: 10px;
                border: 1px solid #f1f5fc;
                box-shadow: 0 1px 1px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 1px rgba(0,0,0,.05);
                -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
            }

            .chat li .chat-body .header {
                padding-bottom: 5px;
                border-bottom: 1px solid #f1f5fc;
            }

            .chat li .chat-body p {
                margin: 0;
            }

            .chat li.left .chat-body:before {
                position: absolute;
                top: 10px;
                left: -8px;
                display: inline-block;
                background: #fff;
                width: 16px;
                height: 16px;
                border-top: 1px solid #f1f5fc;
                border-left: 1px solid #f1f5fc;
                content: '';
                transform: rotate(-45deg);
                -webkit-transform: rotate(-45deg);
                -moz-transform: rotate(-45deg);
                -ms-transform: rotate(-45deg);
                -o-transform: rotate(-45deg);
            }

            .chat li.right .chat-body:before {
                position: absolute;
                top: 10px;
                right: -8px;
                display: inline-block;
                background: #fff;
                width: 16px;
                height: 16px;
                border-top: 1px solid #f1f5fc;
                border-right: 1px solid #f1f5fc;
                content: '';
                transform: rotate(45deg);
                -webkit-transform: rotate(45deg);
                -moz-transform: rotate(45deg);
                -ms-transform: rotate(45deg);
                -o-transform: rotate(45deg);
            }

            .chat li {
                margin: 15px 0;
            }

            .chat li.right .chat-body {
                margin-right: 70px;
                background-color: #fff;
            }

            .chat-box {
                position: fixed;
                bottom: 0;
                left: 444px;
                right: 0;
                padding: 15px;
                border-top: 1px solid #eee;
                transition: all .5s ease;
                -webkit-transition: all .5s ease;
                -moz-transition: all .5s ease;
                -ms-transition: all .5s ease;
                -o-transition: all .5s ease;
            }

            .primary-font {
                color: #3c8dbc;
            }

            a:hover, a:active, a:focus {
                text-decoration: none;
                outline: 0;
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
        <div class="container bootstrap snippet">
            <div class="row">
                <?php //var_dump($conversations); ?>
                <div class="col-md-4 bg-white ">
                    <div class=" row border-bottom padding-sm" style="height: 40px;">
                        Conversations   
                    </div>
                    <!-- =============================================================== -->
                    <!-- member list -->
                    <ul class="friend-list">
                        <?php
                        $i = 0;
                        foreach ($conversations as $conversation) {
                            ?>
                            <li <?= ($i == 0) ? 'class="active bounceInDown"' : '' ?>>
                                <a href="#" class="clearfix">
                                    <img src="http://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                                    <div class="friend-name">	
                                        <strong><?= $conversation['last_name'] . ' ' . $conversation['first_name'] ?></strong>
                                    </div>
                                    <div class="last-message text-muted"><?= ($conversation['last']) ? $conversation['last']->reply : '' ?></div>
                                    <small class="time text-muted"><?= ($conversation['last']) ? get_timeago($conversation['last']->time) : '' ?></small>
                                    <small class="chat-alert label label-danger"><?= ($conversation['unread'] && $conversation['unread']->TOTAL > 0) ? $conversation['unread']->TOTAL : '' ?></small>
                                </a>
                            </li>                     
                            <?php
                            $i++;
                        }
                        ?>
                    </ul>
                </div>

                <!--=========================================================-->
                <!-- selected chat -->
                <div class="col-md-8 bg-white ">
                    <div class="chat-message" style="max-height: 850px;">
                        <p>{{currentConversation}}</p>
                        <ul class="chat" id="conv">

                        </ul>
                    </div>
                    <div class="chat-box bg-white">
                        <div class="input-group">
                            <input class="form-control border no-shadow no-rounded" id="msgText" placeholder="" required>
                            <span class="input-group-btn">
                                <button class="btn btn-success no-rounded" type="button" id="btnSend">Envoyer</button>
                            </span>
                        </div><!-- /input-group -->	
                    </div>            
                </div>        
            </div>
        </div>
        <script src="<?= site_url('assets/scripts/jquery-1.12.2.min.js') ?>" type="text/javascript"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.2/angular.min.js" type="text/javascript"></script>          
        <script src="<?= site_url('assets/scripts/scriptIppo.js') ?>" type="text/javascript"></script>
        <script src="<?= site_url('assets/bootstrap-3.3.6-dist/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <script src="<?= site_url('assets/scripts/jquery.slimscroll.min.js') ?>" type="text/javascript"></script>
        <script type="text/javascript">
                                var id_c =<?= $currentConversation ?>;
                                var start = 0;
                                var limit = 50;
                                $(document).ready(function () {                                    
                                    $(".chat-message").slimScroll({
                                        height: '800px',
                                        start: 'bottom'
                                    });
                                    $("#btnSend").click(function () {
                                        var msg=$("#msgText").val();
                                        if(msg.length>0){
                                            sendMsg(msg);   
                                            $("#msgText").val("");
                                        }
                                    });
                                getMsg();
                                setInterval("getMsg();", 2000); 
                                });
                                function getMsg() {
                                    $.ajax({
                                        url: '<?= site_url('App/getMsg') ?>',
                                        type: 'POST',
                                        dataType: 'Json',
                                        data: {id_c: id_c, start: start, limit: limit},
                                        success: function (code_html, statut) {
                                            if (code_html.count > 0) {
                                                start += code_html.count;
                                                $("#conv").append(code_html.str);
                                            }                                          

                                        },
                                        error: function (resultat, statut, erreur) {
                                            console.log(erreur);
                                            
                                        },
                                        complete: function (resultat, statut) {
                                            
                                        }
                                    });
                                }
                                function sendMsg(msg) {
                                    $.ajax({
                                        url: '<?= site_url('App/pushMsg') ?>',
                                        type: 'POST',
                                        dataType: 'Json',
                                        data: {id_c: id_c, msg: msg},
                                        success: function (code_html, statut) {
                                           console.log(code_html);

                                        },
                                        error: function (resultat, statut, erreur) {
                                            console.log(erreur);
                                        },
                                        complete: function (resultat, statut) {
                                            console.log(statut);
                                        }
                                    });
                                }
        </script>
    </body>
</html>
