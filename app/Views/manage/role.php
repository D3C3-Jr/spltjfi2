<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title m-0">Featured</h5>
        </div>
        <div class="card-body">
            <table id="dataRole" class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th class="col-sm-1">#</th>
                        <th class="col-sm-2">Role</th>
                        <th>Deskripsi</th>
                        <th class="col-sm-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th class="col-sm-1">#</th>
                        <th class="col-sm-2">Role</th>
                        <th>Deskripsi</th>
                        <th class="col-sm-2 text-center">Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- /.col-md-6 -->

<!-- Modal -->
<div class="modal fade" id="modalRole">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="form" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="name" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" id="name">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <input type="text" name="description" class="form-control" id="description">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" class="btn btn-primary" id="submit" onclick="saveRole()"></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->


<?= $this->endSection('content'); ?>