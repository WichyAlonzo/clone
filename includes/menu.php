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
                    <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                    </svg>
                </div>
                <div class="wrapper-left-elements">
                    <a class="wrapper-left-active" href="home.php" style="margin-top: 4px;"><strong class="mx-2">Inicio</strong></a>
                </div>
            </div>
        </a>
        <a href="notification.php">
            <div class="grid-sidebar p-3" style="margin: 0!important;">
                <div class="icon-sidebar-align position-relative">
                    <?php if ($notify_count === 0) {
                    } else if ($notify_count >= 1) { ?>
                    <i class="notify-count"><?php echo $notify_count; ?></i>

                <?php } else if ($notify_count > 10) { ?>
                    <i class="notify-count">+9</i>

                <?php } ?>
                <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z" />
                </svg>
                </div>
                <div class="wrapper-left-elements">
                    <a href="notification.php" style="margin-top: 4px"><strong class="mx-2">Notificaciones</strong></a>
                </div>
            </div>
        </a>
        <a href="<?php echo BASE_URL . $user->username; ?>">
            <div class="grid-sidebar p-3" style="margin: 0!important;">
                <div class="icon-sidebar-align">
                    <img src="assets/images/users/<?php echo $user->img ?>" height="26.25px" width="26.25px" alt="user" class="img-user" />
                </div>
                <div class="wrapper-left-elements">
                    <a href="profile.php?username=<?php echo $user->username; ?>" style="margin-top: 4px"><strong class="mx-2">Perfil</strong></a>
                </div>
            </div>
        </a>
        <a href="<?php echo BASE_URL . "account.php"; ?>">
            <div class="grid-sidebar p-3" style="margin: 0!important;">
                <div class="icon-sidebar-align">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                    </svg>
                </div>
                <div class="wrapper-left-elements">
                    <a href="<?php echo BASE_URL . "account.php"; ?>" style="margin-top: 4px"><strong class="mx-2">Ajustes</strong></a>
                </div>
            </div>
        </a>
        <a href="includes/logout.php">
            <div class="grid-sidebar p-3" style="margin: 0!important;">
                <div class="icon-sidebar-align">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                    </svg>
                </div>
                <div class="wrapper-left-elements">
                    <a href="includes/logout.php" style="margin-top: 4px"><strong class="mx-2">Salir</strong></a>
                </div>
            </div>
        </a>
    </div>
</div>