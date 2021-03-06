<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


/** Returns User IP Address **/
function get_user_ip()
{
	$CI =& get_instance();
	$ip_addr = $CI->input->ip_address();
	return $ip_addr;
}
function get_rand_number()
{
    $date1 = time();
    $date2 = mktime(0,12);
    $dateDiff = $date1 - $date2;
    $rand  = rand(99,999);
    return $dateDiff.$rand;
}
function slugify($text) {
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}
