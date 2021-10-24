<?php

    echo "<h1 style='text-align:center;'>404</h1>";
    echo "<h4 style='text-align:center;'>Not Found!</h4>";
    echo "<a style='display:block; text-align:center;' href='/'>Go Back</a>";

    function error($error)
    {
        dd($error);
    }

    exit(0);