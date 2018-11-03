<?php
class m_user extends CI_Model{

   function selectAll()
   {
      	$this->db->order_by("nama","desc"); 
      	return $this->db->get('user')->result();
   }
   
   
   function input()
   {
	      $this->db->trans_begin();
      	$idUser = $this->input->post('idUser');
        $noKtp=$this->input->post('noKtp');
      	$nama = $this->input->post('nama');
        $email=$this->input->post('email');
        $noHp=$this->input->post('noHp');
        $username=$this->input->post('username');
        $password=$this->input->post('password');

      	
      	$data = array( 'idUser'=>$idUser, 'noKtp'=>$noKtp, 'nama'=>$nama, 'email'=>$email, 'noHp'=>$noHp, 'username'=>$username, 'password'=>md5($password) );
      	$this->db->insert('user',$data);	
        $this->db->trans_commit();
   }


   function delete($idUser)
   {
        $this->db->trans_begin();
        $this->db->delete('user', array('idUser'=>$idUser));
        $this->db->trans_commit();
   }


   function updatePassword($idUser)
   {
        $this->db->trans_begin();

        $password=$this->input->post('password');
        $username=$this->input->post('username');
        $data = array('username'=>$username, 'password'=>md5($password));


        $this->db->where('idUser',$idUser)->update('user', $data);
        $this->db->trans_commit();
   }

   function update($idUser)
   {
        $this->db->trans_begin();
        $this->db->where('idUser',$idUser)->update('user', $_POST);
        $this->db->trans_commit();
   }



   function select($idUser)
   {
        return $this->db->get_where('user', array('idUser'=>$idUser))->row();
   }

   function count_all()
   {
        $this->db->select('idUser');
        $this->db->distinct();
        $this->db->from('user');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function getkodeunik($kode) { 

        $q = $this->db->query("SELECT MAX(RIGHT(idUser,2)) AS idmax FROM ".$kode);
        $kd = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = sprintf("%02s",$tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "01";
        }
        $kar = "U"; //karakter depan kodenya
        //gabungkan string dengan kode yang telah dibuat tadi
        return $kar.$kd;
   }


}
?>