<?php
/**
 * LiufhaiBlog 自定义子菜单类
 *
 * @package 	  LiufhaiBlog
 * @subpackage  Class
 * @since 		  3.0.0
 * @author      LIUFHAI
 */
class Zan_Nav_Menu extends Walker_Nav_Menu {

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent  = str_repeat( "\t", $depth );
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";

    return $output;
  }
}