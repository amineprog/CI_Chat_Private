<?php

/**
 * Description of m_users
 *
 * @author AMINE IT
 */
class UserModel extends MY_Model {

    protected $table_nom = "users";
    protected $table_id = "id";
    protected $table_order = "id";
    protected $table_orderValue = "desc";
    protected $roles = array();

    public function __construct() {
        parent::__construct();
    }

}
