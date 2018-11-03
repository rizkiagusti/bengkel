<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_login extends CI_Model{
    public $table = 'user';
    function __construct()
    {
        
    }
 
    function cek_user($username,$password)
    {
        $query = $this->db->get_where($this->tbl,array('username' => $username, 'password' => $password));
        $query = $query->result_array();
        return $query;
    }
    function ambil_user($username)
        {
        $query = $this->db->get_where($this->tbl, array('username' => $username));
        $query = $query->result_array();
        if($query){
            return $query[0];
        }
    }
    function ambil($id){
        return $this->db->get_where('user', array('idUser'=>$id));
    }   

        public function getPengguna($username, $password){
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $query = $this->db->get();
            return $query;
        }

        public function data($username){
            $this->db->select('*');
            $this->db->where('username', $username);
            $query = $this->db->get('user');
            return $query->row();
        }
        
        function updateProfile($data,$idUser){
            
            $this->db->where('idUser',$idUser);
            $this->db->update('user',$data);
        }
}