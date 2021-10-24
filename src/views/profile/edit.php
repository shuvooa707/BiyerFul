<?php
// check if logged in
if (!check()) {
    header("Location:/");
    exit(0);
}
?>

<?php require_once __DIR__ . "/../layout/header.php"; ?>

<!-- include page specific styles -->
<?php
inlcudeStyle([
    "../public/css/user.css"
]);
?>
<!-- /include page specific styles -->

<!-- include page specific scripts -->
<?php
inlcudeScript([
    "../public/js/user.js"
]);
?>
<!-- /include page specific scripts -->




<div class="container profile-detail-container">
    <form action="/profile/update" method="post" enctype="multipart/form-data">
        <div class="row mt-5 justify-content-between">
            <div class="col-lg-4 text-right">
                <h5 class="text-center py-2 pb-3 mb-0 d-flex justify-content-around save-button-container">
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-save"></i>
                        Update
                    </button>
                    <button class="btn btn-success" onclick="window.event.preventDefault(); window.location = '/profile'">
                        <i class="fas fa-times"></i>
                        Cancel
                    </button>
                </h5>
                <img class="w-100" src="../public/image/<?php echo $param['user']["image"]; ?>" alt="">
                <div class="card">
                    <div class="card-body p-1 m-0 profile-image-galary-container">
                        <span onclick="highlightLeft()" class="prev-button">
                            <i class="fas fa-angle-left"></i>
                        </span>
                        <span class="profile-image-galary">
                            <img class="" style="width: 50px; height:50px;" src="../public/image/<?php echo $param['user']["image"]; ?>" alt="">
                            <img class="" style="width: 50px; height:50px;" src="../public/image/<?php echo $param['user']["image"]; ?>" alt="">
                            <img class="" style="width: 50px; height:50px;" src="../public/image/<?php echo $param['user']["image"]; ?>" alt="">
                            <img class="" style="width: 50px; height:50px;" src="../public/image/<?php echo $param['user']["image"]; ?>" alt="">
                        </span>
                        <span onclick="highlightLeft()" class="next-button">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body p-1 text-left">
                        <button class="btn" onclick="changeProfilePicture()">
                            Change
                            <i class="fas fa-upload"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <div class="card bio-data">
                    <div class="card-header bg-info text-light py-1">
                        <span class="logo">
                            <i class="fas fa-user"></i>
                        </span>
                        BIO DATA
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value='<?php echo $param['user']["name"] ?>' class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="">Age</label>
                            <input type="text" name="age" value='<?php echo $param['user']["age"] ?>' class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="card contact-detail my-5">
                    <div class="card-header bg-info text-light py-1">
                        <span class="logo">
                            <i class="fas fa-user"></i>
                        </span>
                        Contact Details
                    </div>
                    <div class="card-body">
                        <h6 class="info-row">Name : <span class="name"><?php echo $param['user']["name"] ?></span></h6>
                        <h6 class="info-row">Age : <span class="age"><?php echo $param['user']["age"] ?></span></h6>
                        <h6 class="info-row">Education : <span class="education"><?php echo $param['user']["email"] ?></span></h6>
                        <h6 class="info-row">Profession : <span class="profession"><?php echo $param['user']["username"] ?></span></h6>
                    </div>
                </div>
                <div class="card family-detail my-5">
                    <div class="card-header bg-info text-light py-1">
                        <span class="logo">
                            <i class="fas fa-contact"></i>
                        </span>
                        Contact Details
                    </div>
                    <div class="card-body">
                        <h6 class="info-row">Name : <span class="name"><?php echo $param['user']["name"] ?></span></h6>
                        <h6 class="info-row">Age : <span class="age"><?php echo $param['user']["age"] ?></span></h6>
                        <h6 class="info-row">Education : <span class="education"><?php echo $param['user']["email"] ?></span></h6>
                        <h6 class="info-row">Profession : <span class="profession"><?php echo $param['user']["username"] ?></span></h6>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>