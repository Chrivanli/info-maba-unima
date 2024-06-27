<main>
    <div class="col mb-3 py-3 d-none d-sm-block sub-nav-bg">
        <ol class="breadcrumb mb-1 px-3 fs-6 fw-semibold">
            <li class="breadcrumb-item "><a href="<?= BASEURL; ?>" class="link">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/rekap" class="link">Mahasiswa Baru Rekap Total</a></li>
        </ol>
    </div>
    <div class="container-fluid px-4 mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card card-menu mb-3 col-12 shadow-sm animate__animated animate__slideInLeft">
                    <div class="card-body p-3 ">
                        <h3 class="card-title">Jalur Pendaftaran</h3>
                        <p class="card-text">Berisi data rekap berdasarkan semua jalur pendaftaran</p>
                        <div class="text-end">
                            <a href="<?= BASEURL; ?>/rekap/maba_rekap" class="btn btn-primary  shadow-sm" style="width: 200px;">Semua Jalur</a>
                        </div>
                    </div>
                </div>
                <div class="card card-menu mb-3 col-12 shadow-sm animate__animated animate__slideInRight">
                    <div class="card-body p-3 ">
                        <h3 class="card-title">Jenis Kelamin</h3>
                        <p class="card-text">Berisi data rekap berdasarkan jenis kelamin</p>
                        <div class="text-end">
                            <a href="<?= BASEURL; ?>/rekap/rekap_jk" class="btn btn-primary  shadow-sm" style="width: 200px;">Semua Jalur</a>
                        </div>
                    </div>
                </div>
                <div class="card card-menu mb-3 col-12 shadow-sm animate__animated animate__slideInLeft">
                    <div class="card-body p-3 ">
                        <h3 class="card-title">Total</h3>
                        <p class="card-text">Berisi total rekap daftar kembali</p>
                        <div class="text-end">
                            <a href="<?= BASEURL; ?>/rekap/total" class="btn btn-primary  shadow-sm" style="width: 200px;">Total</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>