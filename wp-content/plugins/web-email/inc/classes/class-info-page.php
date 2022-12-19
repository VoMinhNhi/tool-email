<?php


/**
 * Info page admin
 * 
 * @package Web_data
 * @author minhnhi
 * @since 0.0.1
 */


// class Web_Data_Info_Page
// {
//      public static $instance;

//      public final static function instance()
//      {
//           if (is_null(self::$instance)) {
//                self::$instance = new self();
//           }
//           return self::$instance;
//      }

//      public function _construct()
//      {
//           $this->menus_email();
//           add_action('admin_menu', 'menus_email');
//      }

//      function menus_email()
//      {
//           add_menu_page(
//                'email',
//                'All Email',
//                'manage_options',
//                'list-email',
//                'render_list_email'
//           );
//      }

//      function render_list_email()
//      {
//           echo "<h1>List email page</h1>";
//      }
// }


function menus_email()
{
     add_menu_page(
          'email',
          'All Email',
          'manage_options',
          'list-email',
          'render_list_email'
     );
}

add_action('admin_menu', 'menus_email');

function render_list_email()
{
     echo "<h1>List email page</h1>";
}