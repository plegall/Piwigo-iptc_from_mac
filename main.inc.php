<?php
/*
Plugin Name: IPTC from Mac
Version: auto
Description: Convert IPTC written in MacRoman encoding into UTF8
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=
Author: plg
Author URI: http://piwigo.wordpress.com
*/

if (!defined('PHPWG_ROOT_PATH'))
{
  die('Hacking attempt!');
}

add_event_handler('clean_iptc_value', 'MacRoman_to_utf8');
function MacRoman_to_utf8($str, $break_ligatures='none')
{
  // $break_ligatures : 'none' | 'fifl' | 'all'
  // 'none' : don't break any MacRoman ligatures, transform them into their utf-8 counterparts
  // 'fifl' : break only fi ("\xDE" => "fi") and fl ("\xDF"=>"fl")
  // 'all' : break fi, fl and also AE ("\xAE"=>"AE"), ae ("\xBE"=>"ae"), OE ("\xCE"=>"OE") and oe ("\xCF"=>"oe")
  
  if($break_ligatures == 'fifl')
  {
    $str = strtr($str, array("\xDE"=>"fi", "\xDF"=>"fl"));
  }

  if($break_ligatures == 'all')
  {
    $str = strtr($str, array("\xDE"=>"fi", "\xDF"=>"fl", "\xAE"=>"AE", "\xBE"=>"ae", "\xCE"=>"OE", "\xCF"=>"oe"));
  }

  $str = strtr(
    $str,
    array(
      "\x7F"=>"\x20",
      "\x80"=>"\xC3\x84",
      "\x81"=>"\xC3\x85",
      "\x82"=>"\xC3\x87",
      "\x83"=>"\xC3\x89",
      "\x84"=>"\xC3\x91",
      "\x85"=>"\xC3\x96",
      "\x86"=>"\xC3\x9C",
      "\x87"=>"\xC3\xA1",
      "\x88"=>"\xC3\xA0",
      "\x89"=>"\xC3\xA2",
      "\x8A"=>"\xC3\xA4",
      "\x8B"=>"\xC3\xA3",
      "\x8C"=>"\xC3\xA5",
      "\x8D"=>"\xC3\xA7",
      "\x8E"=>"\xC3\xA9",
      "\x8F"=>"\xC3\xA8",
      "\x90"=>"\xC3\xAA",
      "\x91"=>"\xC3\xAB",
      "\x92"=>"\xC3\xAD",
      "\x93"=>"\xC3\xAC",
      "\x94"=>"\xC3\xAE",
      "\x95"=>"\xC3\xAF",
      "\x96"=>"\xC3\xB1",
      "\x97"=>"\xC3\xB3",
      "\x98"=>"\xC3\xB2",
      "\x99"=>"\xC3\xB4",
      "\x9A"=>"\xC3\xB6",
      "\x9B"=>"\xC3\xB5",
      "\x9C"=>"\xC3\xBA",
      "\x9D"=>"\xC3\xB9",
      "\x9E"=>"\xC3\xBB",
      "\x9F"=>"\xC3\xBC",
      "\xA0"=>"\xE2\x80\xA0",
      "\xA1"=>"\xC2\xB0",
      "\xA2"=>"\xC2\xA2",
      "\xA3"=>"\xC2\xA3",
      "\xA4"=>"\xC2\xA7",
      "\xA5"=>"\xE2\x80\xA2",
      "\xA6"=>"\xC2\xB6",
      "\xA7"=>"\xC3\x9F",
      "\xA8"=>"\xC2\xAE",
      "\xA9"=>"\xC2\xA9",
      "\xAA"=>"\xE2\x84\xA2",
      "\xAB"=>"\xC2\xB4",
      "\xAC"=>"\xC2\xA8",
      "\xAD"=>"\xE2\x89\xA0",
      "\xAE"=>"\xC3\x86",
      "\xAF"=>"\xC3\x98",
      "\xB0"=>"\xE2\x88\x9E",
      "\xB1"=>"\xC2\xB1",
      "\xB2"=>"\xE2\x89\xA4",
      "\xB3"=>"\xE2\x89\xA5",
      "\xB4"=>"\xC2\xA5",
      "\xB5"=>"\xC2\xB5",
      "\xB6"=>"\xE2\x88\x82",
      "\xB7"=>"\xE2\x88\x91",
      "\xB8"=>"\xE2\x88\x8F",
      "\xB9"=>"\xCF\x80",
      "\xBA"=>"\xE2\x88\xAB",
      "\xBB"=>"\xC2\xAA",
      "\xBC"=>"\xC2\xBA",
      "\xBD"=>"\xCE\xA9",
      "\xBE"=>"\xE6",
      "\xBF"=>"\xC3\xB8",
      "\xC0"=>"\xC2\xBF",
      "\xC1"=>"\xC2\xA1",
      "\xC2"=>"\xC2\xAC",
      "\xC3"=>"\xE2\x88\x9A",
      "\xC4"=>"\xC6\x92",
      "\xC5"=>"\xE2\x89\x88",
      "\xC6"=>"\xE2\x88\x86",
      "\xC7"=>"\xC2\xAB",
      "\xC8"=>"\xC2\xBB",
      "\xC9"=>"\xE2\x80\xA6",
      "\xCA"=>"\xC2\xA0",
      "\xCB"=>"\xC3\x80",
      "\xCC"=>"\xC3\x83",
      "\xCD"=>"\xC3\x95",
      "\xCE"=>"\xC5\x92",
      "\xCF"=>"\xC5\x93",
      "\xD0"=>"\xE2\x80\x93",
      "\xD1"=>"\xE2\x80\x94",
      "\xD2"=>"\xE2\x80\x9C",
      "\xD3"=>"\xE2\x80\x9D",
      "\xD4"=>"\xE2\x80\x98",
      "\xD5"=>"\xE2\x80\x99",
      "\xD6"=>"\xC3\xB7",
      "\xD7"=>"\xE2\x97\x8A",
      "\xD8"=>"\xC3\xBF",
      "\xD9"=>"\xC5\xB8",
      "\xDA"=>"\xE2\x81\x84",
      "\xDB"=>"\xE2\x82\xAC",
      "\xDC"=>"\xE2\x80\xB9",
      "\xDD"=>"\xE2\x80\xBA",
      "\xDE"=>"\xEF\xAC\x81",
      "\xDF"=>"\xEF\xAC\x82",
      "\xE0"=>"\xE2\x80\xA1",
      "\xE1"=>"\xC2\xB7",
      "\xE2"=>"\xE2\x80\x9A",
      "\xE3"=>"\xE2\x80\x9E",
      "\xE4"=>"\xE2\x80\xB0",
      "\xE5"=>"\xC3\x82",
      "\xE6"=>"\xC3\x8A",
      "\xE7"=>"\xC3\x81",
      "\xE8"=>"\xC3\x8B",
      "\xE9"=>"\xC3\x88",
      "\xEA"=>"\xC3\x8D",
      "\xEB"=>"\xC3\x8E",
      "\xEC"=>"\xC3\x8F",
      "\xED"=>"\xC3\x8C",
      "\xEE"=>"\xC3\x93",
      "\xEF"=>"\xC3\x94",
      "\xF0"=>"\xEF\xA3\xBF",
      "\xF1"=>"\xC3\x92",
      "\xF2"=>"\xC3\x9A",
      "\xF3"=>"\xC3\x9B",
      "\xF4"=>"\xC3\x99",
      "\xF5"=>"\xC4\xB1",
      "\xF6"=>"\xCB\x86",
      "\xF7"=>"\xCB\x9C",
      "\xF8"=>"\xC2\xAF",
      "\xF9"=>"\xCB\x98",
      "\xFA"=>"\xCB\x99",
      "\xFB"=>"\xCB\x9A",
      "\xFC"=>"\xC2\xB8",
      "\xFD"=>"\xCB\x9D",
      "\xFE"=>"\xCB\x9B",
      "\xFF"=>"\xCB\x87",
      "\x00"=>"\x20",
      "\x01"=>"\x20",
      "\x02"=>"\x20",
      "\x03"=>"\x20",
      "\x04"=>"\x20",
      "\x05"=>"\x20",
      "\x06"=>"\x20",
      "\x07"=>"\x20",
      "\x08"=>"\x20",
      "\x0B"=>"\x20",
      "\x0C"=>"\x20",
      "\x0E"=>"\x20",
      "\x0F"=>"\x20",
      "\x10"=>"\x20",
      "\x11"=>"\x20",
      "\x12"=>"\x20",
      "\x13"=>"\x20",
      "\x14"=>"\x20",
      "\x15"=>"\x20",
      "\x16"=>"\x20",
      "\x17"=>"\x20",
      "\x18"=>"\x20",
      "\x19"=>"\x20",
      "\x1A"=>"\x20",
      "\x1B"=>"\x20",
      "\x1C"=>"\x20",
      "\1D"=>"\x20",
      "\x1E"=>"\x20",
      "\x1F"=>"\x20",
      "\xF0"=>""
      )
    );

  return $str;
}
?>
