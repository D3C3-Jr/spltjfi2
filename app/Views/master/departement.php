<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title m-0">Featured</h5>
        </div>
        <div class="card-body">
            <table id="dataDepartement" class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Departement</th>
                        <th>Nama Departement</th>
                        <th class="col-sm-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Kode Departement</th>
                        <th>Nama Departement</th>
                        <th class="col-sm-2 text-center">Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- /.col-md-6 -->

<!-- Modal -->
<div class="modal fade" id="modalDepartement">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="form" enctype="multipart/form-data">
                <input type="hidden" name="departement_id" id="departement_id">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="departement_code" class="col-sm-3 col-form-label">Kode Dept</label>
                        <div class="col-sm-9">
                            <input type="text" name="departement_code" class="form-control" id="departement_code">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="departement_name" class="col-sm-3 col-form-label">Nama Dept</label>
                        <div class="col-sm-9">
                            <input type="text" name="departement_name" class="form-control" id="departement_name">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" class="btn btn-primary" id="submit" onclick="saveDepartement()"></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->


<?= $this->endSection('content'); ?>