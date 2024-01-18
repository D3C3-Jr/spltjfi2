<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-6">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title m-0">User</h5>
        </div>
        <div class="card-body">
            <table id="dataUser" class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th class="col-sm-1">#</th>
                        <th class="col-sm-5">Email</th>
                        <th>Username</th>
                        <th class="col-sm-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th class="col-sm-1">#</th>
                        <th class="col-sm-5">Email</th>
                        <th>Username</th>
                        <th class="col-sm-2 text-center">Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


<div class="col-lg-6">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title m-0">User Role</h5>
        </div>
        <div class="card-body">
            <table id="dataGroupUser" class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th class="col-sm-1">#</th>
                        <th class="col-sm-5">Email</th>
                        <th>Role</th>
                        <th class="col-sm-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th class="col-sm-1">#</th>
                        <th class="col-sm-5">Email</th>
                        <th>Role</th>
                        <th class="col-sm-2 text-center">Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- /.col-md-6 -->

<!-- Modal -->
<div class="modal fade" id="modalUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="formUser" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" name="email" class="form-control" id="email">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" name="username" class="form-control" id="username">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password_hash" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password_hash" class="form-control" id="password_hash">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="departement_id" class="col-sm-3 col-form-label">Departement</label>
                        <div class="col-sm-9">
                            <select name="departement_id" id="departement_id" class="form-control">
                                <option hidden selected disabled>Pilih Departement</option>
                                <?php foreach ($departements as $departement) : ?>
                                    <option value="<?= $departement['departement_id'] ?>"><?= $departement['departement_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" class="btn btn-primary" id="submitUser" onclick="saveUser()"></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalGroupUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="formGroupUser" enctype="multipart/form-data">
                <input type="hidden" name="groups_users_id" id="groups_users_id">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="group_id" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                            <select name="group_id" id="group_id" class="form-control">
                                <option selected disabled hidden>Pilih Role</option>
                                <?php foreach ($roles as $role) : ?>
                                    <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="user_id" class="col-sm-3 col-form-label">User</label>
                        <div class="col-sm-9">
                            <select name="user_id" id="user_id" class="form-control">
                                <option selected disabled hidden>Pilih User</option>
                                <?php foreach ($users as $user) : ?>
                                    <option value="<?= $user['id'] ?>"><?= $user['email'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" class="btn btn-primary" id="submitGroupUser" onclick="saveGroupUser()"></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->


<?= $this->endSection('content'); ?>