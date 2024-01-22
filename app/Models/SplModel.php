<?php

namespace App\Models;

use CodeIgniter\Model;

class SplModel extends Model
{
    protected $table            = 'spl';
    protected $primaryKey       = 'spl_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['date', 'shift', 'karyawan_id', 'from', 'to', 'total', 'description', 'approve_foreman', 'approve_manager'];

    // Dates
    protected $useTimestamps = true;
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
            $date = 'required';
        } else {
            $date = 'required';
        }
        $rulesValidation = [
            'date' => [
                'rules' => $date,
                'label' => 'Tanggal',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
            'shift' => [
                'rules' => 'required',
                'label' => 'Shift',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
            'karyawan_id' => [
                'rules' => 'required',
                'label' => 'Karyawan',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
            'from' => [
                'rules' => 'required',
                'label' => 'Dari',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
            'to' => [
                'rules' => 'required',
                'label' => 'Sampai',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
            'description' => [
                'rules' => 'required',
                'label' => 'Keterangan',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
        ];
        return $rulesValidation;
    }

    public function getSales()
    {
        return $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->where('departement_name', 'Sales')->selectSum('total')->first();
        // $result = $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->where('departement_name', 'Sales')->countAllResults();
        // return $result;
    }
    public function getHrga()
    {
        return $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->where('departement_name', 'HRGA')->selectSum('total')->first();
    }
    public function getPurchasing()
    {
        return $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->where('departement_name', 'Purchasing')->selectSum('total')->first();
    }
    public function getAccounting()
    {
        return $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->where('departement_name', 'Fin & Acc')->selectSum('total')->first();
    }

    public function ajaxGetData($start, $length)
    {
        if (in_groups('Administrator') || in_groups('Manager HRGA') || in_groups('Admin HRGA')) {
            $result = $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->orderBy('date', 'asc')->findAll($length, $start);
        } elseif (in_groups('Accounting') || in_groups('Manager Accounting')) {
            $result = $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->where('departement_name', 'Fin & Acc')->orderBy('date', 'asc')->findAll($length, $start);
        } elseif (in_groups('Purchasing') || in_groups('Manager Purchasing')) {
            $result = $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->where('departement_name', 'Purchasing')->orderBy('date', 'asc')->findAll($length, $start);
        } elseif (in_groups('Sales') || in_groups('Manager Sales')) {
            $result = $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->where('departement_name', 'Sales')->orderBy('date', 'asc')->findAll($length, $start);
        }

        return $result;
    }

    public function ajaxGetDataSearch($search, $start, $length)
    {
        if (in_groups('Administrator') || in_groups('Manager HRGA') || in_groups('Admin HRGA')) {
            $result = $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->like('shift', $search)->orLike('date', $search)->orLike('departement_name', $search)->orLike('plant', $search)->findAll($start, $length);
        } elseif (in_groups('Accounting') || in_groups('Manager Accounting')) {
            $result = $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->where('departement_name', 'Fin & Acc')->orderBy('karyawan_code', 'ASC')->like('date', $search)->findAll($start, $length);
        } elseif (in_groups('Purchasing') || in_groups('Manager Purchasing')) {
            $result = $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->where('departement_name', 'Purchasing')->orderBy('karyawan_code', 'ASC')->like('date', $search)->findAll($start, $length);
        } elseif (in_groups('Sales') || in_groups('Manager Sales')) {
            $result = $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->where('departement_name', 'Sales')->orderBy('karyawan_code', 'ASC')->like('date', $search)->findAll($start, $length);
        }
        return $result;
    }

    public function ajaxGetTotal()
    {
        if (in_groups('Administrator') || in_groups('Manager HRGA') || in_groups('Admin HRGA')) {
            $result = $this->countAllResults();
        } elseif (in_groups('Accounting') || in_groups('Manager Accounting')) {
            $result = $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->where('departement_name', 'Fin & Acc')->countAllResults();
        } elseif (in_groups('Purchasing') || in_groups('Manager Purchasing')) {
            $result = $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->where('departement_name', 'Purchasing')->countAllResults();
        } elseif (in_groups('Sales') || in_groups('Manager Sales')) {
            $result = $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->where('departement_name', 'Sales')->countAllResults();
        }
        if (isset($result)) {
            return $result;
        }
        return 0;
    }

    public function ajaxGetTotalSearch($search)
    {
        if (in_groups('Administrator') || in_groups('Manager HRGA') || in_groups('Admin HRGA')) {
            $result = $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->like('shift', $search)->orLike('date', $search)->orLike('departement_name', $search)->countAllResults();
        } elseif (in_groups('Accounting') || in_groups('Manager Accounting')) {
            $result = $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->where('departement_name', 'Fin & Acc')->orderBy('karyawan_code', 'ASC')->like('date', $search)->countAllResults();
        } elseif (in_groups('Purchasing') || in_groups('Manager Purchasing')) {
            $result = $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->where('departement_name', 'Purchasing')->orderBy('karyawan_code', 'ASC')->like('date', $search)->countAllResults();
        } elseif (in_groups('Sales') || in_groups('Manager Sales')) {
            $result = $this->join('karyawan', 'karyawan.karyawan_id = spl.karyawan_id')->join('departement', 'departement.departement_id = karyawan.departement_id')->where('departement_name', 'Sales')->orderBy('karyawan_code', 'ASC')->like('date', $search)->countAllResults();
        }
        return $result;
    }
}
