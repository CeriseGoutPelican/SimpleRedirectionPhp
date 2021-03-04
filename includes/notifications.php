<?php
if (isset($_SESSION['notice'])) {
    
    echo '<div class="max-w-5xl mx-auto w-full my-5 px-3 py-2 bg-'.$_SESSION['notice']['color'].'-100 text-center text-'.$_SESSION['notice']['color'].'-800 rounded-md">';
        echo $_SESSION['notice']['message'];
    echo '</div>';

    unset($_SESSION['notice']);

}