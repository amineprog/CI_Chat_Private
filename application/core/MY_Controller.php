<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of MY_Controller
 *
 * @author Developper: AmineRifi
 */
class MY_Controller extends CI_Controller {

    public $data = array();
    protected $Me;

    //private $myKey;

    public function __construct() {
        parent::__construct();
        $this->data['titre_site'] = 'Chat Private v1.0';
        $this->data['titre_page'] = '';
        $this->data['theme_default'] = 'default';
        $this->data['page'] = 'p_index';
        $this->data['erreurs'] = array();
    }

}
