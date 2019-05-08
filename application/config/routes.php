<?
defined('BASEPATH') OR exit('No direct script access allowed');
//start





// front

$route['default_controller'] = 'Main';

//First
$route['^(en|ru|hy)/about$'] = "Main/about/";
$route['^(en|ru|hy)/company$'] = "Main/company/";
$route['^(en|ru|hy)/our_team$'] = "Main/our_team/";
$route['^(en|ru|hy)/publishment$'] = "Main/publishment/";
$route['^(en|ru|hy)/news$'] = "Main/news/";
$route['^(en|ru|hy)/customers'] = "Main/customers/";
$route['^(en|ru|hy)/library'] = "Main/library/";
$route['^(en|ru|hy)/datakan_akter'] = "Main/datakan_akter/";
$route['^(en|ru|hy)/orensdrakan_popoxutyunner_naxagcer'] = "Main/orensdrakan_popoxutyunner_naxagcer/";
$route['^(en|ru|hy)/orensdrakan_popoxutyunner'] = "Main/orensdrakan_popoxutyunner/";
$route['^(en|ru|hy)/iravakan_verlucutyunner'] = "Main/iravakan_verlucutyunner/";
$route['^(en|ru|hy)/services'] = "Main/services/";
$route['^(en|ru|hy)/single_news/(:num)'] = "Main/single_news/$1";
$route['^(en|ru|hy)/single_publications/(:num)'] = "Main/single_publications/$1";
$route['^(en|ru|hy)/page/(:num)/(:num)'] = "Main/page/$1/$1";
$route['^(en|ru|hy)/staff/(:num)'] = "Main/staff/$1";

$route['^(en|fr|hy)/partner_university'] = "Main/partner_university/";
$route['^(en|fr|hy)/courses'] = "Main/courses/";
$route['^(en|fr|hy)/course/(:any)'] = "Main/business_management/$1";
$route['^(en|fr|hy)/requirements'] = "Main/requirements/";
$route['^(en|fr|hy)/requirement/(:any)'] = "Main/requirement/$1";
$route['^(en|fr|hy)/testimonials'] = "Main/testimonials/";
$route['^(en|fr|hy)/events'] = "Main/events/";
$route['^(en|fr|hy)/register'] = "Main/register/";
$route['^(en|fr|hy)/contact'] = "Main/contact/";
$route['^(en|fr|hy)/page/(:any)'] = "Main/grade_converter/$1";
$route['^(en|fr|hy)/us_school_diploma_conversion'] = "Main/us_school_diploma_conversion/";
$route['^(en|fr|hy)/abitur'] = "Main/abitur/";
$route['^(en|fr|hy)/business_management'] = "Main/business_management/";
$route['^(en|fr|hy)/visa_information'] = "Main/visa_information/";
$route['^(en|fr|hy)/university/(:any)'] = "Main/university/$1";


//admin

//index
$route['^admin$'] = 'admin/User/index/';
$route['^admin/(en|fr|hy)$'] = 'admin/User/index/';




$route['^admin/(en|fr|hy)/about_us$'] = 'admin/Sysadmin/about_us/';

$route['^admin/(en|fr|hy)/add_partner_university'] = 'admin/Sysadmin/add_partner_university/';
$route['^admin/(en|fr|hy)/edit_partner_university/(:num)'] = 'admin/Sysadmin/edit_partner_university/$1';
$route['^admin/(en|fr|hy)/partner_university'] = 'admin/Sysadmin/partner_university/';

$route['^admin/(en|fr|hy)/add_grade_converter'] = 'admin/Sysadmin/add_grade_converter/';
$route['^admin/(en|fr|hy)/edit_grade_converter/(:num)'] = 'admin/Sysadmin/edit_grade_converter/$1';
$route['^admin/(en|fr|hy)/grade_converter'] = 'admin/Sysadmin/grade_converter/';

$route['^admin/(en|fr|hy)/add_courses'] = 'admin/Sysadmin/add_courses/';
$route['^admin/(en|fr|hy)/edit_courses/(:num)'] = 'admin/Sysadmin/edit_courses/$1';
$route['^admin/(en|fr|hy)/courses'] = 'admin/Sysadmin/courses/';

$route['^admin/(en|fr|hy)/add_requirements'] = 'admin/Sysadmin/add_requirements/';
$route['^admin/(en|fr|hy)/edit_requirements/(:num)'] = 'admin/Sysadmin/edit_requirements/$1';
$route['^admin/(en|fr|hy)/requirements'] = 'admin/Sysadmin/requirements/';

$route['^admin/(en|fr|hy)/testimonials'] = 'admin/Sysadmin/testimonials/';
$route['^admin/(en|fr|hy)/events'] = 'admin/Sysadmin/events/';
$route['^admin/(en|fr|hy)/contact'] = 'admin/Sysadmin/contact/';
$route['^admin/(en|fr|hy)/basic_settings'] = 'admin/Sysadmin/basic_settings/';

$route['^admin/(en|fr|hy)/search_partner_universities'] = 'admin/Sysadmin/search_partner_universities/';


// login
$route['admin/login'] = 'admin/User/login';

//logout
$route['admin/logout'] = 'admin/User/logout';


//Second
$route['^(en|ru|hy)/(.+)$']        = "$2";
$route['^(en|ru|hy)$'] = $route['default_controller'];


$route['/']='Main/index/$1';







//end