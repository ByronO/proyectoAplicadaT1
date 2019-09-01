
<!-- Navigation -->
<?php
include_once 'public/header.php';
include_once 'public/navbar.php';
?>

<!-- Page Content -->
<div class="container">


    <!-- /.row -->
    <div class="row">
        <?php
        foreach($vars['products'] as $pro){
            ?>
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <img class="card-img-top" src="<?php echo $pro[4]?>"  alt="">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $pro[1]?></h4>
                        <p class="card-text"><?php echo $pro[3]?></p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">CRC <?php echo $pro[2]?></a>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>
        <!-- /.row -->
    </div>
</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
