<main>
    <div class="col mb-3 py-3 d-none d-sm-block sub-nav-bg">
        <ol class="breadcrumb mb-1 px-3 fs-6 fw-semibold">
            <li class="breadcrumb-item "><a href="<?= BASEURL; ?>/admin" class="link">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/action" class="link">Kelola Seleksi</a></li>
        </ol>
    </div>
    <div class="container-fluid px-4">
		<?php Flasher::flash(); ?>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="p-3 mb-3 bg-info-subtle text-info-emphasis border-start border-5 border-info">
                        <p  class="fst-italic mb-0"><i class="m-2" data-feather="info"></i>Ubahlah nama seleksi jalur masuk PTN jika terjadi perubahan nama seleksi.
                        </p>
                    </div>
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Jalur</th>
                            <th scope="col">Nama Seleksi</th>
                            <th scope="col">Singkatan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                          foreach($data['seleksi'] as $row):
                            $kd_seleksi = $row['kd_seleksi'];
                            $jalur      = $row['jalur'];
                            $nama_seleksi  = $row['nama_seleksi'];
                            $seleksi    = $row['singkatan']
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $kd_seleksi; ?></td>
                            <td><?php echo $jalur; ?></td>
                            <td><?php echo $nama_seleksi; ?></td>
                            <td class="text-center"><?php echo $seleksi; ?></td>
                            <td class="text-center">
                                <a href="" type="button" class="btn btn-info p-1 tampilModalUbah" data-bs-toggle="modal" 
                                    data-id="<?=$row['kd_seleksi'];?>" data-url="<?= BASEURL; ?>" data-bs-target="#formModal">
                                    <i data-feather="edit-3" style="width: 28px; height: 18px;"></i>
                                </a>
                            </td>
                        </tr>
                            <!-- Modal -->
                        
                        <?php endforeach ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="formModalLabel">Judul</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
               
                    <div class="modal-body">
                    <form id="formModalAction" action="" method="post">
                            <input type="hidden" class="form-control" name="kd_seleksi" id="kd_seleksi">
                            <input type="hidden" class="form-control" name="jalur" id="jalur">
                            
                            <div class="mb-3">
                                <label class="form-label">Nama Seleksi</label>
                                <input type="text" class="form-control" name="nama_seleksi" id="nama_seleksi" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Singkatan</label>
                                <input type="text" class="form-control" name="singkatan" id="singkatan" autocomplete="off" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">OK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>