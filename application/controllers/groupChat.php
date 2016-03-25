<?php

/**
 * Description of groupChat
 *
 * @author amineRifi
 */
class groupChat extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('login', 'refresh');
        }
    }

    public function index($idGroup = 0) {
        
        $this->load->model('m_group_chat');
        $this->data['myFriends'] = $this->m_group_chat->getFriends($this->ion_auth->user()->row()->id)->result();
        $myGroups = $this->m_group_chat->getMyGroups($this->ion_auth->user()->row()->id);
        $this->data['myGroups'] = $myGroups->result();
        //var_dump($this->data['myFriends']);die();
        $this->data['usersGroup'] = NULL;
        $this->data['conversations'] = NULL;
        $this->data['countConversations'] = NULL;
        $this->data['is_admin_gr'] = FALSE;
        $this->data['groupeObj'] = NULL;
        $this->data['countGroupLimit'] = NULL;
        if ($idGroup > 0) {
            $groupId = $idGroup;
        } elseif (count($this->data['myGroups']) > 0) {
            $idGroup = $groupId = $this->data['myGroups'][count($this->data['myGroups']) - 1]->id;
        }
        $this->data['idGroup'] = $idGroup;
        if ($idGroup > 0) {
            $usersGroup = $this->m_group_chat->getGroupUsers($groupId, 'users.id, users.guid, users.username,users.last_name, users.first_name, group_message_users.add_date, users.is_online');
            $this->data['usersGroup'] = $this->buildUsers($usersGroup->result_array());
            $this->data['conversations'] = $this->decryptMsg($this->m_group_chat->getMsgGroup($groupId, 30, 0)->result_array());
            $this->buildMsgs($this->data['conversations']);
            $this->data['countConversations'] = $this->m_group_chat->get_count_chat($groupId)->row()->total;
            $this->data['groupeObj'] = $this->m_group_chat->get($idGroup, TRUE);
            $this->data['is_admin_gr'] = (($this->data['groupeObj']) && $this->data['groupeObj']->admin_users == $this->ion_auth->user()->row()->id) ? TRUE : FALSE;
            $this->data['countGroupLimit'] = $this->getCountGroup($myGroups->result_array(), $this->data['groupeObj']->id);
        }
        $this->data['page'] = 'p_chatGroup';
        $this->data['sideBar'] = $this->createSideBar('chatGroup');
        $this->data['titre_page'] = 'Chat en groupe';
        $this->data['css_add'] .=$this->userCss();
        $this->data['css_bottom'] .=$this->userJs();
        $this->data['modals'] = 'chatgroup_modal';
        $this->load->view('_layout', $this->data);
    }

    private function decryptMsg($conversations) {
        for ($i = 0; $i < count($conversations); $i++) {
            $conversations[$i]['message_text'] = $this->decryptRif($conversations[$i]['message_text']);
        }
        return $conversations;
    }

    public function createGroup() {
        $group_name = $this->input->post('group_name');
        $userArray = $this->input->post('users_id');
        if ($group_name && strlen($group_name) > 2) {
            $this->load->model('m_group_chat');
            $data = array(
                'group_name' => $group_name,
                'admin_users' => $this->ion_auth->user()->row()->id
            );
            $idGroup = $this->m_group_chat->save($data);
            if ($idGroup > 0) {
                array_push($userArray, $data['admin_users']);
                $this->m_group_chat->addUsers($userArray, $idGroup);
                redirect('groupChat/index/' . $idGroup);
            } else {
                die('Erreur de création groupe');
            }
        } else {
            die('Erreur de création groupe');
        }
    }

// get count des groupes limit
    public function getCountGroup($groupArray) {
        $out = array();
        for ($i = 0; $i < count($groupArray); $i++) {
            $out[$groupArray[$i]['id']] = $this->m_group_chat->get_count_chat($groupArray[$i]['id'])->row()->total;
        }
        return $out;
    }

