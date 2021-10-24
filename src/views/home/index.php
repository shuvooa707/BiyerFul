<?php require_once __DIR__ . "/../layout/header.php"; ?>

<!-- include page specific styles -->
<?php
inlcudeStyle([
    "public/css/home.css",
    "public/css/common.css",
]);
?>
<!-- /include page specific styles -->


<div class="container mt-5">
    <!-- <div class="row">
        <div class="col-lg-12">
            <h1>Biyer Ful</h1>
            <h3>***Welcome***</h3>
        </div>
    </div> -->
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <?php
            for ($i = 0; $i < $totalUsers; $i++) 
            {
                $user = $users[$i];
                $id = $user["id"];
                $name = $user["name"];
                $age = $user["age"];
                $gender = $user["gender"];
                $profession = $user["profession"];
                $image = url("image/".$user["image"]);
                echo
                "<a href='/user/$id'>
                    <div class='card w-100 my-2'>
                        <div class='card-header text-light py-1 bg-genda'>
                            <strong>$name</strong>
                            <i class='fas fa-egg' style='font-size: 10px;'></i>
                            <small>$age</small>
                            <i class='fas fa-egg' style='font-size: 10px;'></i>
                            <small>$profession</small>
                        </div>
                        <div class='card-body p-0 m-0'>
                            <div class='row p-0 m-0'>
                                <div class='col-lg-3 p-0 m-0'>
                                    <img class='w-100' src='$image' alt=''>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>";
            }
            ?>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>