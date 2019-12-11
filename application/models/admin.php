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
    public function get_user()
    {
        $sql = $this->db->query("SELECT * from tb_user");
        return $sql;
    }
        public function get_pengarang()
    {
        $sql = $this->db->query("SELECT * from tb_pengarang");
        return $sql;
    }

    public function get_peminjam(){
        $sql = $this->db->query("SELECT a.id_peminjam,c.nama_user,d.judul,a.start,a.end  FROM tb_peminjam AS a
        INNER JOIN tb_pengunjung AS b ON a.id_visitor = b.id_visitor
        INNER JOIN tb_user AS c ON b.id_user = c.id_user
        INNER JOIN tb_buku AS d ON a.id_buku = d.id_buku");
        return $sql;
    }
    
    public function get_pengunjung(){
        $sql = $this->db->query("SELECT a.id_visitor , b.nama_user , a.tanggal FROM tb_pengunjung AS a 
            INNER JOIN tb_user AS b ON a.id_user=b.id_user");
        return $sql;
    }

    public function added_pengunjung($data) {
        $this->db->insert('tb_pengunjung', $data);
        return $this->db->insert_id();
    }

    function input_data($data)
    {
        $query = "insert into tb_buku values('','$judul','$isbn','$genre','$id_pengarang')";
        $this->db->query($query);
    }
    public function added_buku($data) {
        $this->db->insert('tb_buku', $data);
        return $this->db->insert_id();
    }
        public function get_edit_buku($id_buku) {
        $this->db->from('tb_buku');
        $this->db->where('id_buku', $id_buku);
        $query = $this->db->get();
        return $query->row();
    }
    public function edit_buku($where, $data) {
        $this->db->update('tb_buku', $data, $where);
        return $this->db->affected_rows();
    }
    public function delete_buku($id_buku) {
        $sql = "DELETE FROM tb_buku  WHERE id_buku = '" . $id_buku . "'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function added_user($data) {
        $this->db->insert('tb_user', $data);
        return $this->db->insert_id();
    }

    public function get_user_edit($id_user){
        $this->db->from('tb_user');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_user($where, $data){
        $this->db->update('tb_user', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_user($id_user) {
        $sql = "DELETE FROM tb_user WHERE id_user = '" . $id_user . "'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function added_pengarang($data) {
        $this->db->insert('tb_pengarang', $data);
        return $this->db->insert_id();
    }

    public function get_pengarang_edit($id_pengarang){
        $this->db->from('tb_pengarang');
        $this->db->where('id_pengarang', $id_pengarang);
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_pengarang($where, $data){
        $this->db->update('tb_pengarang', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_pengarang($id_pengarang) {
        $sql = "DELETE FROM tb_pengarang WHERE id_pengarang = '" . $id_pengarang . "'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function added_peminjam($data) {
        $this->db->insert('tb_peminjam', $data);
        return $this->db->insert_id();
    }

    public function get_peminjam_edit($id_peminjam){
        $this->db->from('tb_peminjam');
        $this->db->where('id_peminjam', $id_peminjam);
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_peminjam($where, $data){
        $this->db->update('tb_peminjam', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_peminjam($id_peminjam) {
        $sql = "DELETE FROM tb_peminjam WHERE id_peminjam = '" . $id_peminjam . "'";
        $query = $this->db->query($sql);
        return $query;
    }
}
?>