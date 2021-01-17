<?php require_once('navbar.php');?>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Tabel Mapel</h3>
                <!-- Button trigger modal -->
                <div class="row">
                    <div class="col-lg-9">
                        <button type="button" class="btn btn-success" style="color: white;" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus-square"></i>
                                Tambah Mapel
                        </button>
                        <br><br>
                    </div>
                    <div class="col-lg-3">
                        <form>
                            <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cari....">
                            </div>
                        </form>
                    </div>
                </div>
                    
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mata Pelajaran</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kelas</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Guru</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Siswa</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="fas fa-window-close"></i> Tutup
                        </button>
                        <button type="button" class="btn btn-primary">
                            <i class="fas fa-check"></i> Simpan
                        </button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Mata Pelajaran</th>
                                <th class="border-top-0">Kelas</th>
                                <th class="border-top-0">Guru</th>
                                <th class="border-top-0">Siswa</th>
                                <th class="border-top-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>B Indonesia</td>
                                <td>A</td>
                                <td>Dr. Sucipto Mangunjaya, S.Pd.</td>
                                <td>Siti Fatimah</td>
                                <td>
                                    <a href="edit-mapel.php" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="detail-mapel.php" class="btn btn-info">
                                        <i class="fas fa-list"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Matematika</td>
                                <td>A</td>
                                <td>Angga Putra, S.Pd.</td>
                                <td>Siti Fatimah</td>
                                <td>
                                    <a href="edit-mapel.php" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="detail-mapel.php" class="btn btn-info">
                                        <i class="fas fa-list"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<?php require_once('footer.php');?>
