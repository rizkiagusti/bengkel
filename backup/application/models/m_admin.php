<?php
class m_admin extends CI_Model{

   function selectAll()
   {
      	$this->db->order_by("nama","desc"); 
      	return $this->db->get('admin')->result();
   }
   
   
   function input()
   {
	      $this->db->trans_begin();
      	$idAdmin = $this->input->post('idAdmin');
        $noKtp=$this->input->post('noKtp');
      	$nama = $this->input->post('nama');
        $email=$this->input->post('email');
        $noHp=$this->input->post('noHp');
        $username=$this->input->post('username');
        $password=$this->input->post('password');

      	
      	$data = array( 'idAdmin'=>$idAdmin, 'noKtp'=>$noKtp, 'nama'=>$nama, 'email'=>$email, 'noHp'=>$noHp, 'username'=>$username, 'password'=>md5($password) );
      	$this->db->insert('admin',$data);	
        $this->db->trans_commit();
   }


   function delete($idAdmin)
   {
        $this->db->trans_begin();
        $this->db->delete('admin', array('idAdmin'=>$idAdmin));
        $this->db->trans_commit();
   }


   function updatePassword($idAdmin)
   {
        $this->db->trans_begin();

        $password=$this->input->post('password');
        $username=$this->input->post('username');
        $data = array('username'=>$username, 'password'=>md5($password));


        $this->db->where('idAdmin',$idAdmin)->update('admin', $data);
        $this->db->trans_commit();
   }

   function update($idAdmin)
   {
        $this->db->trans_begin();
        $this->db->where('idAdmin',$idAdmin)->update('admin', $_POST);
        $this->db->trans_commit();
   }



   function select($idAdmin)
   {
        return $this->db->get_where('admin', array('idAdmin'=>$idAdmin))->row();
   }

   function count_all()
   {
        $this->db->select('idAdmin');
        $this->db->distinct();
        $this->db->from('admin');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function getkodeunik($kode) { 

        $q = $this->db->query("SELECT MAX(RIGHT(idAdmin,2)) AS idmax FROM ".$kode);
        $kd = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = sprintf("%02s",$tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "01";
        }
        $kar = "A"; //karakter depan kodenya
        //gabungkan string dengan kode yang telah dibuat tadi
        return $kar.$kd;
   }


}
?>