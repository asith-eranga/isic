<?php
/**
 * User: Asith
 * Date: 22-Oct-17
 * Time: 5:15 PM
 */
    require_once(DOC_ROOT . 'system/user/classes/systemsettings.php');

    $system_settings = new SystemSettings();
    $data_system = $system_settings->selectAll();
    $system_settings->extractor($data_system);
?>

<section class="topbar hidden-xs hidden-xs">
    <div class="content-wrap">
        <div class="container-fluid">
            <div class="topbar-inner clearfix">

                <div class="section-menu">
                    <div id="menu-top" class="menu top-menu-wrapper" role="navigation">
                        <nav class="top-menu-container">

                            <ul id="top-navigation" class="top-menu menu">
                                <?php if (!empty($system_settings->email())){ ?>
                                <li>
                                    <a href="mailto:<?php echo $system_settings->email(); ?>" class="topbar-sign-in">
                                        <img src="<?php echo HTTP_PATH; ?>images/icons/email.png"> <?php echo $system_settings->email(); ?>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if (!empty($system_settings->telephone1())){ ?>
                                <li>
                                    <span class="topbar-sign-in ">
                                        <img src="<?php echo HTTP_PATH; ?>images/icons/phone.png">
                                         <a href="tel:<?php echo $system_settings->telephone1(); ?>" class="topbar-sign-in"><?php echo $system_settings->telephone1(); ?></a>
                                        <?php if (!empty($system_settings->telephone2())){ ?>
                                            | <a href="tel:<?php echo $system_settings->telephone2(); ?>" class="topbar-sign-in"><?php echo $system_settings->telephone2(); ?></a>
                                        <?php } ?>
                                    </span>
                                </li>
                                <?php } ?>
                                <?php if (!empty($system_settings->addressLine1())){ ?>
                                <li>
                                    <span class="topbar-sign-in ">
                                        <img src="<?php echo HTTP_PATH; ?>images/icons/location.png">
                                        <?php
                                            $site_address = $system_settings->addressLine1();
                                            if (!empty($system_settings->addressLine2())) {
                                                $site_address .= ' | ' . $system_settings->addressLine2();
                                            }
                                            if (!empty($system_settings->addressLine3())) {
                                                $site_address .= ' | ' . $system_settings->addressLine3();
                                            }
                                            if (!empty($system_settings->addressLine4())) {
                                                $site_address .= ' | ' . $system_settings->addressLine4();
                                            }
                                            /*if (!empty($system_settings->addressLine5())) {
                                                $site_address .= ' | ' . $system_settings->addressLine5();
                                            }*/
                                            echo $site_address;
                                        ?>
                                    </span>
                                </li>
                                <?php } ?>
                            </ul>
                        </nav>
                        <nav class="top-menu-container ">
                            <ul id="top-navigation" class="top-menu menu pull-right">
                                <?php if (!empty($system_settings->facebook())){ ?>
                                <li>
                                    <a href="<?php echo $system_settings->facebook(); ?>" class="topbar-sign-in social-icons icon-circle">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if (!empty($system_settings->instagram())){ ?>
                                <li>
                                    <a href="<?php echo $system_settings->instagram(); ?>" class="topbar-sign-in social-icons icon-circle">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if (!empty($system_settings->twitter())){ ?>
                                <li>
                                    <a href="<?php echo $system_settings->twitter(); ?>" class="topbar-sign-in social-icons icon-circle">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if (!empty($system_settings->pinterest())){ ?>
                                    <li>
                                        <a href="<?php echo $system_settings->pinterest(); ?>" class="topbar-sign-in social-icons icon-circle">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="header-inner">
    <div class="content-wrap">
        <div class="container">
            <div id="site-branding" class="site-branding">
                <h1 id="site-title" class="logo h1 img-logo">
                    <a href="<?php echo HTTP_PATH; ?>" rel="home">
                        <?php $path_info_main_logo = pathinfo($system_settings->siteLogo()); ?>
                        <img id="logo" src="<?php echo $system_settings->siteLogo(); ?>" alt="<?php echo $path_info_main_logo['filename']; ?>"  />
                        <span class="site-title">ISIC - Sri Lanka</span>
                    </a>
                </h1>
            </div>

        </div>

    </div>
</div>
