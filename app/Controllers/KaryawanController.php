<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KaryawanModel;
use App\Models\DepartementModel;

class KaryawanController extends BaseController
{
    protected $Karyawan;
    protected $Departement;
    public function __construct()
    {
        $this->Karyawan = new KaryawanModel();
        $this->Departement = new DepartementModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Karyawan',
            'departements'  => $this->Departement->findAll(),
        ];
        return view('master/karyawan', $data);
    }

    public function karyawanRead()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total  = $this->Karyawan->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total
        ];

        if ($search !== "") {
            $list = $this->Karyawan->ajaxGetDataSearch($search, $start, $length);
        } else {
            $list = $this->Karyawan->ajaxGetData($start, $length);
        }

        if ($search !== "") {
            $total_search = $this->Karyawan->ajaxGetTotalSearch($search);
            $output = [
                'recordsTotal' => $total_search,
                'recordsFiltered' => $total_search
            ];
        }

        $data = [];
        $no = $start + 1;
        foreach ($list as $temp) {
            $aksi = '
            <div class="text-center">
            <a href="javascript:void(0)" class="btn btn-sm btn-success " onclick="editKaryawan(' . $temp['karyawan_id'] . ')"><i class="fas fa-edit"> </i></a>
            <a href="javascript:void(0)" class="btn btn-sm btn-danger " onclick="deleteKaryawan(' . $temp['karyawan_id'] . ')"><i class="fas fa-trash"> </i></a>
            </div>
            ';
            $row = [];
            $row[] = $no;
            $row[] = $temp['karyawan_code'];
            $row[] = $temp['karyawan_name'];
            $row[] = $temp['departement_name'];
            $row[] = $temp['plant'];
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }

    public function karyawanSave()
    {
        $this->_validate('save');

        $data = [
            'karyawan_code' => $this->request->getVar('karyawan_code'),
            'karyawan_name' => $this->request->getVar('karyawan_name'),
            'departement_id' => $this->request->getVar('departement_id'),
            'plant' => $this->request->getVar('plant'),
        ];

        if ($this->Karyawan->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function karyawanEdit($karyawan_id)
    {
        $data = $this->Karyawan->find($karyawan_id);
        echo json_encode($data);
    }

    public function karyawanUpdate()
    {
        $this->_validate('update');
        $karyawan_id = $this->request->getVar('karyawan_id');
        // $karyawan_id = $this->Karyawan->find($karyawan_id);

        $data = [
            'karyawan_id' => $karyawan_id,
            'karyawan_code' => $this->request->getVar('karyawan_code'),
            'karyawan_name' => $this->request->getVar('karyawan_name'),
            'departement_id' => $this->request->getVar('departement_id'),
            'plant' => $this->request->getVar('plant'),
        ];

        if ($this->Karyawan->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function karyawanDelete($karyawan_id)
    {
        // $karyawan_id = $this->request->getVar('karyawan_id');
        $karyawan_id = $this->Karyawan->find($karyawan_id);

        if ($this->Karyawan->delete($karyawan_id)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function _validate($method)
    {
        if (!$this->validate($this->Karyawan->getRulesValidation($method))) {
            $validation = \Config\Services::validation();
            $data = [];
            $data['error_string'] = [];
            $data['inputerror'] = [];
            $data['status'] = true;

            if ($validation->hasError('karyawan_code')) {
                $data['inputerror'][] = 'karyawan_code';
                $data['error_string'][] = $validation->getError('karyawan_code');
                $data['status'] = false;
            }
            if ($validation->hasError('karyawan_name')) {
                $data['inputerror'][] = 'karyawan_name';
                $data['error_string'][] = $validation->getError('karyawan_name');
                $data['status'] = false;
            }
            if ($validation->hasError('departement_id')) {
                $data['inputerror'][] = 'departement_id';
                $data['error_string'][] = $validation->getError('departement_id');
                $data['status'] = false;
            }
            if ($validation->hasError('plant')) {
                $data['inputerror'][] = 'plant';
                $data['error_string'][] = $validation->getError('plant');
                $data['status'] = false;
            }

            if ($data['status'] === false) {
                echo json_encode($data);
                exit();
            }
        }
    }
}
