<?php $page=basename($_SERVER['PHP_SELF'],".php");
include "config.php";
$select="SELECT * FROM categories";
$query=mysqli_query($config,$select);
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="lo.css" />
    <link rel="stylesheet" href="style2.css" />
   
    
  </head>
  <body >

  <nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
  <div class="container">
    <a class="navbar-brand" href="index.php">BlogTime</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link <?=($page=="index")? 'active':''; ?>" href="index.php">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" 
          href="#" role="button" aria-haspopup="true" 
          aria-expanded="false">Categories</a>
          <div class="dropdown-menu">
          <?php while ($cats=mysqli_fetch_assoc($query)) {?>
							
            <a class="dropdown-item" href="category.php?id=<?= $cats['cat_id']?>">
              <?= $cats['cat_name'] ?></a>
            <?php } ?>
          </div>
        </li>
       
      </ul>
      <?php 
      if (isset($_GET['keyword'])){
        $keyword=$_GET['keyword'];
      }
      else {
        $keyword="";
      }
      ?>
      <div class="search-container">
      <form class="d-flex" action="search.php" method="GET">
        <input class="form-control me-sm-2" 
        type="text" placeholder="Search" name="keyword" 
        required maxlength="70" autocomplete="off" 
        value="<?= $keyword ?>">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
      <a href="login.php" class="icon-container">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
    </svg>
  </a>
  </div>
    </div>
  </div>
</nav>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>