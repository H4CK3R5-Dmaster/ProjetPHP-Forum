<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="nav-link active btn btn-outline-success"  id="font" href="../otherPages/new.php">new article</a>
    <a class="nav-link active btn btn-outline-success"  id="font" href="../otherPages/user_articles.php">my article</a>
    <a class="nav-link active btn btn-outline-success"  id="font" href="../otherPages/member.php">members</a>

    <?php
      if (isset($_SESSION['auth'])) {
        ?>
        <a class="nav-link active btn btn-outline-success" href="../otherPages/profil.php?id=<?= $_SESSION['ID'];?>">my account</a>
        <a class="nav-link active btn-outline-success btn"  id="font" href="../../action/logout.php">logout</a>
        
        <?php
      }
    ?>
    <form method="GET" class="d-flex">
        <input class="form-control me-2"  type="search" placeholder="Search"  name="search">
        <button class="btn btn-success"  type="submit">Search</button>
    </form>
    
  </div>
</nav>