<?php
/**
 * Modify a hex color by the given number of steps (out of 255).
 *
 * Adapted from a solution by Torkil Johnsen.
 *
 * @param string $color
 * @param int $steps
 * @link http://stackoverflow.com/questions/3512311/how-to-generate-lighter-darker-color-with-php
 */
function thanksroy_brighten($color, $steps) {
    $steps = max(-255, min(255, $steps));
    $hex = str_replace('#', '', $color);
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));

    $r = max(0,min(255,$r + $steps));
    $g = max(0,min(255,$g + $steps));  
    $b = max(0,min(255,$b + $steps));

    $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
    $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
    $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

     return '#'.$r_hex.$g_hex.$b_hex;
}

function mysnippet($text, $startPos, $endPos, $append = 'â€¦')
{
    // do not strip html tags from the text
    // $text = strip_formatting($text);
    
    $textLength = strlen($text);
 
    // Calculate the start position. Set to zero if the start position is
    // null or 0, OR if the start offset is greater than the length of the
    // original text.
    $startPosOffset = $startPos - $textLength;
    $startPos = !$startPos || $startPosOffset > $textLength
                ? 0
                : strrpos($text, ' ', $startPosOffset);
 
    // Calculate the end position. Set to the length of the text if the
    // end position is greater than or equal to the length of the original
    // text, OR if the end offset is greater than the length of the
    // original text.
    $endPosOffset = $endPos - $textLength;
    $endPos = $endPos >= $textLength || $endPosOffset > $textLength
              ? $textLength
              : strrpos($text, ' ', $endPosOffset);
 
    // Set the snippet by getting its substring.
    $snippet = substr($text, $startPos, $endPos - $startPos);
 
    // Return the snippet without the append string if the text's original
    // length equals to 1) the length of the snippet, i.e. when the return
    // string is identical to the passed string; OR 2) the calculated
    // end position, i.e. when the return string ends at the same point as
    // the passed string.
    return strlen($snippet) == $textLength || $endPos == $textLength
            ? $snippet
            : $snippet . $append;
}
 
