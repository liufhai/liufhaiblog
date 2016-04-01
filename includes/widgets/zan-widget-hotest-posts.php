<?php
/**
 * LiufhaiBlog 最热文章组件
 *
 * @package    LiufhaiBlog
 * @subpackage Widget
 */
 
class Zan_Hotest_Posts extends WP_Widget {

  // 设定小工具信息
  function Zan_Hotest_Posts() {
    $widget_options = array(
          'name'        => '最热文章组件（LiufhaiBlog）',
          'description' => 'LiufhaiBlog 最热文章组件'
    );
    parent::WP_Widget( false, false, $widget_options );  
  }

  // 设定小工具结构
  function widget( $args, $instance ) {  
  	extract($args);
    $title = $instance['title'] ? $instance['title'] : '<i class="fa fa-fire"></i>  最热文章';
    $num = $instance['num'] ? $instance['num'] : 5;
    echo $before_widget;
    ?>
      <div class="panel panel-zan hidden-xs">
        <div class="panel-heading"><?php echo $title; ?></div>
        <div class="panel-body">
          <ul class="list-group">
            <?php 
              // 设置全局变量，实现post整体赋值
              global $post;
              $posts = zan_get_hotest_posts( $num );
              foreach ( $posts as $post ) :
              setup_postdata( $post );
            ?>
              <li class="zan-list clearfix">
                <a href="<?php the_permalink();?>">
                 <h5><?php the_title(); ?></h5>

                </a>

              </li>
            <?php
              endforeach;
              wp_reset_postdata();
            ?>
          </ul>
        </div>
      </div>
    <?php
    echo $after_widget;
  }

  function update($new_instance, $old_instance) {                
     return $new_instance;
  }

  function form($instance) {        
    @$title = esc_attr( $instance['title'] );
    @$num = esc_attr( $instance['num'] );
    ?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">
          标题（默认最热文章）：
          <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </label>
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'num' ); ?>">
          显示文章条数（默认显示5条）：
          <input class="widefat" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" type="text" value="<?php echo $num; ?>" />
        </label>
      </p>
    <?php 
  }
} 

register_widget( 'Zan_Hotest_Posts' );
?>
