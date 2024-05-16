<?php
include('./admin/connectToDb.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG SYSTEM</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <style>
        .post-details{
    border: 2px solid #009999;
    background-color: #fff;
    border-radius: 10px;
    padding: 10px;
   
    
}
.details-btn{
    display: block;
    text-align: center;
    color: #fff;
    background-color: #009999;
    border-radius: 5px;
    transition: .5s ease;
    border: 2px solid transparent;
    padding: 5px;
}
.details-btn:hover{
    color: #009999;
    background-color: #fff;
    border: 2px solid #009999;
}
    </style>

</head>
<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-film mr-2"></i>
             Blog system
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
           
        </div>
    </nav>

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/hero.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Posts
            </h2>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <form action="" class="tm-text-primary">
                    Page <input type="text" value="1" size="1" class="tm-input-paging tm-text-primary"> of 200
                </form>
            </div>
        </div>
        <div class="row tm-mb-90 tm-gallery justify-content-center">
        <?php
      $stmt = $connect->prepare("SELECT id, title, content, created_at FROM posts");
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        foreach ($result as $row) {
        ?>
 <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
    <div class='post-details'>
        <h2 class="tm-text-gray-light"><?php echo $row['title']?></h2>
        <span><?php echo $row['created_at']?></span>
        <p class='text-center'><?php echo $row['content'];?></p>
        <a class='details-btn' href="singlepost.php?id=<?php echo $row['id']; ?>">Show more details</a>
    </div>
</div>

        	

              
      <?php } ?>
  
            
                  
        </div> <!-- row -->
        <div class="row tm-mb-90">
            <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
                <a href="javascript:void(0);" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
                <div class="tm-paging d-flex">
                    <a href="index.php" class=" tm-paging-link">1</a>
                    <a href="" class="tm-paging-link">2</a>
                    <a href="" class="tm-paging-link">3</a>
                    <a href="javascript:void(0);" class="tm-paging-link">4</a>
                </div>
                <a href="javascript:void(0);" class="btn btn-primary tm-btn-next">Next Page</a>
            </div>            
        </div>
    </div> <!-- container-fluid, tm-container-content -->

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
          
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                    Copyright 2020 Catalog-Z Company. All rights reserved.
                </div>
                <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                    Designed by <a href="" class="tm-text-gray" rel="" target="_parent">Esraa</a>
                </div>
            </div>
        </div>
    </footer>
<script>

    </script>
    <script src="js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>
</html>