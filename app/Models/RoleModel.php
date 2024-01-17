<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table            = 'auth_groups';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'description'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function getRulesValidation($method = null)
    {
        if ($method == 'save') {
            $name = 'required|is_unique[auth_groups.name]';
        } else {
            $name = 'required';
        }
        $rulesValidation = [
            'name' => [
                'rules' => $name,
                'label' => ' Nama Role',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
            'description' => [
                'rules' => 'required',
                'label' => 'Deskripsi',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
        ];
        return $rulesValidation;
    }

    public function ajaxGetData($start, $length)
    {
        $result = $this->orderBy('name', 'asc')->findAll($length, $start);
        return $result;
    }

    public function ajaxGetDataSearch($search, $start, $length)
    {
        $result = $this->like('name', $search)->orLike('description', $search)->findAll($start, $length);
        return $result;
    }

    public function ajaxGetTotal()
    {
        $result = $this->countAllResults();
        if (isset($result)) {
            return $result;
        }
        return 0;
    }

    public function ajaxGetTotalSearch($search)
    {
        $result = $this->like('name', $search)->orLike('description', $search)->countAllResults();
        return $result;
    }
}
