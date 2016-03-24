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
        $conversation = $this->ChatModel->getConversation($id)->result();
        var_dump($conversation);
        foreach ($conversation as $conv) {
            //var_dump($conv);
            $messages = $this->ChatModel->getMessage($conv->c_id);
            var_dump($messages->result());
            echo '<hr>';
        }
        echo count($conversation);
        die();
        $this->data['users'] = $this->UserModel->get();
        $this->load->view('v_index_1', $this->data);
    }

    public function time() {
        
    }

}
