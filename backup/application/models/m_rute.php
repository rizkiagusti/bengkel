<?php
class m_rute extends CI_Model{

   function selectAll()
   {
    	$this->db->order_by("rutePP","desc"); 
    	return $this->db->get('rute')->result();
   }


   function input()
   {
    	$idRute = $this->input->post('idRute');
    	$rutePP = $this->input->post('rutePP');
    	$harga=$this->input->post('harga');
    	$data = array( 'idRute'=>$idRute, 'rutePP'=>$rutePP, 'harga'=>$harga );
    	$this->db->insert('rute',$data);	
   }

   function delete($idRute)
   {
        $this->db->delete('rute', array('idRute'=>$idRute));
   }

   function update($idRute)
   {
        $this->db->where('idRute',$idRute)->update('rute', $_POST);
   }

   function select($idRute)
   {
        return $this->db->get_where('rute', array('idRute'=>$idRute))->row();
   }

   function getkodeunik($kode) { 

        $q = $this->db->query("SELECT MAX(RIGHT(idRute,2)) AS idmax FROM ".$kode);
        $kd = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = sprintf("%02s",$tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "01";
        }
        $kar = "R"; //karakter depan kodenya
        //gabungkan string dengan kode yang telah dibuat tadi
        return $kar.$kd;
   }

   function getRute()
   {
        $result = $this->db->get('rute')->result();;
        $idRute = array('0');
        $rutePP = array('Pilih Rute');
        for ($i = 0; $i < count($result); $i++)
        {
            array_push($idRute, $result[$i]->idRute);
            array_push($rutePP, $result[$i]->rutePP);
        }
        return array_combine($idRute, $rutePP);
   }

}
?>