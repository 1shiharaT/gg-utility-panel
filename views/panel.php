
<div id="gg-utility-pane">
  <div class="gg-utility-pane-arrow">
    <div class="dashicons dashicons-arrow-left-alt2"></div>
  </div>
  <div class="gg-utility-pane-inner">
    <div class="gg-icon-button-wrap">
      <h3 class="gg-in-effect"><div class="dashicons dashicons-screenoptions"></div> <?php echo __( '追加', $this->plugin_slug ); ?></h3>
      <ul class="gg-icon-buttons">
      <?php
      if ( is_single() || is_page() ) {
        global $post;
        $post_type_object = get_post_type_object( $post->post_type );
        if ( $post_type_object ) { ?>
        <li class="gg-icon-button gg-in-effect">
          <a href="<?php echo admin_url( sprintf( $post_type_object->_edit_link . '&action=edit', $post->ID ) ); ?>" title="New page">
            <div class="circle active"><?php $this->gg_utility_icons( 'add' , 0 ); ?></div>
            <span class="title"><?php echo __( '現在の記事を編集' , $this->plugin_slug );?> </span>
          </a>
        </li>
        <?php }
        } ?>
        <li class="gg-icon-button gg-in-effect">
          <a href="<?php echo admin_url( '/post-new.php?post_type=post' ) ?>" title="New page">
            <div class="circle"><?php $this->gg_utility_icons( 'add' , 0 ); ?></div>
            <span class="title"><?php echo __( '投稿記事を追加' , $this->plugin_slug );?> </span>
          </a>
        </li>
        <li class="gg-icon-button gg-in-effect">
          <a href="<?php echo admin_url( '/post-new.php?post_type=page' ) ?>" title="Media">
            <div class="circle"><?php $this->gg_utility_icons( 'add' , 0 ); ?></div>
            <span class="title"><?php echo __( '固定ページを追加' , $this->plugin_slug );?> </span>
          </a>
        </li>
        <li class="gg-icon-button gg-in-effect">
          <a href="<?php echo admin_url( '/post-new.php?post_type=page' ) ?>" title="New page">
            <div class="circle"><?php $this->gg_utility_icons( 'add' , 1 ); ?></div>
            <span class="title"><?php echo __( 'カテゴリーを追加', $this->plugin_slug );?> </span>
          </a>
        </li>
        <li class="gg-icon-button gg-in-effect">
          <a href="http://leafcolor.com/forest-admin/wp-admin/media-new.php" title="Media">
            <div class="circle"><?php $this->gg_utility_icons( 'add' , 1 ); ?></div>
            <span class="title"><?php echo __( 'タグを追加' , $this->plugin_slug );?> </span>
          </a>
        </li>
      </ul>
      <h3 class="gg-in-effect"><div class="dashicons dashicons-screenoptions"></div> <?php echo __( 'デザイン', $this->plugin_slug ); ?></h3>
      <ul class="gg-icon-buttons">
        <li class="gg-icon-button gg-in-effect">
          <a href="<?php echo admin_url( '/themes.php' ) ?>" title="New page">
            <div class="circle"><?php $this->gg_utility_icons( 'design' , 0 ); ?></div>
            <span class="title"><?php echo __( 'テーマの変更' , $this->plugin_slug );?> </span>
          </a>
        </li>
        <li class="gg-icon-button gg-in-effect">
          <?php if ( is_admin() ) { ?>
            <a href="<?php echo admin_url( '/customize.php' ) ?>" title="Media">
          <?php } else { ?>
            <a href="<?php echo admin_url( '/customize.php?url='. get_permalink() ) ?>" title="Media">
          <?php } ?>
            <div class="circle"><?php $this->gg_utility_icons( 'design' , 1 ); ?></div>
            <span class="title"><?php echo __( 'デザイン編集' , $this->plugin_slug );?> </span>
          </a>
        </li>
        <li class="gg-icon-button gg-in-effect">
          <a href="<?php echo admin_url( '/widgets.php' ) ?>" title="New page">
            <div class="circle"><?php $this->gg_utility_icons( 'design' , 2 ); ?></div>
            <span class="title"><?php echo __( 'ウィジェットの変更' , $this->plugin_slug );?> </span>
          </a>
        </li>
        <li class="gg-icon-button gg-in-effect">
          <a href="<?php echo admin_url('/theme-editor.php');?>" title="Media">
            <div class="circle"><?php $this->gg_utility_icons( 'design' , 3 ); ?></div>
            <span class="title"><?php echo __( 'メニューの変更' , $this->plugin_slug );?> </span>
          </a>
        </li>
      </ul>
      <h3 class="gg-in-effect"><div class="dashicons dashicons-screenoptions"></div> <?php echo __( '管理', $this->plugin_slug ); ?></h3>
      <ul class="gg-icon-buttons">
        <li class="gg-icon-button gg-in-effect">
          <a href="<?php echo admin_url( '/options-general.php' ) ?>" title="New page">
            <div class="circle"><?php $this->gg_utility_icons( 'manage' , 0 ); ?></div>
            <span class="title"><?php echo __( '基本的な設定' , $this->plugin_slug );?> </span>
          </a>
        </li>
        <li class="gg-icon-button gg-in-effect">
          <a href="<?php echo admin_url( '/options-permalink.php' ) ?>" title="Media">
            <div class="circle"><?php $this->gg_utility_icons( 'manage' , 1 ); ?></div>
            <span class="title"><?php echo __( 'パーマリンクの設定' , $this->plugin_slug );?> </span>
          </a>
        </li>
        <li class="gg-icon-button gg-in-effect">
          <a href="<?php echo admin_url( '/options-reading.php' ) ?>" title="New page">
            <div class="circle"><?php $this->gg_utility_icons( 'manage' , 2 ); ?></div>
            <span class="title"><?php echo __( '表示設定' , $this->plugin_slug );?> </span>
          </a>
        </li>
        <li class="gg-icon-button gg-in-effect">
          <a href="<?php echo admin_url( '/edit-comments.php' ) ?>" title="New page">
            <div class="circle"><?php $this->gg_utility_icons( 'manage' , 3 ); ?></div>
            <span class="title"><?php echo __( 'コメント一覧' , $this->plugin_slug );?> </span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
