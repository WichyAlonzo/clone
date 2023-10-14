<div class="wrapper-left">
    <div class="sidebar-left">
        <div class="mb-3" style="margin-top: 12px">
            <div class="icon-sidebar-align">
                <img src="<?php echo BASE_URL . "/assets/images/twitter-logo.png"; ?>" alt="" height="30px" width="30px" />
            </div>
        </div>
        <a href="home.php">
            <div class="grid-sidebar bg-active p-3" style="margin: 0!important;">
                <div class="icon-sidebar-align">
                    <img src="<?php echo BASE_URL . "/includes/icons/tweethome.png"; ?>" alt="" height="26.25px" width="26.25px" />
                </div>
                <div class="wrapper-left-elements">
                    <a class="wrapper-left-active" href="home.php" style="margin-top: 4px;"><strong class="mx-2">Inicio</strong></a>
                </div>
            </div>
        </a>
        <a href="notification.php">
            <div class="grid-sidebar p-3" style="margin: 0!important;">
                <div class="icon-sidebar-align position-relative">
                <?php if ($notify_count < 9) { ?>
                        <i class="notify-count"><?php echo $notify_count; ?></i>
                    <?php }else if ($notify_count > 10) { ?>
                        <i class="notify-count">+9</i>
                    <?php } ?>
                    <img src="<?php echo BASE_URL . "/includes/icons/tweetnotif.png"; ?>" alt="" height="26.25px" width="26.25px" />
                </div>
                <div class="wrapper-left-elements">
                    <a href="notification.php" style="margin-top: 4px"><strong class="mx-2">Notificaciones</strong></a>
                </div>
            </div>
        </a>
        <a href="<?php echo BASE_URL . $user->username; ?>">
            <div class="grid-sidebar p-3" style="margin: 0!important;">
                <div class="icon-sidebar-align">
                    <img src="assets/images/users/<?php echo $user->img ?>" height="26.25px" width="26.25px"  alt="user" class="img-user" />
                </div>
                <div class="wrapper-left-elements">
                    <a href="profile.php?username=<?php echo $user->username; ?>" style="margin-top: 4px"><strong class="mx-2">Perfil</strong></a>
                </div>
            </div>
        </a>
        <a href="<?php echo BASE_URL . "account.php"; ?>">
            <div class="grid-sidebar p-3" style="margin: 0!important;">
                <div class="icon-sidebar-align">
                    <img src="<?php echo BASE_URL . "/includes/icons/tweetsetting.png"; ?>" alt="" height="26.25px" width="26.25px" />
                </div>
                <div class="wrapper-left-elements">
                    <a href="<?php echo BASE_URL . "account.php"; ?>" style="margin-top: 4px"><strong class="mx-2">Ajustes</strong></a>
                </div>
            </div>
        </a>
        <a href="includes/logout.php">
            <div class="grid-sidebar p-3" style="margin: 0!important;">
                <div class="icon-sidebar-align">
                    <i style="font-size: 26px;" class="fas fa-sign-out-alt"></i>
                </div>
                <div class="wrapper-left-elements">
                    <a href="includes/logout.php" style="margin-top: 4px"><strong class="mx-2">Salir</strong></a>
                </div>
            </div>
        </a>
    </div>
</div>