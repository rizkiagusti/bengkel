<?php
class m_pegawai extends CI_Model{

   function selectAll()
   {
      	$this->db->order_by("nama","desc"); 
      	return $this->db->get('pegawai')->result();
   }
   
   function input()
   {
	       
      	$idPegawai = $this->input->post('idPegawai');
      	$nama = $this->input->post('nama');
      	$username=$this->input->post('username');
        $password=$this->input->post('password');
        $email=$this->input->post('email');

      	$data = array( 'idPegawai'=>$idPegawai, 'nama'=>$nama, 'username'=>$username, 'password'=>$password, 'email'=>$email );
      	$this->db->insert('pegawai',$data);	
   }


   function delete($idPegawai)
   {
        $this->db->delete('pegawai', array('idPegawai'=>$idPegawai));
   }


   function update($idPegawai)
   {
        $this->db->where('idPegawai',$idPegawai)->update('pegawai', $_POST);
   }


   function select($idPegawai)
   {
        return $this->db->get_where('pegawai', array('idPegawai'=>$idPegawai))->row();
   }

   function count_all()
   {
        $this->db->select('idPegawai');
        $this->db->distinct();
        $this->db->from('pegawai');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function getkodeunik($kode) { 

        $q = $this->db->query("SELECT MAX(RIGHT(idPegawai,2)) AS idmax FROM ".$kode);
        $kd = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = sprintf("%02s",$tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "01";
        }
        $kar = "G"; //karakter depan kodenya
        //gabungkan string dengan kode yang telah dibuat tadi
        return $kar.$kd;
   }


}
?>