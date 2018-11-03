<?php
class m_kendaraan extends CI_Model{

   function tampil($idUser)
   {
      
      $this->db->select('*');
      $this->db->from('kendaraan');
      $this->db->where('idUser',$idUser);
            
      $query = $this->db->get();
      return $query;

   }

   
   function input()
   {
	    $this->db->trans_begin();
    	$idKen = $this->input->post('idKen');
    	$nama = $this->input->post('nama');
      $noPol = $this->input->post('noPol');
      $idUser=$this->input->post('idUser');

    	$data = array( 'idKen'=>$idKen, 'noPol'=>$noPol, 'nama'=>$nama, 'idUser'=>$idUser );
    	$this->db->insert('kendaraan',$data);	
      $this->db->trans_commit();
   }

   
   function delete($idKen)
   {
        $this->db->trans_begin();
        $this->db->delete('kendaraan', array('idKen'=>$idKen));
        $this->db->trans_commit();
   }

   
   function update($idKen)
   {
      $this->db->trans_begin();
      $nama = $this->input->post('nama');
      $noPol = $this->input->post('noPol');
      $idUser=$this->input->post('idUser');

      $data = array('noPol'=>$noPol, 'nama'=>$nama, 'idUser'=>$idUser );
      $this->db->where('idKen',$idKen)->update('kendaraan', $data);
      $this->db->trans_commit();
   }



   function select($idKen)
   {
        return $this->db->get_where('kendaraan', array('idKen'=>$idKen))->row();
   }

  
   
   function getkodeunik($kode) { 

        $q = $this->db->query("SELECT MAX(RIGHT(idKen,2)) AS idmax FROM ".$kode);
        $kd = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = sprintf("%02s",$tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "01";
        }
        $kar = "K"; //karakter depan kodenya
        //gabungkan string dengan kode yang telah dibuat tadi
        return $kar.$kd;
   }
   

}
?>