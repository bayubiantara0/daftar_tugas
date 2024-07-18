<?php

namespace App\Controllers;
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
}
