<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title m-0">Featured</h5>
        </div>
        <div class="card-body">
            <table id="dataKaryawan" class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="col-sm-2">NIK</th>
                        <th>Nama</th>
                        <th>Departement</th>
                        <th>Plant</th>
                        <th class="col-sm-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th class="col-sm-2">NIK</th>
                        <th>Nama</th>
                        <th>Departement</th>
                        <th>Plant</th>
                        <th class="col-sm-2 text-center">Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- /.col-md-6 -->

<!-- Modal -->
<div class="modal fade" id="modalKaryawan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="form" enctype="multipart/form-data">
                <input type="hidden" name="karyawan_id" id="karyawan_id">
                <div class="modal-body">
                    <div class="row mb-2">
                        <label for="karyawan_code" class="col-sm-3 col-form-label">NIK</label>
                        <div class="col-sm-9">
                            <input type="text" name="karyawan_code" class="form-control form-control-sm" id="karyawan_code">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="karyawan_name" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" name="karyawan_name" class="form-control form-control-sm" id="karyawan_name">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="departement_id" class="col-sm-3 col-form-label">Departement</label>
                        <div class="col-sm-9">
                            <select name="departement_id" id="departement_id" class="form-control form-control-sm">
                                <option disabled hidden selected>Pilih Departement</option>
                                <?php foreach ($departements as $departement) : ?>
                                    <option value="<?= $departement['departement_id'] ?>"><?= $departement['departement_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="plant" class="col-sm-3 col-form-label">Plant</label>
                        <div class="col-sm-9">
                            <select name="plant" id="plant" class="form-control form-control-sm">
                                <option selected hidden disabled>Pilih Plant</option>
                                <option value="Plant 1">Plant 1</option>
                                <option value="Plant 2">Plant 2</option>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" class="btn btn-primary" id="submit" onclick="saveKaryawan()"></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->


<?= $this->endSection('content'); ?>