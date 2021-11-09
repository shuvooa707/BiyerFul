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
    "../public/css/user.css",
    "../public/css/common.css"
]);
?>
<!-- /include page specific styles -->




<div class="container profile-detail-container">
    <div class="row mt-5 pb-5 justify-content-between">
        <div class="col-lg-4">
            <h4 class="text-right">
                <i class="fas fa-cog"></i>
            </h4>
            <h5 class="py-2 pb-3 pl-2 mb-0 bg-info text-light">
                <span class="name"><?php echo $param['user']["name"] ?></span>
            </h5>
            <img class="w-100" height="220px" src="../public/image/<?php echo $param['user']["image"]; ?>" alt="">

            <div class="card shadow-none mt-2">
                <div class="card-body shadow-none p-0">
                    <ul class="list-group text-dark">
                        <a href="/profile/shortlisted"  class="list-group-item text-dark">
                            <i class="fa fa-star"></i>
                            <span class="cursor-pointer">Shortlisted Profiles</span>
                        </a>
                        <a href="/profile/liked" class="list-group-item text-dark">
                            <i class="fa fa-thumbs-up"></i>
                            <span class="cursor-pointer">Liked Profiles</span>
                        </a>
                        <a href="/profile/ignored" class="list-group-item text-dark">
                            <i class="fa fa-thumbs-down"></i>
                            <span class="cursor-pointer">Ignored Profiles</span>
                        </a>
                        <a href="/profile/blocked" class="list-group-item text-dark">
                            <i class="fa fa-thumbs-down"></i>
                            <span class="cursor-pointer">Blocked Profiles</span>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card bio-data">
                <div class="card-header bg-info text-light py-1">
                    <span class="logo">
                        <i class="fas fa-user"></i>
                    </span>
                    BIO DATA
                </div>
                <div class="card-body">
                    <h6 class="info-row">Name : <span class="name"><?php echo $user["name"] ?></span></h6>
                    <h6 class="info-row">Age : <span class="age"><?php echo $user["age"] ?></span></h6>
                    <h6 class="info-row">Education : <span class="education"><?php echo $user["email"] ?></span></h6>
                    <h6 class="info-row">Profession : <span class="profession"><?php echo $user["username"] ?></span></h6>
                </div>
            </div>
            <!-- <div class="card bio-data my-5">
                <div class="card-header bg-info text-light py-1">
                    <span class="logo">
                        <i class="fas fa-user"></i>
                    </span>
                    BIO DATA
                </div>
                <div class="card-body">
                    <h6 class="info-row">Name : <span class="name"><?php echo $param['user']["name"] ?></span></h6>
                    <h6 class="info-row">Age : <span class="age"><?php echo $param['user']["age"] ?></span></h6>
                    <h6 class="info-row">Education : <span class="education"><?php echo $param['user']["email"] ?></span></h6>
                    <h6 class="info-row">Profession : <span class="profession"><?php echo $param['user']["username"] ?></span></h6>
                </div>
            </div> -->
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>