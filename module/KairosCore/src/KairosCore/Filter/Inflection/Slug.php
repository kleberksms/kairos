<?php
/**
 * Created by PhpStorm.
 * User: bellinati
 * Date: 21/01/2015
 * Time: 18:10
 */

namespace KairosCore\Filter\Inflection;


class Slug
{

    /**
     * Default map of accented and special characters to ASCII characters
     *
     * @var array
     */
    protected static $_transliteration = array(
        '/ä|æ|ǽ/' => 'ae',
        '/ö|œ/' => 'oe',
        '/ü/' => 'ue',
        '/Ä/' => 'Ae',
        '/Ü/' => 'Ue',
        '/Ö/' => 'Oe',
        '/À|Á|Â|Ã|Å|Ǻ|Ā|Ă|Ą|Ǎ/' => 'A',
        '/à|á|â|ã|å|ǻ|ā|ă|ą|ǎ|ª/' => 'a',
        '/Ç|Ć|Ĉ|Ċ|Č/' => 'C',
        '/ç|ć|ĉ|ċ|č/' => 'c',
        '/Ð|Ď|Đ/' => 'D',
        '/ð|ď|đ/' => 'd',
        '/È|É|Ê|Ë|Ē|Ĕ|Ė|Ę|Ě/' => 'E',
        '/è|é|ê|ë|ē|ĕ|ė|ę|ě/' => 'e',
        '/Ĝ|Ğ|Ġ|Ģ/' => 'G',
        '/ĝ|ğ|ġ|ģ/' => 'g',
        '/Ĥ|Ħ/' => 'H',
        '/ĥ|ħ/' => 'h',
        '/Ì|Í|Î|Ï|Ĩ|Ī|Ĭ|Ǐ|Į|İ/' => 'I',
        '/ì|í|î|ï|ĩ|ī|ĭ|ǐ|į|ı/' => 'i',
        '/Ĵ/' => 'J',
        '/ĵ/' => 'j',
        '/Ķ/' => 'K',
        '/ķ/' => 'k',
        '/Ĺ|Ļ|Ľ|Ŀ|Ł/' => 'L',
        '/ĺ|ļ|ľ|ŀ|ł/' => 'l',
        '/Ñ|Ń|Ņ|Ň/' => 'N',
        '/ñ|ń|ņ|ň|ŉ/' => 'n',
        '/Ò|Ó|Ô|Õ|Ō|Ŏ|Ǒ|Ő|Ơ|Ø|Ǿ/' => 'O',
        '/ò|ó|ô|õ|ō|ŏ|ǒ|ő|ơ|ø|ǿ|º/' => 'o',
        '/Ŕ|Ŗ|Ř/' => 'R',
        '/ŕ|ŗ|ř/' => 'r',
        '/Ś|Ŝ|Ş|Š/' => 'S',
        '/ś|ŝ|ş|š|ſ/' => 's',
        '/Ţ|Ť|Ŧ/' => 'T',
        '/ţ|ť|ŧ/' => 't',
        '/Ù|Ú|Û|Ũ|Ū|Ŭ|Ů|Ű|Ų|Ư|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ/' => 'U',
        '/ù|ú|û|ũ|ū|ŭ|ů|ű|ų|ư|ǔ|ǖ|ǘ|ǚ|ǜ/' => 'u',
        '/Ý|Ÿ|Ŷ/' => 'Y',
        '/ý|ÿ|ŷ/' => 'y',
        '/Ŵ/' => 'W',
        '/ŵ/' => 'w',
        '/Ź|Ż|Ž/' => 'Z',
        '/ź|ż|ž/' => 'z',
        '/Æ|Ǽ/' => 'AE',
        '/ß/' => 'ss',
        '/Ĳ/' => 'IJ',
        '/ĳ/' => 'ij',
        '/Œ/' => 'OE',
        '/ƒ/' => 'f'
    );

    /**
     * @param $string
     * @param string $replacement
     * @return mixed
     */
    public static function slug($string, $replacement = '_')
    {
        $quotedReplacement = preg_quote($replacement, '/');

        $merge = array(
            '/[^\s\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]/mu' => ' ',
            '/\\s+/' => $replacement,
            sprintf('/^[%s]+|[%s]+$/', $quotedReplacement, $quotedReplacement) => '',
        );

        $map = self::$_transliteration + $merge;
        return preg_replace(array_keys($map), array_values($map), $string);
    }

    /**
     * @param $string
     * @param string $replacement
     * @return string
     */
    public static function slugToLower($string, $replacement = '_')
    {
        return mb_strtolower(self::slug($string, $replacement), 'UTF-8');
    }

    /**
     * @param $text
     * @param array $haystack
     * @return string
     */
    public static function uniqueSlug($text, Array $haystack)
    {
        $count = 2;
        $slug = mb_strtolower(self::slug($text, '-'), 'UTF-8');
        $aux = $slug;
        while (in_array($aux, $haystack)) {
            $aux = $slug . '-' . $count;
            $count++;
        }
        return $aux;
    }

}