<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define("SERVER_KEY", "AAAAi7f15P4:APA91bF0msnf4gUW01BhZ5HRLNimtS3YgpKICwQFFXA18OSXZ_O8upUBNiRjjws8V6capTJIZ9w8mvYqtA8nmaUmpR9vme7SDQ1_EqkROWZL3Oq35b8lk5__XJIWzYSCDFm51I-PzApC");

// AAAAi7f15P4:APA91bF0msnf4gUW01BhZ5HRLNimtS3YgpKICwQFFXA18OSXZ_O8upUBNiRjjws8V6capTJIZ9w8mvYqtA8nmaUmpR9vme7SDQ1_EqkROWZL3Oq35b8lk5__XJIWzYSCDFm51I-PzApC
/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


// CUSTOME MESSAGE 
define('OTP_TIME',Date('Y-m-d H:i:s', strtotime(Date('Y-m-d H:i:s').'300 sec')));
define('REQUIRED_FIELD','All fields are required.');
define('POST_METHOD','Select post method.');
define('CHECK_INTERNET','Seems like you are offline, please try again.');
define('LOGIN_SUCCESS','Login successfully');
define('INVALID_PWD','Please enter correct password');
define('INVALID_UNAME','Please enter correct phone number');
define('SIGNUP_ERROR','Error occured while signup');
define('OTP_SEND','OTP has been sent to your mobile no. successfully');
define('MOBILE_EXISTS','This mobile number is already registered. Please login');
define('INVALID','Invalid details');
define('OTP_VERIFY','OTP verified successfully');
define('OTP_INCORRECT','Incorrect OTP is entered');
define('EXPIRE_TOKEN',date('Y-m-d H:i:s', strtotime(Date('Y-m-d H:i:s'). ' + 10 hours')));
define('OTP_RE_SEND','OTP has been re-sent to your mobile no. successfully');
define('MOBILE_NOT_EXISTS','Mobile number does not exist.');
define('TOKEN_VALID','Token is verified successfully');
define('CORRECT_OTP','Please enter correct OTP.');
define('PASSWORD_CHANGED','Password is changed successfully');
define('PASSWORD_NOT_MATCH','Password does not match. Please try again.');
define('TOKEN_EXPIRE','Session expired, please login again.');
define('FACEBOOK_SYNC','Facebook synchronization is done successfully');
define('FACEBOOK_ALL_SYNC','Facebook is already syncronized with another number');
define('SOCIAL_SYNC','Social synchronization is done successfully');
define('SOCIAL_ALL_SYNC','This social id already syncronized with another number');
define('DETAILS','Details are update successfully');
define('PICTURE_UPLOAD','Picture is uploaded successfully');
define('PICTURE_REQUIRED',"Please select images!");
define('DETAILS_FETCH','Details are fetched successfully');
define('TOKEN_VERIFY','Token is verified successfully');
define('USER_LIKED','User profile liked successfully');
define('USER_ALL_LIKED','Profile Already liked!!');
define('FOLLOW_BACK','Follow-back is done successfully');
define('ALL_READY_BACK','already Liked!!');
define('RATING_ADDED','Rating is added successfully');
define('CHAT_ADDED','Chat save successfully');
define('FETCH','Record fetch successfully');
define('NO_RECORD','No record found!!');
define('NO_RECORD_HOME','No preference found update your preferences to find matches!!');
define('ALREADY_RATED','already rated!!');
define('PROFILE_IMAGE_ERROR','Primary image not more then one please select one image!');
define('VERIFY_IMAGE_ERROR','Selfie image not more then one please select one image!');
define('PICTURE_LIKED','Picture liked successfully');
define('PICTURE_ALREADY_LIKED','Picture is already liked');
define('MSG_READ','Message Read successfully!');
define('NOTIFICATION_VIEW','Notification view successfully');
define('ALL_READY_READ_NOTIFICATION','already viewed !!');
define('LOGOUT','User logout successfully!');
define('ACOOUNT_DEACTIVATE','Account deactivate successfully!');
define('INVALID_OLD_PWD','Invalid old password');
define('USER_BLOCK','User block successfully');
define('USER_ALL_READY_BLOCK','User already blocked');
define('USER_UNBLOCK','User un block successfully');
define('USER_ALL_READY_UNBLOCK','User already un blocked');
define('IMAGE_REMOVE','Image remove successfully');
define('INVALID_IMAGE','Invalid Image Id');
define('USER_UNMATCH','User unmatch successfully');
define('FILES_SAVE','File save successfully');
define('SAVE','Record save successfully');
define('OLD_PWD_SAME','Old password and new password are same please try something different');
define('UPLOAD_PATH','http://r3allove.s3-ap-southeast-1.amazonaws.com/');


