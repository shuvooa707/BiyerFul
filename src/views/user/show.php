
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




<div class="container profile-detail-container" data-id="<?php echo $user["id"]; ?>">
    <div class="row my-5  justify-content-around">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body m-0 p-0" style="min-height: 200px;">
                    <img class="w-100 user-profile-picture" src="../public/image/<?php echo $user["image"]; ?>" alt="">
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body m-0 p-0" style="min-height: 200px;">
                    <button class="btn like-button m-2 px-2 py-1 <?php if ($liked) echo "liked"; ?>" onclick="like(this)" data-type="<?php $liked ? print("liked") : print("like") ?>">
                        <?php $liked ? print("Liked") : print("Like"); ?>
                        <i class="fas fa-thumbs-up"></i>
                    </button>
                    <button class="btn ignore-button m-2 px-2 py-1 <?php if ($ignored) echo "liked"; ?>" onclick="ignore(this)" data-type="<?php if ($ignored) echo "unignore"; else echo "ignore"; ?>">
                        <?php if ($ignored) echo "Ignored"; else echo "Ignore"; ?>
                        <i class="fas fa-thumbs-down"></i>
                    </button>
                    <button class="btn m-2 px-2 py-1 <?php if ($shortlisted) echo "shortlisted"; ?>" onclick="shortlist(this)" data-type="<?php if ($shortlisted) echo "unshortlist"; else echo "shortlist"; ?>">
                        <?php if ($shortlisted) echo "Shortlisted"; else echo "Shortlist"; ?>
                        <i class="fas fa-star text-warning"></i>
                    </button>
                    <button class="btn m-2 px-2 py-1" onclick="block()">
                        Block
                        <i class="fas fa-flag text-dark"></i>
                    </button>
                    <button class="btn m-2 px-2 py-1" onclick="messege()">
                        Messege
                        <i class="fab fa-facebook-messenger"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row mt-3 justify-content-around">
        <div class="col-lg-5 col-md-12">
            <div class="card w-100 bio-data">
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
            </div>
        </div>
        <div class="col-lg-5 col-md-12">
            <div class="card w-100 bio-data">
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
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>