<nav class="navbar navbar-expand-lg bg-info text-light">
    <a class="navbar-brand text-light" href="#">Biyer Ful</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link text-light" href="/">Home<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>

    <!-- navbar right -->
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <?php
            
                if (check()) 
                {
                    echo
                    '
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/signout">Sign Out</a>
                    </li>';
                } 
                else 
                {
                    echo "<li class='nav-item'>
                            <a class='nav-link text-light' href='/login'>Sign In</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link text-light' href='/register'>Register</a>
                        </li>";
                }
            ?>
        </ul>
    </div>

</nav>