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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['movie'] = 'MovieController';
$route['default_controller'] = 'MovieController';
$route['movie/category/(:any)'] = 'MovieController/showcatMovie/$1';
$route['movie/category/(:any)/(:num)'] = 'MovieController/showcatmovielist/$1/$2';
$route['movie/subcategory/(:num)'] = 'MovieController/showMovie/$1';
$route['movie/subcategory/(:num)'] = 'MovieController/showMovie/$1';
$route['movie/subcategory/(:num)/(:num)'] = 'MovieController/showmovielist/$1/$2';
$route['movie/(:num)'] = 'MovieController/getMovie/$1';
$route['tv/(:num)'] = 'MovieController/gettv/$1';
$route['tvlist'] = 'MovieController/tvserieslist';
$route['tvlist/(:num)'] = 'MovieController/tvserieslist/$1';
$route['tv/seasonlist/(:num)'] = 'MovieController/seasonlist/$1';
$route['tv/seasonlist/(:num)/(:num)'] = 'MovieController/seasonlist/$1/$2';
$route['tv/episodelist/(:num)'] = 'MovieController/episodelist/$1';
$route['tv/episodelist/(:num)/(:num)'] = 'MovieController/episodelist/$1/$2';
$route['movie/search'] = 'MovieController/search';
$route['movie/getsearch'] = 'MovieController/getsearch';
$route['movie/bdix'] = 'MovieController/bdix';
$route['movie/music'] = 'MovieController/music';











$route['animal'] = 'AdminController';
$route['admin/subcategory'] = 'AdminController/getsubcategory';
$route['admin/upload'] = 'AdminController/upload';
$route['admin/insert'] = 'AdminController/insert';
$route['admin/allmovie'] = 'AdminController/allmovie';
$route['admin/deletemovie/(:num)'] = 'AdminController/deletemovie/$1';
$route['admin/editmovie/(:num)'] = 'AdminController/editmovie/$1';
$route['admin/updatemovie'] = 'AdminController/updatemovie';
$route['admin/alltvseries'] = 'AdminController/alltvseries';
$route['admin/tvseries'] = 'AdminController/tvseries';
$route['admin/tvseriesinsert'] = 'AdminController/tvseriesinsert';
$route['admin/deletetv/(:num)'] = 'AdminController/tvseries_delete/$1';
$route['admin/allseason/(:num)'] = 'AdminController/allseason/$1';
$route['admin/addseason/(:num)'] = 'AdminController/addseason/$1';
$route['admin/seasoninsert'] = 'AdminController/seasoninsert';
$route['admin/deleteseason/(:num)'] = 'AdminController/deleteseason/$1';
$route['admin/allepisode/(:num)'] = 'AdminController/allepisode/$1';
$route['admin/addepisode/(:num)'] = 'AdminController/addepisode/$1';
$route['admin/episodeinsert'] = 'AdminController/episodeinsert';
$route['admin/deleteepisode/(:num)'] = 'AdminController/deleteepisode/$1';
$route['admin/editepisode/(:num)'] = 'AdminController/editepisode/$1';
$route['admin/updateepisode'] = 'AdminController/updateepisode';
$route['admin/bdix'] = 'AdminController/bdix';
$route['admin/allbdix'] = 'AdminController/allbdix';
$route['admin/bdixinsert'] = 'AdminController/bdixinsert';
$route['admin/deletebdix/(:num)'] = 'AdminController/deletebdix/$1';
$route['admin/notice'] = 'AdminController/notice';
$route['admin/noticeupdate'] = 'AdminController/noticeupdate';
















$route['upload'] = 'UploaderController';
$route['upload/login'] = 'UploaderController/login';


