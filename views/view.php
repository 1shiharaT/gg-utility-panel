<div id="gg-utility-pane">
  <div class="gg-utility-pane">
    <div class="gg-utility-pane-inner">
      <div class="gg-icon-button-wrap">
        <ul class="gg-icon-buttons">
          <?php
          foreach ( $panel_module_type->get_panel_type() as $key => $module) { ?>
            <h3 class="gg-in-effect"><?php echo __( $value , $this->plugin_slug ); ?></h3>
            <?php
            foreach ( $module as $key => $value) { ?>
            <li class="gg-icon-button gg-in-effect">
              <a href="<?php echo $value['url'] ?>" title="New post">
              <i class="dashicons dashicons dashicons-welcome-write-blog"></i><?php echo $value['label'] ?></a>
            </li>
            <?php
            }
            ?>
          <?php
          }
          ?>
            <li class="gg-icon-button gg-in-effect"><a href="http://leafcolor.com/forest-admin/wp-admin/post-new.php?post_type=page" title="New page"><i class="fa fa-file"></i></a></li>
            <li class="gg-icon-button gg-in-effect"><a href="http://leafcolor.com/forest-admin/wp-admin/media-new.php" title="Media"><i class="fa fa-picture-o"></i></a></li>
          <h3 class="gg-in-effect"><?php echo __( 'デザイン', $this->plugin_slug ); ?></h3>
            <li class="gg-icon-button gg-in-effect"><a href="http://leafcolor.com/forest-admin/wp-admin/themes.php" title="Themes"><i class="fa fa-magic"></i></a></li>
            <li class="gg-icon-button gg-in-effect"><a href="http://leafcolor.com/forest-admin/wp-admin/widgets.php" title="Widgets"><i class="fa fa-list-alt"></i></a></li>
            <li class="gg-icon-button gg-in-effect"><a href="http://leafcolor.com/forest-admin/wp-admin/nav-menus.php" title="Menus"><i class="fa fa-th-list"></i></a></li>
          <h3 class="gg-in-effect"><?php echo __( '管理', $this->plugin_slug ); ?></h3>
            <li class="gg-icon-button gg-in-effect"><a href="http://leafcolor.com/forest-admin/wp-admin/edit-comments.php" title="Comments"><i class="fa fa-comment-o"></i></a></li>
            <li class="gg-icon-button gg-in-effect"><a href="http://leafcolor.com/forest-admin/wp-admin/users.php" title="Users"><i class="fa fa-user"></i></a></li>
            <li class="gg-icon-button gg-in-effect"><a href="http://leafcolor.com/forest-admin/wp-admin/options-general.php" title="Wordpress Settings"><i class="fa fa-cogs"></i></a></li>
            <li class="gg-icon-button gg-in-effect"><a href="http://leafcolor.com/forest-admin/wp-admin/plugins.php" title="Plugins"><i class="fa fa-puzzle-piece"></i></a></li>
            <li class="gg-icon-button gg-in-effect"><a href="http://leafcolor.com/forest-admin/wp-admin/admin.php?page=fra_settings" title="Forest Admin Settings"><i class="fa fa-cog"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
