<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DepartementModel;

class DepartementController extends BaseController
{
    protected $Departement;
    public function __construct()
    {
        $this->Departement = new DepartementModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Departement',
        ];
        return view('master/departement', $data);
    }

    public function departementRead()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total  = $this->Departement->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total
        ];

        if ($search !== "") {
            $list = $this->Departement->ajaxGetDataSearch($search, $start, $length);
        } else {
            $list = $this->Departement->ajaxGetData($start, $length);
        }

        if ($search !== "") {
            $total_search = $this->Departement->ajaxGetTotalSearch($search);
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
            <a href="javascript:void(0)" class="btn btn-sm btn-success " onclick="editDepartement(' . $temp['departement_id'] . ')"><i class="fas fa-edit"> </i></a>
            <a href="javascript:void(0)" class="btn btn-sm btn-danger " onclick="deleteDepartement(' . $temp['departement_id'] . ')"><i class="fas fa-trash"> </i></a>
            </div>
            ';
            $row = [];
            $row[] = $no;
            $row[] = $temp['departement_code'];
            $row[] = $temp['departement_name'];
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }

    public function departementSave()
    {
        $this->_validate('save');

        $data = [
            'departement_code' => $this->request->getVar('departement_code'),
            'departement_name' => $this->request->getVar('departement_name'),
        ];

        if ($this->Departement->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function departementEdit($departement_id)
    {
        $data = $this->Departement->find($departement_id);
        echo json_encode($data);
    }

    public function departementUpdate()
    {
        $this->_validate('update');
        $departement_id = $this->request->getVar('departement_id');
        // $departement_idd = $this->Departement->find($departement_id);

        $data = [
            'departement_id' => $departement_id,
            'departement_code' => $this->request->getVar('departement_code'),
            'departement_name' => $this->request->getVar('departement_name'),
        ];

        if ($this->Departement->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function departementDelete($departement_id)
    {
        // $departement_id = $this->request->getVar('departement_id');
        $departement_id = $this->Departement->find($departement_id);

        if ($this->Departement->delete($departement_id)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function _validate($method)
    {
        if (!$this->validate($this->Departement->getRulesValidation($method))) {
            $validation = \Config\Services::validation();
            $data = [];
            $data['error_string'] = [];
            $data['inputerror'] = [];
            $data['status'] = true;

            if ($validation->hasError('departement_code')) {
                $data['inputerror'][] = 'departement_code';
                $data['error_string'][] = $validation->getError('departement_code');
                $data['status'] = false;
            }
            if ($validation->hasError('departement_name')) {
                $data['inputerror'][] = 'departement_name';
                $data['error_string'][] = $validation->getError('departement_name');
                $data['status'] = false;
            }

            if ($data['status'] === false) {
                echo json_encode($data);
                exit();
            }
        }
    }
}
