<?php
class m_pesan extends CI_Model{

   
   function selectAll()
   {
      $query = ('SELECT distinct pesan.*,pelanggan.nama,jadwal.tgl,rute.* FROM pesan,pegawai,pelanggan,rute,jadwal where pesan.idPelanggan = pelanggan.idPelanggan and pesan.idPegawai = pegawai.idPegawai and pesan.idRute = rute.idRute and rute.idRute = jadwal.idRute');
      return $this->db->query($query);
   }

   function jumlah()
   {
      $query = ('SELECT SUM(rute.harga) FROM pesan,pegawai,pelanggan,rute,jadwal where pesan.idPelanggan = pelanggan.idPelanggan and pesan.idPegawai = pegawai.idPegawai and pesan.idRute = rute.idRute and rute.idRute = jadwal.idRute');
      return $this->db->query($query);
   }



   
   function input()
   {
	    $this->db->trans_begin();
    	$idPesan = $this->input->post('idPesan');
    	$idPelanggan = $this->input->post('idPelanggan');
    	$idPegawai=$this->input->post('idPegawai');
      $idRute=$this->input->post('idRute');
    	$data = array( 'idPesan'=>$idPesan, 'idPelanggan'=>$idPelanggan, 'idPegawai'=>$idPegawai, 'idRute'=>$idRute );
    	$this->db->insert('pesan',$data);
      $this->db->set('max', 'max-1', FALSE);
      $this->db->where('idRute', $idRute);
      $this->db->update('jadwal');
      $this->db->trans_commit();	
   }

   function delete($idPesan)
   {
        $this->db->trans_begin();
        $this->db->delete('pesan', array('idPesan'=>$idPesan));
        $this->db->trans_commit();
   }


   function update($idPesan)
   {
        $this->db->trans_begin();
        $idPesan = $this->input->post('idPesan');
        $idPelanggan = $this->input->post('idPelanggan');
        $idPegawai=$this->input->post('idPegawai');
        $idRute=$this->input->post('rute');
        $data = array('idPelanggan'=>$idPelanggan, 'idPegawai'=>$idPegawai, 'idRute'=>$idRute );
        $this->db->where('idPesan',$idPesan)->update('pesan', $data);
        $this->db->trans_commit();
   }

   function select($idPesan)
   {
        return $this->db->get_where('pesan', array('idPesan'=>$idPesan))->row();
   }

   function getkodeunik($kode) { 

        $q = $this->db->query("SELECT MAX(RIGHT(idPesan,2)) AS idmax FROM ".$kode);
        $kd = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = sprintf("%02s",$tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "01";
        }
        $kar = "T"; //karakter depan kodenya
        //gabungkan string dengan kode yang telah dibuat tadi
        return $kar.$kd;
   }

   function count_all()
   {
        $this->db->select('idPesan');
        $this->db->distinct();
        $this->db->from('pesan');
        $query = $this->db->get();
        return $query->num_rows();
    }

}
?>