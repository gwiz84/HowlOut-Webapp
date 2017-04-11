
<div class="top-menu">

    <div class="col-sm-3">
        <a href="index.php" style="cursor:pointer;text-decoration:none;">
         <img class="top-logo" src="img/howlout_icon3.png" style="cursor:pointer; padding-top: 7px;">&nbsp;
            <span class="howloutLogoText" style="vertical-align: bottom;margin-left:-20px;">HowlOut</span>
        </a>
    </>
    </div>

    <div class="col-sm-6 " style="">

        <div class="" ">
            <i class="material-icons" style="color: #ffffff;vertical-align: middle;">search</i>
            <input class="top-menu-searchbar inputSearchBar" type="text" placeholder="Quick search...">
    </div>
    <div class="searchContent" style=""></div>
</div>
    <div class="col-sm-3" style="margin: 38px 0 0 0;">
        <i class="material-icons" style="color: #dddddd;vertical-align: middle;margin-left:10px;cursor:pointer;">notifications</i>
        <span style="font-size:14px;margin-left:20px;color: #dddddd;"><?php echo $_SESSION['name']; ?></span>
        <i class="fa fa-cog btnMenuSettings menuSettingsHover" aria-hidden="true" style="font-size: 20px;"></i>
    </div>
    
    <div class="menuSettings menuSettingsHover hidden">
        <i class="fa fa-user" style="color:#27AE60;"></i>&nbsp;&nbsp;<a href="aboutme.php" style="font-size:14px;">My profile</a><br>
        <i class="fa fa-lock" style="margin-top:5px;color:#F1C40F;"></i>&nbsp;&nbsp;<a href="logout.php" style="font-size:14px;">Log out</a>
    </div>

</div>
