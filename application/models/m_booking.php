<?php
class m_booking extends CI_Model{

   
   function tampil($idUser)
   {
      $query = ("SELECT distinct booking.*,jadwal.tgl,user.nama FROM booking,jadwal,user where booking.idUser = '".$idUser."' and booking.idUser = user.idUser and booking.idJadwal = jadwal.idJadwal");
      return $this->db->query($query);
   }

   /*
   function jumlah()
   {
      $query = ('SELECT SUM(rute.harga) FROM pesan,pegawai,pelanggan,rute,jadwal where pesan.idPelanggan = pelanggan.idPelanggan and pesan.idPegawai = pegawai.idPegawai and pesan.idRute = rute.idRute and rute.idRute = jadwal.idRute');
      return $this->db->query($query);
   }
  


   function tampil($idUser)
   {
      
      $this->db->select('*');
      $this->db->from('booking');
      $this->db->where('idUser',$idUser);
            
      $query = $this->db->get();
      return $query;

   }

    */


   
   function input()
   {
	    $this->db->trans_begin();
    	
      $idBok = $this->input->post('idBok');
      //$tiket=$this->input->post('tiket');
    	$idUser = $this->input->post('idUser');
    	$idJadwal=$this->input->post('idJadwal');

      $kode = 'booking'; 

        $q = $this->db->query("SELECT MAX(RIGHT(tiket,2)) AS idmax FROM ".$kode." where idJadwal = '".$idJadwal."'");
        $kd = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = sprintf("%02s",$tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "01";
        }
        $kar = "N"; //karakter depan kodenya
        //gabungkan string dengan kode yang telah dibuat tadi
        $tiket=$kar.$kd;


    	$data = array( 'idBok'=>$idBok, 'tiket'=>$tiket, 'idUser'=>$idUser, 'idJadwal'=>$idJadwal );
    	$this->db->insert('booking',$data);

      $this->db->set('kuota', 'kuota-1', FALSE);
      $this->db->where('idJadwal', $idJadwal);
      $this->db->update('jadwal');


      $this->db->trans_commit();	
   }

    /*
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
   */

   function getkodeunik($kode) { 

        $q = $this->db->query("SELECT MAX(RIGHT(idBok,2)) AS idmax FROM ".$kode);
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




   /*
   function count_all()
   {
        $this->db->select('idPesan');
        $this->db->distinct();
        $this->db->from('pesan');
        $query = $this->db->get();
        return $query->num_rows();
    }
    */

}
?>