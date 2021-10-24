<?php require_once __DIR__ . "/../layout/header.php"; ?>

<!-- include page specific styles -->
<?php
inlcudeStyle([
    "public/css/user.css"
]);
?>
<!-- /include page specific styles -->

<div class="container mt-5">
    <div class="row justify-content-center filter-container">
        <div class="col-lg-8">

        </div>
    </div>
    <div class="row justify-content-center user-container">
        <div class="col-lg-7">

        <?php

            require_once "src/models/User.php";
            $users = (new User())->all();
            $totalUsers = count($users);
            for ($i=0; $i < $totalUsers; $i++) 
            { 
                $user = $users[$i];
                $name = $user['name'];
                $age = $user['age'];
                $image = $user['image'];
                $id = $user['id'];
                echo 
                "<div class='card user mt-2 '>
                    <div class='card-body p-0 m-1'>
                        <div class='row'>
                            <div class='col-lg-4'>
                                <img src='public/image/$image' alt='' class='user-thumb w-100'>
                            </div>
                            <div class='col-lg-8 text-left'>
                                <a href='user/$id' class='user-name'>
                                    $name
                                </a>
                                <span class='fa-egg-icon'>
                                    <i class='fas fa-egg ml-1' style=''></i>
                                </span>
                                <span class='user-age'>
                                    $age
                                </span>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        ?>

        </div>
    </div>
</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>