<?php
require_once('includes/init.php');

$user_role = get_role();

$page = "Dashboard";
        require_once('template/header.php');

	
?>

    <div class="mb-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-home"></i> Dashboard</h1>
        </div>



            <!-- Content Row -->
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Selamat datang <span class="text-uppercase"><b><?php echo $_SESSION['username']; ?>!</b></span> Anda bisa mengoperasikan sistem ini.
            </div>
            <div class="row">
                
                
            </div>
        
    </div>

<?php
    require_once('template/footer.php');

?>