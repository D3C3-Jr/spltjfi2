<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table            = 'karyawan';
    protected $primaryKey       = 'karyawan_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['karyawan_code', 'karyawan_name', 'departement_id', 'plant'];

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
            $karyawan_code = 'required|is_unique[karyawan.karyawan_code]';
        } else {
            $karyawan_code = 'required';
        }
        $rulesValidation = [
            'karyawan_code' => [
                'rules' => $karyawan_code,
                'label' => 'Kode Departement',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
            'karyawan_name' => [
                'rules' => 'required',
                'label' => 'Nama Depatement',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
            'departement_id' => [
                'rules' => 'required',
                'label' => 'Depatement',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
            'plant' => [
                'rules' => 'required',
                'label' => 'Plant',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
        ];
        return $rulesValidation;
    }

    public function ajaxGetData($start, $length)
    {
        $result = $this->join('departement', 'departement.departement_id = karyawan.departement_id')->orderBy('karyawan_code', 'asc')->findAll($length, $start);
        return $result;
    }

    public function ajaxGetDataSearch($search, $start, $length)
    {
        $result = $this->join('departement', 'departement.departement_id = karyawan.departement_id')->like('karyawan_code', $search)->orLike('karyawan_name', $search)->orLike('departement_name', $search)->orLike('plant', $search)->findAll($length, $start);
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
        $result = $this->join('departement', 'departement.departement_id = karyawan.departement_id')->like('karyawan_code', $search)->orLike('karyawan_name', $search)->orLike('departement_name', $search)->orLike('plant', $search)->countAllResults();
        return $result;
    }
}
