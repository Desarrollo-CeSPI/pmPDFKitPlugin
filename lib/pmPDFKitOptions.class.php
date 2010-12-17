<?php

/**
 * pmPDFKit provides a way to configure wkhtmltopdf parameter.
 *
 * @package    pmPDFKitPlugin
 * @subpackage lib
 * @author     Patricio Mac Adden <pmacadden@cespi.unlp.edu.ar>
 */
class pmPDFKitOptions
{
  protected static $default_options = array(
    "book" => false,
    "collate" => false,
    "copies" => 1,
    "cover" => false,
    "default-header" => false,
    "orientation" => "Portrait",
    "page-size" => "A4",
    "toc" => false
  );
  
  public static function parse()
  {
    $opts = self::$default_options;
    
    foreach ($opts as $k => $v)
    {
      $opts[$k] = sfConfig::get("app_pm_pdfkit_$k", false);
    }
    
    $args = "";
    foreach ($opts as $k => $v)
    {
      if (is_bool($v) && $v == true)
      {
        $args .= "--$k";
      }
      elseif (!is_bool($v))
      {
        $args .= "--$k $v";
      }
    }
    
    return $args;
  }
}