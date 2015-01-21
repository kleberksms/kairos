<?php
namespace KairosCore\Filter\Inflection;


class Excerpt
{

    /**
     * @param $string
     * @param int $characters
     * @return array|mixed|string
     */
    public static function getExcerpt($string, $characters = 20)
    {
        $excerpt = explode(' ', $string, $characters);
        if (count($excerpt) >= $characters) {
            array_pop($excerpt);
            $excerpt = implode(" ", $excerpt) . '...';
        } else {
            $excerpt = implode(" ", $excerpt);
        }
        $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
        return $excerpt;
    }

}