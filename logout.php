<?php
    // Delete the cookies
    setcookie("userid", "", time() - 3600, "/");
    setcookie("nick_name", "", time() - 3600, "/");
    echo
    "<script>
        alert('Logout successful');
        window.location.href = 'index.php';
    </script>";
?>