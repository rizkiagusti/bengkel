<?php
class m_jadwal extends CI_Model{

   function selectAll()
   {  
      $query = ('SELECT * FROM jadwal');
    	return $this->db->query($query);
   }

  
   
   
   function input()
   {
	    $this->db->trans_begin();
    	$idJadwal = $this->input->post('idJadwal');
    	$tgl = $this->input->post('tgl');
      $kuota=$this->input->post('kuota');
    	$data = array( 'idJadwal'=>$idJadwal, 'tgl'=>$tgl, 'kuota'=>$kuota);
    	$this->db->insert('jadwal',$data);	
      $this->db->trans_commit();
   }


   function delete($idJadwal)
   {
        $this->db->trans_begin();
        $this->db->delete('jadwal', array('idJadwal'=>$idJadwal));
        $this->db->trans_commit();
   }

   
   function update($idJadwal)
   {
        $this->db->trans_begin();
        $idJadwal = $this->input->post('idJadwal');
        $tgl = $this->input->post('tgl');
        $kuota=$this->input->post('kuota');
        $data = array('tgl'=>$tgl, 'kuota'=>$kuota );
        $this->db->where('idJadwal',$idJadwal)->update('jadwal', $data);
        $this->db->trans_commit();
   }
    
  

   function select($idJadwal)
   {
        return $this->db->get_where('jadwal', array('idJadwal'=>$idJadwal))->row();
   }
  

   function getkodeunik($kode) { 

        $q = $this->db->query("SELECT MAX(RIGHT(idJadwal,2)) AS idmax FROM ".$kode);
        $kd = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = sprintf("%02s",$tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "01";
        }
        $kar = "J"; //karakter depan kodenya
        //gabungkan string dengan kode yang telah dibuat tadi
        return $kar.$kd;
   }


}
?>