<?php

function _e($value, $doubleEncode = true)
{
    if ($value instanceof Htmlable) 
    {
        return $value->toHtml();
    }
    
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', $doubleEncode);
}
