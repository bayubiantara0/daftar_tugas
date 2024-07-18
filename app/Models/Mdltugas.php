<?php

namespace App\Models;

use CodeIgniter\Model;

class Mdltugas extends Model
{
    protected $table = 'tugas';

    public function inserttugas($data)
    {
        $builder = $this->db->table($this->table);
        $query = $builder->insert($data);

        return $query;
    }

    public function updatetugas($id,$data)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id', $id);
        $query = $builder->update($data);
        return $query;
    }

    public function delete_id($id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id', $id);
        $builder->delete();
        $query   = $builder->get();
        
        return $query->getResult();
    }
}