<?php
class m_pelanggan extends CI_Model{

   function selectAll()
   {
      	$this->db->order_by("nama","desc"); 
      	return $this->db->get('pelanggan')->result();
   }
   
   
   function input()
   {
	      $this->db->trans_begin();
      	$idPelanggan = $this->input->post('idPelanggan');
      	$nama = $this->input->post('nama');
      	$noKtp=$this->input->post('noKtp');
      	$data = array( 'idPelanggan'=>$idPelanggan, 'nama'=>$nama, 'noKtp'=>$noKtp );
      	$this->db->insert('pelanggan',$data);	
        $this->db->trans_commit();
   }


   function delete($idPelanggan)
   {
        $this->db->trans_begin();
        $this->db->delete('pelanggan', array('idPelanggan'=>$idPelanggan));
        $this->db->trans_commit();
   }


   function update($idPelanggan)
   {
        $this->db->trans_begin();
        $this->db->where('idPelanggan',$idPelanggan)->update('pelanggan', $_POST);
        $this->db->trans_commit();
   }


   function select($idPelanggan)
   {
        return $this->db->get_where('pelanggan', array('idPelanggan'=>$idPelanggan))->row();
   }

   function count_all()
   {
        $this->db->select('idPelanggan');
        $this->db->distinct();
        $this->db->from('pelanggan');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function getkodeunik($kode) { 

        $q = $this->db->query("SELECT MAX(RIGHT(idPelanggan,2)) AS idmax FROM ".$kode);
        $kd = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = sprintf("%02s",$tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "01";
        }
        $kar = "P"; //karakter depan kodenya
        //gabungkan string dengan kode yang telah dibuat tadi
        return $kar.$kd;
   }


}
?>