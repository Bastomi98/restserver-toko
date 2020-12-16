<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Barang
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller REST
 * @author    Dwi Bastomi <dwibastomi01@gmail.com>
 * @param     ...
 * @return    ...
 *
 */
use chriskacerguis\RestServer\RestController;

class Barang extends RestController
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('barang_model', 'brg');
  }

  public function index_get()
  {
    $id = $this->get('id');
    if($id === null) {                   
      $p = $this->get('page');
      $p = (empty($p) ? 1 : $p);
      $total_data = $this->brg->count();
      $total_page = ceil($total_data / 5);
      $start = ($p - 1) * 5;
      $list = $this->brg->get(null, 5, $start);
      if ($list) {
      $data = [
        'status' => true,
        'page' => $p,
        'total_data' => $total_data,
        'total_page' => $total_page,
        'data' => $list
      ];
    } else {
      $data = [
        'status' => false,
        'msg' => 'Data tidak ditemukan'
      ];
    }
      $this->response($data, RestController::HTTP_OK);
    } else {
      $data = $this->brg->get($id);
      if($data) {
        $this->response(['status'=>true,'data' => $data], RestController::HTTP_OK);
      } else {
        $this->response(['status'=>false,'msg' => $id .' tidak ditemukan'], RestController::HTTP_NOT_FOUND);
      }
    }
  } 
  
  public function index_post()
  {
    $data =[
      'id_barang'=>$this->post('id_barang'),
      'nama_barang'=>$this->post('nama_barang'),
      'harga_barang'=>$this->post('harga_barang'),
      'stok_barang'=>$this->post('stok_barang')
    ];
    $simpan=$this->brg->add($data);
    if($simpan['status']){
      $this->response(['status'=>true,'msg'=>$simpan['data']. 'Data telah ditambahkan'], RestController::HTTP_CREATED);
    } else {
      $this->response(['status'=>false, 'msg'=>$simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
    }
  }

  public function index_put()
  {
    $data = [
      'id_barang' => $this->put('id_barang'),
      'nama_barang' => $this->put('nama_barang'),
      'harga_barang' => $this->put('harga_barang'),
      'stok_barang' => $this->put('stok_barang')
    ];
    $id = $this->put('id');
    if ($id === null) {
      $this->response(['status' => false, 'msg' => 'Masukkan ID Barang yang akan dirubah'], RestController::HTTP_BAD_REQUEST);
    }
    $simpan = $this->brg->update($id, $data);
    if ($simpan['status']) {
      $status = (int)$simpan['data'];
      if ($status > 0)
        $this->response(['status' => true, 'msg' => $simpan['data'] . ' Data telah berhasil dirubah'], RestController::HTTP_OK);
      else
        $this->response(['status' => false, 'msg' => 'Tidak ada data yang dirubah'], RestController::HTTP_BAD_REQUEST);
    } else {
      $this->response(['status' => false, 'msg' => $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
    }
  }

  public function index_delete()
  {
    $id = $this->delete('id', true);
    if ($id === null) {
      $this->response(['status' => false, 'msg' => 'Masukkan ID Barang yang akan dihapus'], RestController::HTTP_BAD_REQUEST);
    }
    $delete = $this->brg->delete($id);
    if ($delete['status']) {
      $status = (int)$delete['data'];
      if ($status > 0)
        $this->response(['status' => true, 'msg' => $id . ' data telah berhasil dihapus'], RestController::HTTP_OK);
      else
        $this->response(['status' => false, 'msg' => 'Tidak ada data yang di Delete'], RestController::HTTP_BAD_REQUEST);
    } else {
      $this->response(['status' => false, 'msg' => $delete['msg']], RestController::HTTP_INTERNAL_ERROR);
    }
  }
} 





/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */