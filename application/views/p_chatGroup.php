<input type="hidden" id="countMsg" name="countMsg" value="<?= $countConversations ?>">
<input type="hidden" id="currentGroup" name="currentGroup" value="<?= $idGroup ?>">
<?php
//var_dump($is_access[19]->_create); // hna b9iiiiiitttt
//var_dump($this->session->userdata('permissions'));
?>
<div class="row "> 
    <!--<h3 class="text-center" >Chat En Groupe</h3>    -->
    <div class="panel minimal minimal-gray">
        <div class="panel-heading">
            <div class="panel-title"><h4></h4></div>
            <div class="panel-options">
                <ul class="nav nav-tabs">
                    <?php if ($this->permission->has_role('cree_chat_groupe')) { ?>
                        <li><a href="#" class="btn btn-blue" id="createGroupShowModal" style="color: #000000;background-color: #308BC7;"><i class="fa fa-2x fa-plus"></i></a></li>
                    <?php } ?>
                    <?php foreach ($myGroups as $gr) { ?>
                        <li <?= ($idGroup == $gr->id) ? 'class="active"' : '' ?>><a id="<?= $gr->id . '_' . $countGroupLimit[$gr->id] ?>" class="GrNameSelect" href="<?= site_url('groupChat/index/' . $gr->id) ?>"><?= $gr->group_name ?></a></li>                        
                    <?php } ?>                        
                </ul>
            </div>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <?php if ($idGroup > 0 && ($groupeObj)) { ?>
                    <div class="tab-pane active" id="profile-1">
                        <div class="col-md-8">
                            <div class="panel panel-invert">
                                <div class="panel-heading">
                                    <?= ($groupeObj) ? $groupeObj->group_name : '' ?>
                                </div>
                                <div class="panel-body">                
                                    <ul class="media-list slimScrollDiv" id="msgContent" style="max-height: 650px;overflow-y: scroll;">
                                        <?php if ($countConversations > count($conversations)) { ?>
                                            <li class="media">
                                                <div class="media-body" style="text-align: center;">
                                                    <?= anchor('#', '<strong style="color: #ffffff;">Afficher plus ...</strong>') ?>
                                                </div>
                                            </li>
                                        <?php } ?>
                                        <?php foreach ($conversations as $conv) { ?>
                                            <li class="media">
                                                <div class="media-body">
                                                    <div class="media">
                                                        <a class="pull-left" href="#">
                                                            <img class="media-object img-circle " src="<?= site_url("profil/getMe/" . $conv['images'][1]) ?>" />
                                                        </a>
                                                        <div class="media-body" style="color: #FFFFFF;">
                                                            <?= $conv['message_text'] ?>
                                                            <br />
                                                            <small class="text-muted"><?= $conv['last_name'] . ' ' . $conv['first_name'] ?> | <?= date("Y-m-d H:i:s", $conv['message_date']) ?></small>
                                                            <hr />
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="msgTextValue" placeholder="Entrer un message ici" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-info" type="button" id="btnSendMsg">></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-invert">
                                <div class="panel-heading">
                                    Utilisateurs
                                </div>                                
                                <div class="panel-body">
                                    <ul class="media-list">
                                        <?php foreach ($usersGroup as $userGr): ?>
                                            <li class="media" id="liUser_<?= $userGr['id'] ?>">
                                                <div class="media-body">
                                                    <div class="media">
                                                        <a class="pull-left" href="#">
                                                            <img class="media-object img-circle" style="max-height:40px;" src="<?= site_url("profil/getMe/" . $userGr['images'][1]) ?>" />
                                                        </a>
                                                        <div class="media-body" >
                                                            <h5><strong style="color: #FFFFFF;"><?= $userGr['last_name'] . ' ' . $userGr['first_name'] ?> </strong>
                                                                <?php if ($is_admin_gr) { ?>
                                                                    <button id="btnRemoveUser" data-id="<?= $userGr['id'] ?>" class="btn btn-sm pull-right"><i class="entypo-cancel-squared"></i></button>
                                                                <?php } ?>
                                                            </h5>
                                                            <small class="text-muted"><?= $userGr['date_user'] ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                            </div>
                        </div>                    
                    </div>    
                <?php } ?> 
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
<?php if ($idGroup > 0 && ($groupeObj)) { ?>
        eachGroupName();
<?php } ?>
    $("#btnSendMsg").click(function () {
        var message_text = $("#msgTextValue").val();
        var currentGroup = $("#currentGroup").val();
        if (currentGroup.length > 0 && message_text.length > 1) {
            $.post("<?= site_url('groupChat/sendMsg') ?>", {id_group: currentGroup, message_text: message_text, csrf_ait_waryaghel: $("#csrf_ait_waryaghel").val()}, function (data) {
                //console.log(data);
                $("#msgTextValue").val("");
            }, "json");
        }
    });
<?php if ($idGroup > 0 && ($groupeObj)) { ?>
        setInterval("syncChat();", 1000);
        setInterval("eachGroupName();", 5000);
<?php } ?>
    $("#msgContent").scrollTop($("#msgContent").height());
    $("#createGroupShowModal").click(function () {
        $("#modalChatGroupe").modal('show');
    });
    //$("#msgContent").scrollTop($("#msgContent").height()*2);
    $("#msgTextValue").keypress(function (e) {
        var key = e.which;
        if (key == 13) {
            $("#btnSendMsg").trigger('click');
        }
    });
<?php if ($is_admin_gr) { ?>
        $("button#btnRemoveUser").click(function () {
            var id = $(this).data('id');
            var currentGroup = $("#currentGroup").val();
            $("#liUser_" + id).css("background-color", "#FFFFFF");
            if (id && id > 0 && currentGroup > 0) {
                $.post("<?= site_url('groupChat/removeFromGroupe') ?>", {currentGroup: currentGroup, id: id, csrf_ait_waryaghel: $("#csrf_ait_waryaghel").val()}, function (data) {
                    if (data == true) {
                        $("#liUser_" + id).remove();
                    }
                }, "json");
            }
        });
<?php } ?>
    function syncChat() {
        var currentCount = $("#countMsg").val();
        var currentGroup = $("#currentGroup").val();
        if (currentCount && currentGroup) {
            $.post("<?= site_url('groupChat/getCount') ?>", {currentCount: currentCount, currentGroup: currentGroup, csrf_ait_waryaghel: $("#csrf_ait_waryaghel").val()}, function (data) {
                if (data.limit > 0) {
                    $("#msgContent").append(data.string);
                    $("#countMsg").val(data.newCount);
                    //console.log(data);
                    $("#msgContent").scrollTop($("#msgContent").height() * 5);
                }
            }, "json");
        }
    }
    function eachGroupName() {
        var currentGroupPo = $("#currentGroup").val();
        var idArray = new Array();
        $.each($(".GrNameSelect"), function () {
            var dataGroup = $(this).attr('id').split('_');
            var currentGroup = dataGroup[0];
            var currentCount = dataGroup[1];
            if (currentCount && currentGroup && currentGroupPo != currentGroup) {
                $.post("<?= site_url('groupChat/getCountOther') ?>", {currentCount: currentCount, currentGroup: currentGroup, csrf_ait_waryaghel: $("#csrf_ait_waryaghel").val()}, function (data) {
                    if (data.limit > 0) {
                        //console.log(data.newCount);
                        //console.log(data.limit);
                        //$("#" + currentGroup + '_' + currentCount).attr('id', currentGroup + '_' + data.newCount);
                        $("#badgeAlertlimit_" + currentGroup).remove();
                        var badge = '  <span id="badgeAlertlimit_' + currentGroup + '" class="badge badge-success">' + data.limit + '</span>';
                        //$(document).prop('title', $(document).attr('title') + '_ (' + data.limit +')');
                        $("#" + currentGroup + '_' + currentCount).html($("#" + currentGroup + '_' + currentCount).html() + badge);
                        /*if (currentGroupPo == currentGroup) {
                         $("#" + currentGroup + '_' + currentCount).attr('id', currentGroup + '_' + data.newCount);
                         }*/
                    }
                }, "json");
            }
        });
        if (idArray.length > 0) {
            console.log(idArray);
        }
    }

</script>