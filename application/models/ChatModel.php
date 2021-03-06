<?php

/**
 * Description of ChatModel
 *
 * @author AMINE IT
 */
class ChatModel extends MY_Model {

    protected $table_nom = "";
    protected $table_id = "";
    protected $table_order = "";
    protected $table_orderValue = "desc";
    protected $roles = array();

    public function __construct() {
        parent::__construct();
    }

    public function getConversation($id, $start = 0, $limit = 5) {
        $sql = 'SELECT U.id,C.c_id,U.username,U.email,U.first_name,U.last_name 
                FROM users U,conversation C
                WHERE 
                CASE
                WHEN C.user_one = ?
                THEN C.user_two = U.id
                WHEN C.user_two = ?
                THEN C.user_one= U.id
                END             
                AND
                (C.user_one = ? OR C.user_two = ?) ORDER BY C.c_id DESC 
                LIMIT ?, ?
                ';
        return $this->db->query($sql, array($id, $id, $id, $id, $start, $limit));
    }

    public function getMessage($id_c, $start = 0, $limit = 2) {
        $sql = 'SELECT R.cr_id,R.time,R.reply,U.id,U.username,U.email,U.first_name,U.last_name 
                FROM users U, conversation_reply R 
                WHERE R.user_id_fk=U.id AND R.c_id_fk=?
                ORDER BY R.cr_id DESC 
                LIMIT ?, ?'
        ;
        return $this->db->query($sql, array($id_c, $start, $limit));
    }

    public function getUnread($id_c) {
        $sql = "SELECT COUNT(cr_id) AS TOTAL FROM conversation_reply WHERE c_id_fk =? AND _read=0";
        return $this->db->query($sql, array($id_c));
    }

}
