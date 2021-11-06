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
    <div class="row justify-content-center">

        <!-- user list container -->
        <div class="col-lg-9 user-list-container">
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
                    "<a href='/user/$id' class='user'>
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
                                        <img class='' style='max-width:120px; ' src='$image' alt=''>
                                    </div>
                                    <div class='col-lg-7 p-2'>
                                        jdfgjdfj
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>";
                }
            ?>
        </div>
        <!-- /user list container -->
    </div>
</div>

<?php include "homePageModals.php"; ?>


<script defer>
    let loggedIn = <?php check() ? print(1) : print(0) ?>;
    if ( !loggedIn ) 
    {
        let userCards = [...document.querySelectorAll("a.user")];
        console.log(userCards);
        userCards.forEach( user => {
            user.addEventListener("click", () => {
                window.event.preventDefault();
                // show login alert
                // alert(".... Please Login To See Profile ....");
                $('.login-prompt-modal').modal('show');
            });
        });
    }
</script>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>