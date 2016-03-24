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
        $id = $this->input->get('id_c');
        $start = $this->input->get('start');
        $limit = $this->input->get('limit');
        echo json_encode($this->getConversation(intval($id), intval($start), intval($limit))->result());
    }

}
