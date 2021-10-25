<?php
    echo ('
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Studio!</div>
                ');
        if (isConnected()){
            echo '<div class="masthead-heading text-uppercase">You are connected '.$_SESSION['username'].' </div >';
        }else {
            echo '<div class="masthead-heading text-uppercase">It\'s Nice To Meet You </div >';
        }

        echo ('<a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>
            </div>
        </header>
    ');