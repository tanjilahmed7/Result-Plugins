<?php 
function jal_install () {
   global $wpdb;

   $table_name = $wpdb->prefix . "liveshoutbox"; 
}

register_activation_hook( __FILE__, 'jal_install' );

 ?>