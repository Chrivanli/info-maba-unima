<!DOCTYPE html>
<html lang="en">
    <head>
    <?php  
			$judul = $data['judul'];
		?>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $judul ?></title>
		<link rel="icon" href="<?= BASEURL; ?>/img/logo.png" type="image/x-icon"/>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                                    <!-- <div class="card-header d-flex justify-content-center">

                                        <h3 class="text-center font-weight-light my-4">Login</h3>
                                    </div> -->
                                    <div class="card-body">
                            <?php Flasher::flash(); ?>
                                        <div class="d-flex justify-content-center mb-3">
									    <img src="<?= BASEURL; ?>/img/logo.png" class="" alt="" style="width: 33%;">
                                        </div>
                                        <h5 class="fw-bold text-center">LOGIN ADMIN</h5>
                                        <form method="post" action="<?= BASEURL; ?>/login/loginUser">
                                        <div class="form-floating mb-3">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" name="username" required type="text" placeholder="Username" />
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" required type="password" placeholder="Password" />
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary col-12 mb-2" type="submit">Login</button>
                                            </div>
                                            <a class="small mb-0" href="<?= BASEURL; ?>">Kembali</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Created by &copy;Chrivanlis</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
