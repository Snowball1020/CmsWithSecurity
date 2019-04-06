<?php require('header.php'); ?>
  <body>
    <main class="container">
       <header>
         <h1> See pics!</h1>
          <a href="/tues/tues/index.php"> back Pic</a>
       </header>
       <?php 
          require('db.php'); 
          require ('appvars.php');      
          $sql = "SELECT profile FROM user;"; 
          $cmd = $db ->prepare($sql);         
          $cmd->execute(); 
          $profiles = $cmd->fetchAll(); 
      
          echo '<div class="photocontainer">'; 
          
          foreach($profiles as $profile) {
            echo '<div><img src="' . UPLOADPATH . $profile['profile'] . '">
            <a href="delete.php?profile=' . $profile['profile'] . '" onclick="return confirm(\'Are you sure?\');">Delete</a></div>';
          }
        echo '</div>'; 
        $cmd->closeCursor(); 

        ?>


    </main>
  </body>
</html>