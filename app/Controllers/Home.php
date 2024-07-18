<?php

namespace App\Controllers;

use App\Models\Mdltugas;
use Hermawan\DataTables\DataTable;

class Home extends BaseController
{
    public function index(): string
    {
        $request = \Config\Services::request();
        $data =[
            'title' => 'Daftar Tugas',
            'content' => 'dashboard',
        ];
        return view('layout/wrapper',$data);
    }

    public function datatables()
    {
        $db = db_connect();
        $builder = $db->table('tugas')->select('judul,status,id');
         
        return DataTable::of($builder)
               ->addNumbering() //it will return data output with numbering on first column
               ->toJson();
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $mdltugas = new Mdltugas();
        $mdltugas->find($id);

        $mdltugas->delete_id($id);
        echo json_encode(array("status" => true));
    }

    public function get_edit($id = null)
    {
        $mdltugas = new Mdltugas();
        $data = $mdltugas->find($id);
        echo json_encode($data);
    }

    public function update()
    {
        $mdltugas = new Mdltugas();

        $id = $this->request->getPost('id');
        $edtnik = $this->request->getPost('edtjudul');
        $edtname = $this->request->getPost('edtstatus');

        $data = [
            'judul' => $edtnik,
            'status' => $edtname,
        ];

        $mdltugas->updatetugas($id,$data);
        echo json_encode(array("status" => true));
    }

    public function get_view($id)
    {
        $mdltugas = new Mdltugas();
        $data = $mdltugas->getview($id);
        echo json_encode($data);
    }
}
