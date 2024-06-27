<!DOCTYPE html>
<html lang="en">
    <head>
        <?php  
			$page = $data['page'];
			$judul = $data['judul']

		?>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title><?= $judul ?></title>
		<link rel="icon" href="<?= BASEURL; ?>/img/logo.png" type="image/x-icon"/>
        <link href="<?= BASEURL; ?>/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?= BASEURL; ?>/css/addStyle.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

		 <!-- Datatables -->
		 <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet"/>
		<!-- chart -->
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

		<!-- map -->
		<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
		<script src="https://cdn.amcharts.com/lib/4/maps.js"></script>
		<script src="https://cdn.amcharts.com/lib/4/geodata/indonesiaHigh.js"></script>
		<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

		<style>
          #chartdiv {
            width: 100%;
            height: 450px;
          }
        </style>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
        <script src="<?= BASEURL; ?>/js/buttons.html5.js"></script>					
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.js"></script>
    </head>
<body class="sb-nav-fixed">
	<nav class="sb-topnav navbar navbar-expand navbar-dark nav-bg shadow">
		<!-- Navbar Brand-->
		<a class="navbar-brand ps-3" href="<?= BASEURL; ?>"><h6 class="text-center">INFORMASI MABA UNIMA</h6></a>
		<!-- Sidebar Toggle-->
		<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i data-feather="menu"></i></button>
		<!-- Navbar Search-->
		<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
			<div class="input-group" hidden>
				<input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
				<button class="btn btn-primary" id="btnNavbarSearch" type="button"><i data-feather="search"></i></button>
			</div>
		</form>
		<!-- Navbar-->
		<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i data-feather="user"></i></a>
				<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
					<li><a class="dropdown-item text-center" href="<?= BASEURL; ?>/login">Masuk <i data-feather="log-in" style="width: 15px;"></i></a></li>
				</ul>
			</li>
		</ul>
    </nav>
	<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
				<nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
					<div class="sb-sidenav-menu animate__animated animate__fadeIn">
						<div class="nav fix-scroll">
							<div class="sb-sidenav-menu-heading d-flex justify-content-center">
		  						
									<img src="<?= BASEURL; ?>/img/logo.png" class="" alt="" style="width: 60%;">
								
							</div>
							<a <?php if($page == "Home") echo "class='nav-link active'";?> class="nav-link" href="<?= BASEURL; ?>">
								<div class="sb-nav-link-icon"><i data-feather="home" style="width: 80%;"></i></div>
								Beranda
							</a>
							<a <?php if($page == "sebaran") echo "class='nav-link active'";?> class="nav-link" href="<?= BASEURL; ?>/sebaran">
								<div class="sb-nav-link-icon"><i data-feather="map" style="width: 80%;"></i></div>
								Sebaran Mahasiswa
							</a>
							<a <?php if($page == "mhs-pass" or $page == "mhs-reg" or $page == "mhs-nim") echo "class='nav-link collapsed active'";?> 
									class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMhsBaru" aria-expanded="false" aria-controls="collapseMhsBaru">
								<div class="sb-nav-link-icon"><i data-feather="book-open" style="width: 80%;"></i></div>
								Mahasiswa Baru
								<div class="sb-sidenav-collapse-arrow"><i data-feather="chevron-down"></i></div>
							</a>
								<div <?php if($page == "mhs-pass" or $page == "mhs-reg" or $page == "mhs-nim" or $page == "rekap") echo "class='collapse show'";?> 
										class="collapse" id="collapseMhsBaru" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion" style="margin-left: 10px;">
									<nav class="sb-sidenav-menu-nested nav">
										<a <?php if($page == "mhs-pass") echo "class='nav-link active'";?> class="nav-link" href="<?= BASEURL; ?>/lulus_seleksi">Lulus Seleksi</a>
										<a <?php if($page == "mhs-reg") echo "class='nav-link active'";?> class="nav-link" href="<?= BASEURL; ?>/daftar_kembali">Daftar Kembali</a>
										<a <?php if($page == "mhs-nim") echo "class='nav-link active'";?> class="nav-link" href="<?= BASEURL; ?>/rekap_nim">Rekap NIM</a>
										<a <?php if($page == "rekap") echo "class='nav-link active'";?> class="nav-link" href="<?= BASEURL; ?>/rekap">Rekap</a>
									</nav>
								</div>
						</div>
					</div>
					<!-- <div class="sb-sidenav-footer">
						<div class="small">Dashboard</div>
						Universitas Negeri Manado
					</div> -->
				</nav>
			</div>
        <div id="layoutSidenav_content">
			