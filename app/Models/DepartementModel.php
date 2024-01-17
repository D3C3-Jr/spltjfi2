<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartementModel extends Model
{
    protected $table            = 'departement';
    protected $primaryKey       = 'departement_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['departement_code', 'departement_name'];

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
            $departement_code = 'required|is_unique[departement.departement_code]';
        } else {
            $departement_code = 'required';
        }
        $rulesValidation = [
            'departement_code' => [
                'rules' => $departement_code,
                'label' => 'Kode Departement',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
            'departement_name' => [
                'rules' => 'required',
                'label' => 'Nama Depatement',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
        ];
        return $rulesValidation;
    }

    public function ajaxGetData($start, $length)
    {
        $result = $this->orderBy('departement_name', 'asc')->findAll($length, $start);
        return $result;
    }

    public function ajaxGetDataSearch($search, $start, $length)
    {
        $result = $this->like('departement_code', $search)->orLike('departement_name', $search)->findAll($start, $length);
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
        $result = $this->like('departement_code', $search)->orLike('departement_name', $search)->countAllResults();
        return $result;
    }
}
