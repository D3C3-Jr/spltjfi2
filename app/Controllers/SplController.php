<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DepartementModel;
use App\Models\KaryawanModel;
use App\Models\SplModel;

class SplController extends BaseController
{
    protected $Karyawan;
    protected $Departement;
    protected $Spl;
    public function __construct()
    {
        $this->Karyawan = new KaryawanModel();
        $this->Departement = new DepartementModel();
        $this->Spl = new SplModel();
    }

    public function index()
    {
        if (in_groups('Manager HRGA') || in_groups('Administrator') || in_groups('Admin HRGA')) {
            $departements = $this->Departement->findAll();
            $karyawans = $this->Karyawan->orderBy('karyawan_name')->findAll();
        } else {
            $departements = $this->Departement->where('departement_id', user()->departement_id)->find();
            $karyawans = $this->Karyawan->where('departement_id', user()->departement_id)->find();
        }

        $data = [
            'title' => 'Data SPL',
            'departements'  => $departements,
            'karyawans'  => $karyawans,
        ];
        return view('spl', $data);
    }

    public function splRead()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total  = $this->Spl->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total
        ];

        if ($search !== "") {
            $list = $this->Spl->ajaxGetDataSearch($search, $start, $length);
        } else {
            $list = $this->Spl->ajaxGetData($start, $length);
        }

        if ($search !== "") {
            $total_search = $this->Spl->ajaxGetTotalSearch($search);
            $output = [
                'recordsTotal' => $total_search,
                'recordsFiltered' => $total_search
            ];
        }

        $data = [];
        $no = $start + 1;
        foreach ($list as $temp) {
            $from       = date('H:i', strtotime($temp['from']));
            $to         = date('H:i', strtotime($temp['to']));
            $total      = (strtotime($temp['to']) - strtotime($temp['from'])) - 1800;


            $aksi = '
            <div class="text-center">
            <a href="javascript:void(0)" class="btn btn-sm btn-success " onclick="editSpl(' . $temp['spl_id'] . ')"><i class="fas fa-edit"> </i></a>
            <a href="javascript:void(0)" class="btn btn-sm btn-danger " onclick="deleteSpl(' . $temp['spl_id'] . ')"><i class="fas fa-trash"> </i></a>
            </div>
            ';


            if ($temp['approve_foreman'] == 0) {
                $approve_foreman = '<i class="badge badge-sm badge-danger">not approve</i>';
            } else {
                $approve_foreman = '<i class="badge badge-sm badge-primary">approve</i>';
            };
            if ($temp['approve_manager'] == 0) {
                $approve_manager = '<i class="badge badge-sm badge-danger">not approve</i>';
            } else {
                $approve_manager = '<i class="badge badge-sm badge-primary">approve</i>';
            };

            $total = round($temp['total'] / 3600, PHP_ROUND_HALF_UP);

            $row = [];
            $row[] = $no;
            $row[] = $temp['date'];
            $row[] = $temp['plant'];
            $row[] = $temp['shift'];
            $row[] = $temp['karyawan_code'];
            $row[] = $temp['karyawan_name'];
            $row[] = $temp['departement_name'];
            $row[] = $from;
            $row[] = $to;
            $row[] = $total;
            $row[] = $temp['description'];
            $row[] = $approve_foreman;
            $row[] = $approve_manager;
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }

    public function splSave()
    {
        $this->_validate('save');
        $from       = date('H:i', strtotime($this->request->getVar('from')));
        $to         = date('H:i', strtotime($this->request->getVar('to')));
        $total      = (strtotime($to) - strtotime($from)) - 1800;
        $data = [
            'date'              => $this->request->getVar('date'),
            'shift'             => $this->request->getVar('shift'),
            'karyawan_id'       => $this->request->getVar('karyawan_id'),
            'from'              => $this->request->getVar('from'),
            'to'                => $this->request->getVar('to'),
            'total'             => $total,
            'description'       => $this->request->getVar('description'),
            'approve_foreman'   => $this->request->getVar('approve_foreman'),
            'approve_manager'   => $this->request->getVar('approve_manager'),
        ];

        if ($this->Spl->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }


    public function splEdit($spl_id)
    {
        $data = $this->Spl->find($spl_id);
        echo json_encode($data);
    }

    public function splUpdate()
    {
        $this->_validate('update');
        $spl_id = $this->request->getVar('spl_id');
        // $spl_id = $this->Spl->find($spl_id);
        $from       = date('H:i', strtotime($this->request->getVar('from')));
        $to         = date('H:i', strtotime($this->request->getVar('to')));
        $total      = (strtotime($to) - strtotime($from)) - 1800;
        $data = [
            'spl_id' => $spl_id,
            'date'              => $this->request->getVar('date'),
            'shift'             => $this->request->getVar('shift'),
            'karyawan_id'       => $this->request->getVar('karyawan_id'),
            'from'              => $this->request->getVar('from'),
            'to'                => $this->request->getVar('to'),
            'total'             => $total,
            'description'       => $this->request->getVar('description'),
            'approve_foreman'   => $this->request->getVar('approve_foreman'),
            'approve_manager'   => $this->request->getVar('approve_manager'),
        ];

        if ($this->Spl->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function splDelete($spl_id)
    {
        // $spl_id = $this->request->getVar('spl_id');
        $spl_id = $this->Spl->find($spl_id);

        if ($this->Spl->delete($spl_id)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function _validate($method)
    {
        if (!$this->validate($this->Spl->getRulesValidation($method))) {
            $validation = \Config\Services::validation();
            $data = [];
            $data['error_string'] = [];
            $data['inputerror'] = [];
            $data['status'] = true;

            if ($validation->hasError('date')) {
                $data['inputerror'][] = 'date';
                $data['error_string'][] = $validation->getError('date');
                $data['status'] = false;
            }
            if ($validation->hasError('shift')) {
                $data['inputerror'][] = 'shift';
                $data['error_string'][] = $validation->getError('shift');
                $data['status'] = false;
            }
            if ($validation->hasError('karyawan_id')) {
                $data['inputerror'][] = 'karyawan_id';
                $data['error_string'][] = $validation->getError('karyawan_id');
                $data['status'] = false;
            }
            if ($validation->hasError('from')) {
                $data['inputerror'][] = 'from';
                $data['error_string'][] = $validation->getError('from');
                $data['status'] = false;
            }
            if ($validation->hasError('to')) {
                $data['inputerror'][] = 'to';
                $data['error_string'][] = $validation->getError('to');
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
