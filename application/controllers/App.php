<?php

/**
 * Description of App
 *
 * @author AMINE IT
 */
class App extends MY_Controller {

    public $UserModel = null;
    public $ChatModel = null;
    public $id = null;

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel', $this->UserModel);
        $this->load->model('ChatModel', $this->ChatModel);
        $this->id = 1;
    }

    public function index($id = 1) {
        echo time();
        $this->data['conversations'] = $this->ChatModel->getConversation($this->id);
        $conversationCount = $this->data['conversations']->num_rows();
        $this->data['conversations'] = $this->data['conversations']->result_array();
        if ($conversationCount > 0) {
            for ($i = 0; $i < $conversationCount; $i++) {
                $this->data['conversations'][$i]['last'] = $this->getConversation($this->data['conversations'][$i]['c_id'], 0, 1)->row();
                $this->data['conversations'][$i]['unread'] = $this->ChatModel->getUnread($this->data['conversations'][$i]['c_id'])->row();
            }
        }
        $this->data['currentConversation'] = $this->id;
        $this->data['users'] = $this->UserModel->get();
        $this->load->view('v_index_1', $this->data);
    }

    public function getConversation($id = 1, $start = 0, $limit = 2) {
        return $this->ChatModel->getMessage($id, $start, $limit);
    }

    public function getMsg() {
        $id = $this->input->post('id_c');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $data = $this->getConversation(intval($id), intval($start), intval($limit))->result();
        $str = "";
        foreach ($data as $dt) {
            $str .= "    <li class='left clearfix' ng-repeat='message in messages'>
                                <span class='chat-img pull-left'>
                                    <img src='http://bootdey.com/img/Content/user_3.jpg' alt='User Avatar'>
                                </span>
                                <div class='chat-body clearfix'>
                                    <div class='header'>
                                        <strong class='primary-font'>{{message.first_name}}</strong>
                                        <small class='pull-right text-muted'><i class='fa fa-clock-o'></i> 12 mins ago</small>
                                    </div>
                                    <p>
                                        {{message.reply}}
                                    </p>
                                </div>
                            </li>";
        }
        $out['str'] = $str;
        $out['count'] = count($data);
        echo json_encode($out);
    }

    public function pushMsg() {
        //$postdata = file_get_contents("php://input");
        $msg = $this->input->post('msg');
        $id_c = $this->input->post('id_c');
        if (is_numeric($id_c) && strlen($msg) > 0) {
            
        }
        //$request = json_decode($postdata);
        echo json_encode($postdata);
    }

}
