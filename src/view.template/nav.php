<!-- Navigationsleiste -->
<nav>
  <div class="container-fluid">
    <p id="pause">
    </p>
    <p id="time"></p>
    <div class="row">
      <span class="websiteName">S I E R R A</span>
    </div>
    <div class="row">
      <a class=<?php if($page == "index") {echo "'active'";} else {echo"''";}?> href="index.php">HOME</a>
      <a class=<?php if($page == "noten") {echo "'active'";} else {echo"''";}?> href="noten.php">NOTEN</a>
      <a class=<?php if($page == "todo") {echo "'active'";} else {echo"''";}?> href="todolist.php"> TO-DO LIST </a>
      <a class=<?php if($page == "login") {echo "'active'";} else {echo"''";}?> href="login.php"> LOGIN </a>
      <a class=<?php if($page == "admin") {echo "'active'";} else {echo"''";}?> href="admin.php"> ADMIN </a>
    </div>
  </div>
</nav>
