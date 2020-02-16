<?php
/**
 * Shortcode handlers.
 *
 * @package CoursePress
 * Description: Adds Enrollment Date
 */

/**
 * Templating shortcodes.
 *
 */

function wpmudev_cp_custom_certificate_vars( $vars ) {



if ( ! isset( $_REQUEST['c'] ) || ! isset( $_REQUEST['u'] ) ) {

return $vars;

}



$course_id                  = (int) $_REQUEST['c'];

$student_id                 = (int) $_REQUEST['u'];

$date_format                = get_option( 'date_format', 'Y-m-d' ) . ' ' . get_option( 'time_format', 'H:i:s' );

$enrollment_date            = date(

$date_format,

strtotime( CoursePress_Data_Course::student_enrolled( $student_id, $course_id ) )

);



$vars['ENROLLMENT_DATE']    = $enrollment_date;



return $vars;

}



add_filter( 'coursepress_basic_certificate_vars', 'wpmudev_cp_custom_certificate_vars', 20 );



