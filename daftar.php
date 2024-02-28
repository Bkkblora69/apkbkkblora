<?php require_once('includes/init.php'); ?>

<?php
$errors = array();
$sukses = false;

if(isset($_POST['submit'])):            
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $role = "user";
    
    if(!$username) {
        $errors[] = 'Username tidak boleh kosong';
    }       
    
    if(!$password) {
        $errors[] = 'Password tidak boleh kosong';
    }       
    
    if($password != $password2) {
        $errors[] = 'Password harus sama keduanya';
    }       
    
    if(!$nama) {
        $errors[] = 'Nama tidak boleh kosong';
    }       
    
    if(!$email) {
        $errors[] = 'Email tidak boleh kosong';
    }
    
    if(!$role) {
        $errors[] = 'Role tidak boleh kosong';
    }
    
    // Cek Username
    if($username) {
        $query = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'");
        $cek = mysqli_fetch_array($query);
        if(!empty($cek)) {
            $errors[] = 'Username sudah digunakan';
        }
    }
    
    if(empty($errors)):
        $pass = sha1($password);
        $simpan = mysqli_query($koneksi,"INSERT INTO user (id_user, username, password, nama, email, role) VALUES ('', '$username', '$pass', '$nama', '$email', '$role')");
        if($simpan) {
            redirect_to('login.php');        
        }else{
            $errors[] = 'Data gagal disimpan';
        }
    endif;

endif;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Selamat Datang di Sistem Penunjang Keputusan</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
</head>

<body class="bg-gradient-purple">
    <nav class="navbar navbar-expand-lg navbar-dark bg-white shadow-lg pb-3 pt-3 font-weight-bold">
        <div class="container">
            <a class="navbar-brand text-danger" style="font-weight: 900;" href="login.php"> <i class="fa fa-database mr-2 rotate-n-15"></i> PEMILIHAN LOKASI USAHA DENGAN SAW</a>
        </div>
    </nav>

    <div class="container">
        <!-- Outer Row -->
        <div class="row d-plex justify-content-between mt-5">

            <div class="col-xl-12 col-lg-12 col-md-12 mt-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Daftar</h1>
                                    </div>
                                    <?php if (!empty($errors)) : ?>
                                        <?php foreach ($errors as $error) : ?>
                                            <div class="alert alert-danger text-center"><?php echo $error; ?></div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                    <form class="user" action="daftar.php" method="post">
                                        <div class="row">
                <div class="form-group col-md-6">
                    <label class="font-weight-bold">Username</label>
                    <input autocomplete="off" type="text" name="username" required class="form-control"/>
                </div>
                
                <div class="form-group col-md-6">
                    <label class="font-weight-bold">Password</label>
                    <input autocomplete="off" type="password" name="password" required class="form-control"/>
                </div>
                
                <div class="form-group col-md-6">
                    <label class="font-weight-bold">Ulangi Password</label>
                    <input autocomplete="off" type="password" name="password2" required class="form-control"/>
                </div>
                
                <div class="form-group col-md-6">
                    <label class="font-weight-bold">Nama</label>
                    <input autocomplete="off" type="text" name="nama" required class="form-control"/>
                </div>
                
                <div class="form-group col-md-6">
                    <label class="font-weight-bold">E-Mail</label>
                    <input autocomplete="off" type="email" name="email" required class="form-control"/>
                </div>
            </div>

                                        <button name="submit" type="submit" class="btn btn-danger btn-user btn-block"><i class="fas fa-fw fa-sign-in-alt mr-1"></i> Daftar</button>

                                        <a href="login.php" class="btn btn-primary btn-user btn-block"><i class="fas fa-fw fa-sign-in-alt mr-1"></i> Kembali Login </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>
</body>

</html>