<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RoleModel;

class RoleController extends BaseController
{
    protected $Role;
    public function __construct()
    {
        $this->Role = new RoleModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Role',
        ];
        return view('manage/role', $data);
    }

    public function roleRead()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total  = $this->Role->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total
        ];

        if ($search !== "") {
            $list = $this->Role->ajaxGetDataSearch($search, $start, $length);
        } else {
            $list = $this->Role->ajaxGetData($start, $length);
        }

        if ($search !== "") {
            $total_search = $this->Role->ajaxGetTotalSearch($search);
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
            <a href="javascript:void(0)" class="btn btn-sm btn-success " onclick="editRole(' . $temp['id'] . ')"><i class="fas fa-edit"> </i></a>
            <a href="javascript:void(0)" class="btn btn-sm btn-danger " onclick="deleteRole(' . $temp['id'] . ')"><i class="fas fa-trash"> </i></a>
            </div>
            ';
            $row = [];
            $row[] = $no;
            $row[] = $temp['name'];
            $row[] = $temp['description'];
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }

    public function roleSave()
    {
        $this->_validate('save');

        $data = [
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
        ];

        if ($this->Role->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function roleEdit($id)
    {
        $data = $this->Role->find($id);
        echo json_encode($data);
    }

    public function roleUpdate()
    {
        $this->_validate('update');
        $id = $this->request->getVar('id');
        // $id = $this->Role->find($id);

        $data = [
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
        ];

        if ($this->Role->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function roleDelete($id)
    {
        // $id = $this->request->getVar('id');
        $id = $this->Role->find($id);

        if ($this->Role->delete($id)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function _validate($method)
    {
        if (!$this->validate($this->Role->getRulesValidation($method))) {
            $validation = \Config\Services::validation();
            $data = [];
            $data['error_string'] = [];
            $data['inputerror'] = [];
            $data['status'] = true;

            if ($validation->hasError('name')) {
                $data['inputerror'][] = 'name';
                $data['error_string'][] = $validation->getError('name');
                $data['status'] = false;
            }
            if ($validation->hasError('description')) {
                $data['inputerror'][] = 'description';
                $data['error_string'][] = $validation->getError('description');
                $data['status'] = false;
            }

            if ($data['status'] === false) {
                echo json_encode($data);
                exit();
            }
        }
    }
}
