<script src="js/checkLogin.js"></script>
<?php
if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {
    header("Location: login.php");
}
?>