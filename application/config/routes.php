<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

/*********Api routing Start ************/

$route['default_controller'] = 'Admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// /*********admin routing start ************/

// $route['Admin'] = "v1/admin/Admin/index";
// $route['Admin/changedAdminPwd'] = "v1/admin/Admin/changedAdminPwd";
// $route['Admin/login'] = "v1/admin/Admin/login";
// $route['Admin/logout'] = "v1/admin/Admin/logout";
// $route['Admin/dashboard'] = "v1/admin/Admin/dashboard";
// $route['Admin/users'] = "v1/admin/Admin/users";
// $route['Admin/getUsersVerifylist'] = "v1/admin/Admin/getUsersVerifylist";
// $route['Admin/userslist'] = "v1/admin/Admin/userslist";
// $route['Admin/edit_user'] = "v1/admin/Admin/edit_user";
// $route['Admin/viewUser'] = "v1/admin/Admin/viewUser";
// $route['Admin/verify_user'] = "v1/admin/Admin/verify_user";
// $route['Admin/forgetPassword'] = "v1/admin/Admin/forgetPassword";
// $route['Admin/resetpwd'] = "v1/admin/Admin/resetpwd";
// $route['Admin/testmail'] = "v1/admin/Admin/testmail";
// $route['Admin/updatePassword'] = "v1/admin/Admin/updatePassword";
// $route['Admin/changedPassword'] = "v1/admin/Admin/changedPassword";
// $route['Admin/delete_User_Image'] = "v1/admin/Admin/delete_User_Image";
// $route['Admin/usersNotification'] = "v1/admin/Admin/usersNotification";
// $route['Admin/notification'] = "v1/admin/Admin/notification";
// $route['Admin/exportTocsv'] = "v1/admin/Admin/exportTocsv";
// $route['Admin/Report'] = "v1/admin/Admin/Report";
// $route['Admin/getUsersMatchlist'] = "v1/admin/Admin/getUsersMatchlist";
// $route['Admin/update_notification'] = "v1/admin/Admin/update_notification";

// /*********admin routing End ************/