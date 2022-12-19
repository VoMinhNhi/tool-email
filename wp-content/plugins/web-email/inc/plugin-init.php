<?php

/**
 *Plugin init
 *
 * @package Web_email
 * @author minhnhi
 * @since 0.0.1
 */

class Web_Email_Innit
{
     public static $instance;

     public final static function instance()
     {
          if (is_null(self::$instance)) {
               self::$instance = new self();
          }
          return self::$instance;
     }

     // public function _contruct()
     // {
     //      $this->load_classes();
     // }
     function load_classes()
     {
          require_once WEB_EMAIL_DIR_PATH . 'inc/helpers/email.php';

          require_once WEB_EMAIL_DIR_PATH . 'inc/classes/class-info-email.php';
          require_once WEB_EMAIL_DIR_PATH . 'inc/classes/class-info-page.php';
     }
}


// Web_Email_Innit::$instance();