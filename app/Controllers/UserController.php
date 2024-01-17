<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GroupUsersModel;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\DepartementModel;
use Myth\Auth\Password;


class UserController extends BaseController
{
    protected $User;
    protected $Departement;
    protected $GroupUsers;
    protected $Role;
    public function __construct()
    {
        $this->User = new UserModel();
        $this->Departement = new DepartementModel();
        $this->GroupUsers = new GroupUsersModel();
        $this->Role = new RoleModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data User',
            'users' => $this->User->findAll(),
            'departements' => $this->Departement->findAll(),
            'roles' => $this->Role->findAll(),
        ];
        return view('manage/user', $data);
    }


    public function userRead()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total = $this->User->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
        ];

        if ($search !== "") {
            $list = $this->User->ajaxGetDataSearch($search, $start, $length);
        } else {
            $list = $this->User->ajaxGetData($start, $length);
        }

        if ($search !== "") {
            $total_search = $this->User->ajaxGetTotalSearch($search);
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
            <a href="javascript:void(0)" class="btn btn-sm btn-success " onclick="editUser(' . $temp['id'] . ')"><i class="fas fa-edit"> </i></a>
            <a href="javascript:void(0)" class="btn btn-sm btn-danger " onclick="deleteUser(' . $temp['id'] . ')"><i class="fas fa-trash"> </i></a>
            </div>
                    ';

            $row = [];
            $row[] = $no;
            $row[] = $temp['email'];
            $row[] = $temp['username'];
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }
    public function groupUserRead()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total = $this->GroupUsers->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
        ];

        if ($search !== "") {
            $list = $this->GroupUsers->ajaxGetDataSearch($search, $start, $length);
        } else {
            $list = $this->GroupUsers->ajaxGetData($start, $length);
        }

        if ($search !== "") {
            $total_search = $this->GroupUsers->ajaxGetTotalSearch($search);
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
            <a href="javascript:void(0)" class="btn btn-sm btn-success " onclick="editGroupUser(' . $temp['groups_users_id'] . ')"><i class="fas fa-edit"> </i></a>
            <a href="javascript:void(0)" class="btn btn-sm btn-danger " onclick="deleteGroupUser(' . $temp['groups_users_id'] . ')"><i class="fas fa-trash"> </i></a>
            </div>
                    ';

            $row = [];
            $row[] = $no;
            $row[] = $temp['email'];
            $row[] = $temp['name'];
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }

    public function userDetail($id)
    {
        $data = $this->User->find($id);
        echo json_encode($data);
    }

    // EDIT
    public function userEdit($id)
    {
        $data = $this->User->find($id);
        echo json_encode($data);
    }
    public function groupUserEdit($groups_users_id)
    {
        $data = $this->GroupUsers->find($groups_users_id);
        echo json_encode($data);
    }

    // UPDATE
    public function userUpdate()
    {
        $this->_validateUser('update');
        $id = $this->request->getVar('id');
        $user = $this->User->find($id);

        $data = [
            'id' => $id,
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password_hash' => Password::hash($this->request->getVar('password_hash')),
            'active' => 1,
        ];

        if ($this->User->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }
    public function groupUserUpdate()
    {
        $this->_validateGroupUsers('update');
        $groups_users_id = $this->request->getVar('groups_users_id');
        // $user = $this->GroupUsers->find($id);

        $data = [
            'groups_users_id' => $groups_users_id,
            'group_id' => $this->request->getVar('group_id'),
            'user_id' => $this->request->getVar('user_id'),
        ];

        if ($this->GroupUsers->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function userDelete($id)
    {
        if ($this->User->delete($id)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }
    public function groupUserDelete($id)
    {
        if ($this->GroupUsers->delete($id)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    // SAVE
    public function userSave()
    {
        $this->_validateUser('save');
        $data = [
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'departement_id' => $this->request->getVar('departement_id'),
            'password_hash' => Password::hash($this->request->getVar('password_hash')),
            'active' => 1,
        ];

        if ($this->User->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function groupUserSave()
    {
        $this->_validateGroupUsers('save');
        $data = [
            'group_id' => $this->request->getVar('group_id'),
            'user_id' => $this->request->getVar('user_id'),
        ];

        if ($this->GroupUsers->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function _validateUser($method)
    {
        if (!$this->validate($this->User->getRulesValidation($method))) {
            $validation = \Config\Services::validation();
            $data = [];
            $data['error_string'] = [];
            $data['inputerror'] = [];
            $data['status'] = true;

            if ($validation->hasError('email')) {
                $data['inputerror'][] = 'email';
                $data['error_string'][] = $validation->getError('email');
                $data['status'] = false;
            }
            if ($validation->hasError('username')) {
                $data['inputerror'][] = 'username';
                $data['error_string'][] = $validation->getError('username');
                $data['status'] = false;
            }

            if ($data['status'] === false) {
                echo json_encode($data);
                exit();
            }
        }
    }

    public function _validateGroupUsers($method)
    {
        if (!$this->validate($this->GroupUsers->getRulesValidation($method))) {
            $validation = \Config\Services::validation();
            $data = [];
            $data['error_string'] = [];
            $data['inputerror'] = [];
            $data['status'] = true;

            if ($validation->hasError('group_id')) {
                $data['inputerror'][] = 'group_id';
                $data['error_string'][] = $validation->getError('group_id');
                $data['status'] = false;
            }
            if ($validation->hasError('user_id')) {
                $data['inputerror'][] = 'user_id';
                $data['error_string'][] = $validation->getError('user_id');
                $data['status'] = false;
            }

            if ($data['status'] === false) {
                echo json_encode($data);
                exit();
            }
        }
    }
}
