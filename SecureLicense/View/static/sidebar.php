<?php
$get_profile_data = new SecureLicense\Classes\Profile();
$profile          = $get_profile_data->get_profile_data();
?>
<div class="page-wrapper chiller-theme toggled">
    <header>
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="<?= CURRENT ?>">Secure License</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
						<?php if ( isset( $profile["avatar"] ) && ! empty( $profile["avatar"] ) ): ?>
                            <img class="img-responsive img-rounded" src="<?= get_uploads_img( $profile['avatar'] ) ?>">
						<?php else: ?>
                            <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg">
						<?php endif; ?>
                    </div>
                    <div class="user-info">
            <span class="user-name"><?=isset($profile["name"]) ? $profile["name"] : "Uğur"?>
              <strong><?=isset($profile["lastname"]) ? $profile["lastname"] : "Tosun"?></strong>
            </span>
                        <span class="user-role">Yönetici</span>

                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>Genel</span>
                        </li>
                        <li class="<?php active_sidebar_item( 0, 'index' ); ?>">
                            <a href="<?= get_url( '' ) ?>">
                                <i class="fa fa-home"></i>
                                <span>Anasayfa</span>
                            </a>
                        </li>
                        <li class="header-menu">
                            <span>Lisans İşlemleri</span>
                        </li>
                        <li class="<?php active_sidebar_item( 0, 'add-license' ); ?>">
                            <a href="<?= get_url( 'add-license' ) ?>">
                                <i class="fas fa-plus"></i>
                                <span>Lisans Ekle</span>
                            </a>
                        </li>
                        <li class="<?php active_sidebar_item( 0, 'licenses' ); ?>">
                            <a href="<?= get_url( 'licenses' ) ?>">
                                <i class="fas fa-scroll"></i>
                                <span>Lisanslar</span>
                            </a>
                        </li>
                        <li class="<?php active_sidebar_item( 0, 'notice-licenses' ); ?>">
                            <a href="<?= get_url( 'notice-licenses' ) ?>">
                                <i class="fas fa-exclamation-triangle"></i>
                                <span>Lisanssız Kullanımlar</span>
                            </a>
                        </li>
                        <li class="<?php active_sidebar_item( 0, 'expired-licenses' ); ?>">
                            <a href="<?= get_url( 'expired-licenses' ) ?>">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>Süresi Dolan Lisanslar</span>
                            </a>
                        </li>
                        <li class="header-menu">
                            <span>Kullanıcı</span>
                        </li>
                        <li class="<?php active_sidebar_item( 0, 'license-user' ); ?>">
                            <a href="<?= get_url( 'license-user' ) ?>">
                                <i class="fas fa-user"></i>
                                <span>Profil</span>
                            </a>
                        </li>
                        <li class="<?php active_sidebar_item( 0, 'administrator' ); ?>">
                            <a href="<?= get_url( 'administrator' ) ?>">
                                <i class="fas fa-user-tie"></i>
                                <span>Yönetici</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <a href="<?=CURRENT.'/quit/'?>">
                    <i class="fa fa-power-off"></i>
                </a>
                <a href="<?=CURRENT.'/download/'?>" target="_blank">
                    <i class="fas fa-download"></i>
                </a>
                <a href="javascript:;" data-toggle="modal" data-target="#code">
                    <i class="fas fa-code"></i>
                </a>
            </div>
        </nav>
    </header>
    <!-- sidebar-wrapper  -->