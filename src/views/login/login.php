<?php
    if ( check() ) 
    {
        header("Location:/profile");
        die;
    }
?>
<?php require_once __DIR__ . "/../layout/header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-7">
            <div class="card my-5">
                <div class="card-header bg-info text-light">
                    Login
                </div>
                <div class="card-body">
                    <form action="login/signin" method="post">
                        <div class="form-group">
                            <input type="text" name="username" id="" class="form-control " value="<?php echo session("username"); ?>" placeholder="Username..." required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="password" id="" class="form-control" value="<?php echo session("password"); ?>" placeholder="Password..." required>
                            <?php
                            if (session("epassword")) {
                                echo '<label for="" class="text-danger"> Worng Password</label>';
                                session_destroy();
                            }
                            // dd(session("logged in") == "yes");
                            ?>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="" class="btn btn-info">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>