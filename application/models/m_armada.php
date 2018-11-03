<?php
class m_armada extends CI_Model{

   function selectAll()
   {
      $query = ('SELECT armada.idArmada,armada.namaKen,armada.noPol,armada.max,rute.rutePP FROM armada,rute where armada.idRute = rute.idRute');
    	return $this->db->query($query);
   }

   
   function input()
   {
	    $this->db->trans_begin();
    	$idArmada = $this->input->post('idArmada');
    	$namaKen = $this->input->post('namaKen');
      $noPol = $this->input->post('noPol');
      $max = $this->input->post('max');
    	$idRute=$this->input->post('rute');

    	$data = array( 'idArmada'=>$idArmada, 'namaKen'=>$namaKen, 'noPol'=>$noPol, 'max'=>$max, 'idRute'=>$idRute );
    	$this->db->insert('armada',$data);	
      $this->db->trans_commit();
   }


   function delete($idArmada)
   {
        $this->db->trans_begin();
        $this->db->delete('armada', array('idArmada'=>$idArmada));
        $this->db->trans_commit();
   }


   function update($idArmada)
   {
      $this->db->trans_begin();
      $idArmada = $this->input->post('idArmada');
      $namaKen = $this->input->post('namaKen');
      $noPol = $this->input->post('noPol');
      $max = $this->input->post('max');
      $idRute=$this->input->post('rute');

      $data = array('namaKen'=>$namaKen, 'noPol'=>$noPol, 'max'=>$max, 'idRute'=>$idRute);
      $this->db->where('idArmada',$idArmada)->update('armada', $data);
      $this->db->trans_commit();
   }


   function select($idArmada)
   {
        return $this->db->get_where('armada', array('idArmada'=>$idArmada))->row();
   }

   
   function getkodeunik($kode) { 

        $q = $this->db->query("SELECT MAX(RIGHT(idArmada,2)) AS idmax FROM ".$kode);
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