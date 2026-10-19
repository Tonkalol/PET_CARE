<?php 
    include_once './layouts/header.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = null;
    }
?>



<?php 
    include_once './layouts/footer.php'
?>