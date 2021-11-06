<div class="modal fade login-prompt-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
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
                <div class="col-lg-8">

                </div>
            </div>
        </div>
    </div>
</div>