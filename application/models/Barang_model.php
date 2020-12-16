<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Barang_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Dwi Bastomi <dwibastomi01@gmail.com>
 * @param     ...
 * @return    ...
 *
 */

class Barang_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }
  public function get($id = null, $limit = 5, $offset = 0)
  {
    if($id === null){
    return $this->db->get('tb_barang', $limit, $offset)->result();
  } else {
    return $this->db->get_where('tb_barang',['id_barang'=>$id])->result_array();
  }
}
public function count()
  {
    return $this->db->get('tb_barang')->num_rows();
  }

  public function add($data)
  {
    try{
      $this->db->insert('tb_barang',$data);
      $error = $this->db->error();
      if(!empty($error['code'])){
        throw new Exception('Terjadi kesalahan : '.$error['message']);
        return false;
      }
      return ['status'=>true,'data'=>$this->db->affected_rows()];
    } catch(Exception $ex) {
      return['status' => false, 'msg' => $ex->getMessage()]; 
    }
  }

  public function update($id, $data)
  {
    try{
      $this->db->update('tb_barang',$data, ['id_barang' => $id]);
      $error = $this->db->error();
      if(!empty($error['code'])){
        throw new Exception('Terjadi kesalahan : '.$error['message']);
        return false;
      }
      return ['status'=>true,'data'=>$this->db->affected_rows()];
    } catch(Exception $ex) {
      return['status' => false, 'msg' => $ex->getMessage()]; 
    }
  }

  public function delete($id)
  {
    try {
      $this->db->delete('tb_barang', ['id_barang' => $id]);
      $error = $this->db->error();
      if (!empty($error['code'])) {
        throw new Exception('Terjadi kesalahan: ' . $error['message']);
        return false;
      }
      return ['status' => true, 'data' => $this->db->affected_rows()];
    } catch (Exception $ex) {
      return ['status' => false, 'msg' => $ex->getMessage()];
    }
  }
}

/* End of file Barang_model.php */
/* Location: ./application/models/Barang_model.php */