// build {    
    public function buildUsers($array) {
        $outArray = array();
        for ($i = 0; $i < count($array); $i++) {
            $outArray[$i] = $array[$i];
            $outArray[$i]['images'] = $this->getUserImages($array[$i]['id']);
            $outArray[$i]['date_user'] = $this->get_timeago(strtotime($array[$i]['add_date']));
        }
        return $outArray;
    }

    public function buildMsgs(&$conversations) {
        $out = $conversations;
        $x = count($conversations) - 1;
        for ($i = 0; $i < count($out); $i++) {
            $out[$i]['images'] = $this->getUserImages($out[$i]['user_id']);
            $conversations[$x] = $out[$i];
            $x--;
        }
        //$conversations = $out;
    }

    public function buildMsgs2(&$conversations) {
        $out = $conversations;
        $x = count($conversations) - 1;
        for ($i = 0; $i < count($out); $i++) {
            $out[$i]['images'] = $this->getUserImages($out[$i]['user_id']);
            // $conversations[$x] = $out[$i];
            $x--;
        }
        $conversations = $out;
    }

    public function sendMsg() {
        $idGroup = $this->input->post('id_group');
        $message_text = $this->input->post('message_text');
        if (is_numeric($idGroup) && intval($idGroup) > 0 && $message_text && strlen(trim($message_text)) > 1) {
            $data = array(
                'message_text' => $this->cryptRif($message_text),
                'message_date' => time(),
                'users_id' => $this->ion_auth->user()->row()->id,
                'group_chat_id' => $idGroup
            );
            $this->load->model('m_message_group');
            echo json_encode((($this->m_message_group->save($data) > 0) ? $data : null));
        }
    }

    public function _pushMsg() {
        $idGroup = $this->input->post('id_group');
        $message_text = $this->input->post('message_text');
        $users_id = $this->input->post('users_id');
        $string = ' <li class="media">
                        <div class="media-body">
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object img-circle " src="assets/img/user.png" />
                                </a>
                                <div class="media-body" >
                                ' . $this->decryptRif($message_text) . '
                                    <br />
                                   <small class="text-muted">Alex Deo | 23rd June at 5:00pm</small>
                                    <hr />
                                </div>
                            </div>
                        </div>
                   </li>';
        echo json_encode($string);
    }

    public function syncMsg($idGroup, $limit, $offset) {
        $this->load->model('m_group_chat');
        $conversations = $this->m_group_chat->getMsgGroup2($idGroup, $limit)->result_array();
        $this->buildMsgs($conversations);
        $string = "";
        foreach ($conversations as $conv) {
            $string .= '<li class="media">
                            <div class="media-body">
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-circle " src="' . site_url("profil/getMe/" . $conv['images'][1]) . '" />
                                    </a>
                                    <div class="media-body" style="color: #FFFFFF;">
                                    ' . $this->decryptRif($conv['message_text']) . '
                                        <br />
                                       <small class="text-muted">' . $conv['last_name'] . ' ' . $conv['first_name'] . ' | ' . date("Y-m-d H:i:s", $conv['message_date']) . '</small>
                                        <hr />
                                    </div>
                                </div>
                            </div>
                        </li>';
        }
        return $string;
    }

    public function getCount() {
        $idGroup = $this->input->post('currentGroup');
        $currentCount = $this->input->post('currentCount');
        $this->load->model('m_group_chat');
        $newCount = $this->m_group_chat->get_count_chat($idGroup)->row()->total;
        $limit = $newCount - $currentCount;
        $out['limit'] = 0;
        if ($limit > 0) {
            $out['limit'] = $limit;
            $out['newCount'] = $newCount;
            $out['string'] = $this->syncMsg($idGroup, $limit, $currentCount);
        }
        echo json_encode($out);
    }

    public function getCountOther() {
        $idGroup = $this->input->post('currentGroup');
        $currentCount = $this->input->post('currentCount');
        $this->load->model('m_group_chat');
        $newCount = $this->m_group_chat->get_count_chat($idGroup)->row()->total;
        $limit = $newCount - $currentCount;
        $out['limit'] = 0;
        if ($limit > 0) {
            $out['limit'] = $limit;
            $out['newCount'] = $newCount;
            //$out['string'] = $this->syncMsg($idGroup, $limit, $currentCount);
        }
        echo json_encode($out);
    }

    public function removeFromGroupe() {
        if (!$this->input->is_ajax_request()) {
            exit('Pas d\'accès de script directe permis');
        }
        $currentGroup = $this->input->post('currentGroup');
        $id_user = $this->input->post('id');
        if ($currentGroup > 0 && $id_user > 0) {
            $this->load->model('m_group_chat');
            echo json_encode($this->m_group_chat->removeUser($id_user, $currentGroup));
        }
    }

    private function userCss() {
        return '<link rel="stylesheet" href="' . site_url('assets/js/select2/select2-bootstrap.css') . '">
	<link rel="stylesheet" href="' . site_url('assets/js/select2/select2.css') . '">
	<link rel="stylesheet" href="' . site_url('assets/js/selectboxit/jquery.selectBoxIt.css') . '">';
    }

    private function userJs() {
        return '<script src="' . site_url('assets/js/jquery.multi-select.js') . '"></script>	
            <script src="' . site_url('assets/js/select2/select2.min.js') . '"></script>
	<script src="' . site_url('assets/js/bootstrap-tagsinput.min.js') . '"></script>
	
	<script src="' . site_url('assets/js/selectboxit/jquery.selectBoxIt.min.js') . '"></script>'
                . '<script src="' . site_url('assets/js/jquery.validate.min.js') . '"></script>'
                . '<script src="' . site_url('assets/js/bootstrap-switch.min.js') . '"></script>';
    }

}
