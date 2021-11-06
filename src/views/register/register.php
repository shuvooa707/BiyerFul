<?php
    if (check()) 
    {
        header("Location:/profile");
        die;
    }
?>
<?php require_once __DIR__ . "/../layout/header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php 
                $loginAttempted = session("login-attempted");
                if ( $loginAttempted ) {
                    echo "<div class='alert alert-danger mt-5'> <strong>Registration Failed </strong></div>";
                }
            ?>
            <div class="card my-5">
                <div class="card-header bg-info text-light">
                    Register
                </div>
                <div class="card-body">
                    <form action="register/store" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="from-group my-2 col-lg-6">
                                <input type="text" class="form-control form-control-sm" name="fname" id="" placeholder="First Name">
                            </div>
                            <div class="from-group my-2 col-lg-6">
                                <input type="text" class="form-control form-control-sm" name="lname" id="" placeholder="Last Name">
                            </div>
                            <div class="from-group my-2 col-lg-6">
                                <input type="number" class="form-control form-control-sm" name="age" id="" placeholder="Age"><br>
                            </div>
                            <div class="from-group my-2 col-lg-6">
                                <select name="gender" id="" class="form-control">
                                    <option value="">Choose...</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="from-group my-2 col-lg-6">
                                <input type="email" class="form-control form-control-sm" name="email" id="" placeholder="Email"><br>
                            </div>
                            <div class="from-group my-2 col-lg-6">
                                <input type="file" class="form-control form-control-sm" name="image" id="">
                            </div>
                            <div class="from-group my-2 col-lg-6">
                                <input type="text" class="form-control form-control-sm" name="username" id="" value="shuvo">
                            </div>
                            <div class="from-group my-2 col-lg-6">
                                <input type="password" class="form-control form-control-sm" name="password" id="" value="shuvo">
                            </div>
                            <div class="from-group my-2 col-lg-6">
                                <input type="submit" class="btn btn-info px-5 form-control-sm" value="Register">
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>