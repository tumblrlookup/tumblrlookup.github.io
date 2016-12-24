<?php

    include_once('helper.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tumblr Lookup Tool</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="custom.css" type="text/css">
  </head>

  <body>
    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="index.php">Home</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Tumblr Lookup Tool</h3>
      </div>
      <div class="jumbotron">
      <?php
      if (!isset($_POST['submit']))
      {
      echo 
      '
        <h1>Welcome</h1>
        <p class="lead">Type username to get started </p>
        <form method="POST" action="">
                <input class="form-control" type="text" name="username" placeholder="Tumblr username">
                <button name="submit" type="submit" class="btn-sm btn-primary btn-sm">Search</button>
        </form>
       ';
      }
      else 
      {
          $tumblr = new Tumblr($_POST['username']);
          echo '<h3 class="text-muted">'.$tumblr->username.'</h3>';
          echo '<hr>';
          echo '<p>Last activity date: <kbd>'.$tumblr->day.'. '.$tumblr->month.' '.$tumblr->year.'.</kbd></p>';
          echo '<p>Last activity time: <kbd>'.$tumblr->time.'</kbd></p>';
          echo '<p>Total posts: <kbd>'.$tumblr->posts.'</kbd></p>';
          echo '<p>Blog title: <kbd>'.$tumblr->title.'</kbd></p>';
          echo '<a href="index.php">Search for another user</a>';
      }
        ?>
      </div>

      

      <footer class="footer">
        <p>&copy; 2016 <a href="https://youcantkillme.tumblr.com">youcantkillme</a> Inc.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
