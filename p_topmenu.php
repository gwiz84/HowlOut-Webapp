<div class="top-menu" data-banshee="<?php echo $_SESSION['apiKey']; ?>" data-grid="<?php echo $_SESSION['facebookId']; ?>">

    <div class="col-sm-3">
        <a href="index.php" style="cursor:pointer;text-decoration:none;">
           <img class="top-logo" src="img/logo5.png" style="cursor:pointer; padding-top: 7px;width:90px;">&nbsp;
           <span class="howloutLogoText" style="vertical-align: middle;margin-left:5px;">HowlOut</span>
       </a>
       </>
   </div>

   <div class="col-sm-6" style="">

    <div class="">
        <i class="material-icons" style="color: #ffffff;vertical-align: middle;">search</i>
        <input class="top-menu-searchbar inputSearchBar" type="text" placeholder="Quick search...">
    </div>
    <div class="searchContent topresultcontent" style="" hidden></div>
</div>
<div class="col-sm-3" style="margin: 38px 0 0 0;">
    <i class="material-icons btnNotifications" style="color: #dddddd;vertical-align: middle;margin-left:10px;cursor:pointer;" >notifications</i>
    <img src="img/noticon3.png" class="imgNotificationAlert btnNotifications" style="width:15px;margin-left:-15px;vertical-align:bottom;cursor:pointer;"></img>

    <span style="font-size:14px;margin-left:20px;color: #dddddd;"><?php echo $_SESSION['name']; ?></span>
    <i class="fa fa-cog btnMenuSettings menuSettingsHover" aria-hidden="true" style="font-size: 20px;"></i>
    <div class="notificationContent topresultcontent" style="">
<!--        <div class="notificationItem">-->
<!--            <img src="img/noticon.png" style="width:30px;background-size:contain;"><span style="font-size:12px;color:black;margin-left:10px;">Test</span>-->
<!--        </div>-->
    </div>
</div>

<div class="menuSettings menuSettingsHover hidden topresultcontent">
    <i class="fa fa-user" style="color:#27AE60;"></i>&nbsp;&nbsp;<a href="aboutme.php" style="font-size:14px;">My profile</a><br>
    <i class="fa fa-lock" style="margin-top:5px;color:#F1C40F;"></i>&nbsp;&nbsp;<a href="logout.php" style="font-size:14px;">Log out</a>
</div>

</div>
