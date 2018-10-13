<?php

class CcStringUtil
{
  /**
   * Check if a string starts with specified string
   * @param string $haystack: String to search in
   * @param string $needle:   String to search for
   * @param string $bCaseSensitive: if false, case of strings will be ignored
   * @return boolean true if string is starting with
   */
  static public function startsWith ($haystack, $needle, $bCaseSensitive = true)
  {
    $length = strlen($needle);
    if ($length == 0)
    {
      return true;
    }
    if($bCaseSensitive)
      return (substr($haystack, 0, $length) === $needle);
    else
      return (strcasecmp(substr($haystack, 0, $length), $needle) == 0);
  }
  
  /**
   * Check if a string ends with specified string
   * @param string $haystack: String to search in
   * @param string $needle:   String to search for
   * @param string $bCaseSensitive: if false, case of strings will be ignored. default true;
   * @return boolean true if string is ending with
   */
  static public function endsWith ($haystack, $needle, $bCaseSensitive = true)
  {
    $length = strlen($needle);
    if ($length == 0)
    {
      return true;
    }
    if($bCaseSensitive)
    {
      return (substr($haystack, - $length) === $needle);
    }
    else
    {
      return (strcasecmp(substr($haystack, - $length), $needle) == 0);
    }
  }
  
  /**
   * Remove all matching characters from beginning of string
   * @param string $haystack: String to search in
   * @param string $needle:   String to search for
   * @param string $bCaseSensitive: if false, case of strings will be ignored. default true;
   * @return string shortened result
   */
  static public function removeAllLeading($haystack, $needle, $bCaseSensitive = true)
  {
    while (CcStringUtil::startsWith($haystack, $needle))
    {
      $haystack = substr($haystack, strlen($needle));
    }
    return $haystack;
  }
  
  /**
   * Remove all matching characters from ending of string
   * @param string $haystack: String to search in
   * @param string $needle:   String to search for
   * @param string $bCaseSensitive: if false, case of strings will be ignored. default true;
   * @return string shortened result
   */
  static public function removeAllEnding($haystack, $needle, $bCaseSensitive = true)
  {
    while (CcStringUtil::endsWith($haystack, $needle, $bCaseSensitive))
    {
      $haystack = substr($haystack, 0, -strlen($needle));
    }
    return $haystack;
  }
  
  /**
   * @brief This method generates a string like var_dump will do
   * @param mixed $var: Variable to dump
   * @return string in vardump format
   */
  public static function getVarDump ($var)
  {
    ob_start();
    var_dump($var);
    $sData = ob_get_clean();
    return $sData;
  }
  
}