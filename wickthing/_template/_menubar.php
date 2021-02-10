		<!-- menubar - start -->
		<nav>
          <input type="checkbox" id="check">
          <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
          </label>
          <label class="logo"><?php if(isset($websiteTitle)){echo $websiteTitle;} ?></label>
          <ul>
            <li><a <?php if(isset($pageActive) && $pageActive=="home"){echo " class=\"active\"";} ?> href="home.php">Home</a></li>
            <li><a <?php if(isset($pageActive) && $pageActive=="play"){echo " class=\"active\"";} ?> href="play.php"><i class="fas fa-gamepad"></i>Play</a></li>
            <li><a <?php if(isset($pageActive) && $pageActive=="profile"){echo " class=\"active\"";} ?> href="profile.php"><i class="fas fa-user-circle"></i>Profile</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
          </ul>
        </nav>
		<!-- menubar - end -->





