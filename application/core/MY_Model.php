<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of MY_Model
 *
 * @author Developper : AmineRifi
 */
class MY_Model extends CI_Model {

    protected $table_nom = "";
    protected $table_id = "";
    protected $table_order = "";
    protected $table_orderValue = "desc";
    protected $roles = array();

    public function __construct() {
        parent::__construct();
    }

    // Les methodes de seletion
    public function get($id = null, $single = false) {
        $resultats = NULL;
        $this->db->order_by($this->table_order, $this->table_orderValue);
        if ($id === NULL) {
            if ($single === FALSE) {
                $resultats = $this->db->get($this->table_nom)->result();
            } else {
                $resultats = $this->db->get($this->table_nom)->row();
            }
        } else {
            $resultats = $this->db->get_where($this->table_nom, array($this->table_id => $id))->row();
        }
        return $resultats;
    }
    public function get_array($id = null, $single = false) {
        $resultats = NULL;
        $this->db->order_by($this->table_order, $this->table_orderValue);
        if ($id === NULL) {
            if ($single === FALSE) {
                $resultats = $this->db->get($this->table_nom)->result_array();
            } else {
                $resultats = $this->db->get($this->table_nom)->row();
            }
        } else {
            $resultats = $this->db->get_where($this->table_nom, array($this->table_id => $id))->row();
        }
        return $resultats;
    }
    public function get_by($where = null, $single = FALSE) {
        $this->db->where($where);
        return $this->get(null, $single);
    }
    public function get_by_array($where = null, $single = FALSE) {
        $this->db->where($where);
        return $this->get_array(null, $single);
    }
    // \\ Les methodes de selection   
    //methodes d'insertion()

    public function save($data) {
        $id = -1;
        $this->db->trans_start();
        $this->db->set($data);
        $this->db->insert($this->table_nom);
        $id = $this->db->insert_id();
        $this->db->trans_complete();
        return $id;
    }

    public function update($data, $id) {
        $this->db->trans_start();
        $this->db->where($this->table_id, $id);
        $this->db->set($data);
        $this->db->update($this->table_nom);
        $this->db->trans_complete();
        return $id;
    }

    // \\methodes d'insertion
    //la methodes de suppression

    public function delete($id) {
        $this->db->trans_start();
        $this->db->where($this->table_id, $id);
        $this->db->delete($this->table_nom);
        $this->db->trans_complete();
        return $id;
    }

    public function vider() {
        $this->db->empty_table($this->table_nom);
    }

    //methode pour recuperer les variables formulaire

    public function array_post($post) {
        $data = array();
        foreach ($post as $x) {
            $data[$x] = $this->input->post($x);
        }
        return $data;
    }

}
