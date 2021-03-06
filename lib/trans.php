<?php
/**
 * Created by PhpStorm.
 * User: Peeter
 * Date: 6.02.2017
 * Time: 9:37
 */
function tr($txt)
{
    static $trans = false; // static remembers the value if function isn't working
    // if language is by default
    if (LANG_ID == DEFAULT_LANG)
    {
        return $txt;
    }
    // if not, search language file
    if ($trans === false)
    {
        $fn = LANG_DIR.'lang_'.LANG_ID.'.php';
        if (file_exists($fn) and is_file($fn) and is_readable($fn))
        {
            require_once ($fn);
            $trans = $_trans;// lang_en.php array
        }
        else
        {
            $trans = array();
        }
    }
    if (isset($trans[$txt]))
    {
        return $trans[$txt];
    }
    // if cannot find lang, return base text
    return $txt;
}
?>
