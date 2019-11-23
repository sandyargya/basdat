<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model
{
    //fungsi cek session logged in
    function is_logged_in()
    {
        return $this->session->userdata('user_id');
    }

    //fungsi cek level
    function is_role()
    {
        return $this->session->userdata('role');
    }

    //fungsi check login
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_book()
    {
        $sql = $this->db->query("SELECT * FROM tb_buku b
                LEFT JOIN tb_pengarang p ON b.id_pengarang = p.id_pengarang");
        return $sql;
    }

    public function delete($data){ 
        $this->db->where('buku',$data);
        $this->db->delete('tb_buku');

    }

    public function get_user()
    {
        $sql = $this->db->query("SELECT * from tb_user");
        return $sql;
    }
}