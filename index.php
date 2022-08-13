<?php require_once 'header.php';
    require_once "./Pages/side_menu.php";
?>

    <div class="content offset-md-2 container-fluid row">
        <?php 
        
        
        require_once './Includes/getProducts.php';
        getAllProducts();
        ?>
    </div>

<?php require_once 'footer.php' ;?>