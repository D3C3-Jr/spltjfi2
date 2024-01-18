<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="col-lg-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title m-0"><?= user()->username; ?></h5>
        </div>
        <div class="card-body">
            <table id="dataSpl" class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="col-sm-1">Tanggal</th>
                        <th>Plant</th>
                        <th>Shift</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Dept</th>
                        <th>Dari</th>
                        <th>Sampai</th>
                        <th>Total</th>
                        <th>Keterangan</th>
                        <th>Mgr Dept</th>
                        <th>Mgr HRGA</th>
                        <th class="col-sm-1 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th class="col-sm-1">Tanggal</th>
                        <th>Plant</th>
                        <th>Shift</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Dept</th>
                        <th>Dari</th>
                        <th>Sampai</th>
                        <th>Total</th>
                        <th>Keterangan</th>
                        <th>Mgr Dept</th>
                        <th>Mgr HRGA</th>
                        <th class="col-sm-1 text-center">Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- /.col-md-6 -->

<!-- Modal -->
<div class="modal fade" id="modalSpl">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="form" enctype="multipart/form-data">
                <input type="hidden" name="spl_id" id="spl_id">
                <div class="modal-body">
                    <div class="row mb-2">
                        <label for="date" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" name="date" class="form-control  form-control-sm" id="date">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="shift" class="col-sm-3 col-form-label">Shift</label>
                        <div class="col-sm-9">
                            <select name="shift" id="shift" class="form-control form-control-sm">
                                <option selected hidden disabled>Pilih Shift</option>
                                <option value="Shift 1">Shift 1</option>
                                <option value="Shift 2">Shift 2</option>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="karyawan_id" class="col-sm-3 col-form-label">Karyawan</label>
                        <div class="col-sm-9">
                            <select name="karyawan_id" id="karyawan_id" class="form-control form-control-sm select2" style="width: 100%;">
                                <option disabled hidden selected>Pilih Karyawan</option>
                                <?php foreach ($karyawans as $karyawan) : ?>
                                    <option value="<?= $karyawan['karyawan_id'] ?>"><?= $karyawan['karyawan_code'] ?> | <?= $karyawan['karyawan_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="from" class="col-sm-3 col-form-label">Jam</label>
                        <div class="col-sm-4">
                            <input type="time" name="from" id="from" class="form-control form-control-sm">
                            <small class="help-block text-danger"></small>
                        </div>
                        <label for="to" class="col-sm-1 col-form-label text-center">-</label>
                        <div class="col-sm-4">
                            <input type="time" name="to" id="to" class="form-control form-control-sm">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="description" class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" name="description" class="form-control form-control-sm" id="description">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>

                    <!-- FIRST APPROVAL -->
                    <?php if (in_groups('Manager Accounting') || in_groups('Manager Purchasing') || in_groups('Manager Sales')) : ?>
                        <div class="row mb-2">
                            <label for="approve_foreman" class="col-sm-3 col-form-label">Manager Dept</label>
                            <div class="col-sm-9">
                                <select name="approve_foreman" id="approve_foreman" class="form-control form-control-sm">
                                    <option selected hidden disabled>Pilih Approval</option>
                                    <option value="0">Not Approve</option>
                                    <option value="1">Approve</option>
                                </select>
                                <small class="help-block text-danger"></small>
                            </div>
                        </div>
                        <div class="row mb-2" hidden>
                            <label for="approve_manager" class="col-sm-3 col-form-label">Manager HRGA</label>
                            <div class="col-sm-9">
                                <select name="approve_manager" id="approve_manager" class="form-control form-control-sm">
                                    <option selected hidden disabled>Pilih Approval</option>
                                    <option value="0">Not Approve</option>
                                    <option value="1">Approve</option>
                                </select>
                                <small class="help-block text-danger"></small>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- SECOND APPROVAL -->
                    <?php if (in_groups('Manager HRGA')) : ?>
                        <div class="row mb-2" hidden>
                            <label for="approve_foreman" class="col-sm-3 col-form-label">Manager Dept</label>
                            <div class="col-sm-9">
                                <select name="approve_foreman" id="approve_foreman" class="form-control form-control-sm">
                                    <option selected hidden disabled>Pilih Approval</option>
                                    <option value="0">Not Approve</option>
                                    <option value="1">Approve</option>
                                </select>
                                <small class="help-block text-danger"></small>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="approve_manager" class="col-sm-3 col-form-label">Manager HRGA</label>
                            <div class="col-sm-9">
                                <select name="approve_manager" id="approve_manager" class="form-control form-control-sm">
                                    <option selected hidden disabled>Pilih Approval</option>
                                    <option value="0">Not Approve</option>
                                    <option value="1">Approve</option>
                                </select>
                                <small class="help-block text-danger"></small>
                            </div>
                        </div>
                    <?php endif; ?>


                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" class="btn btn-primary" id="submit" onclick="saveSpl()"></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->

<?= $this->endSection('content'); ?>