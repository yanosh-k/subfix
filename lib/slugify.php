<?php

/**
	* Returns a string with all spaces converted to underscores (by default), accented
	* characters converted to non-accented characters, and non word characters removed.
	*
	* @param string $string the string you want to slug
	* @param string $replacement will replace keys in map
	* @return string
	* @link https://book.cakephp.org/2.0/en/core-utility-libraries/inflector.html#Inflector::slug
*/
function slug($string, $replacement = '-') {
	
	$transliteration = [
		'/À|Á|Â|Ã|Å|Ǻ|Ā|Ă|Ą|Ǎ/' => 'A',
		'/Æ|Ǽ/' => 'AE',
		'/Ä/' => 'Ae',
		'/Ç|Ć|Ĉ|Ċ|Č/' => 'C',
		'/Ð|Ď|Đ/' => 'D',
		'/È|É|Ê|Ë|Ē|Ĕ|Ė|Ę|Ě/' => 'E',
		'/Ĝ|Ğ|Ġ|Ģ|Ґ/' => 'G',
		'/Ĥ|Ħ/' => 'H',
		'/Ì|Í|Î|Ï|Ĩ|Ī|Ĭ|Ǐ|Į|İ|І/' => 'I',
		'/Ĳ/' => 'IJ',
		'/Ĵ/' => 'J',
		'/Ķ/' => 'K',
		'/Ĺ|Ļ|Ľ|Ŀ|Ł/' => 'L',
		'/Ñ|Ń|Ņ|Ň/' => 'N',
		'/Ò|Ó|Ô|Õ|Ō|Ŏ|Ǒ|Ő|Ơ|Ø|Ǿ/' => 'O',
		'/Œ/' => 'OE',
		'/Ö/' => 'Oe',
		'/Ŕ|Ŗ|Ř/' => 'R',
		'/Ś|Ŝ|Ş|Ș|Š/' => 'S',
		'/ẞ/' => 'SS',
		'/Ţ|Ț|Ť|Ŧ/' => 'T',
		'/Þ/' => 'TH',
		'/Ù|Ú|Û|Ũ|Ū|Ŭ|Ů|Ű|Ų|Ư|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ/' => 'U',
		'/Ü/' => 'Ue',
		'/Ŵ/' => 'W',
		'/Ý|Ÿ|Ŷ/' => 'Y',
		'/Є/' => 'Ye',
		'/Ї/' => 'Yi',
		'/Ź|Ż|Ž/' => 'Z',
		'/à|á|â|ã|å|ǻ|ā|ă|ą|ǎ|ª/' => 'a',
		'/ä|æ|ǽ/' => 'ae',
		'/ç|ć|ĉ|ċ|č/' => 'c',
		'/ð|ď|đ/' => 'd',
		'/è|é|ê|ë|ē|ĕ|ė|ę|ě/' => 'e',
		'/ƒ/' => 'f',
		'/ĝ|ğ|ġ|ģ|ґ/' => 'g',
		'/ĥ|ħ/' => 'h',
		'/ì|í|î|ï|ĩ|ī|ĭ|ǐ|į|ı|і/' => 'i',
		'/ĳ/' => 'ij',
		'/ĵ/' => 'j',
		'/ķ/' => 'k',
		'/ĺ|ļ|ľ|ŀ|ł/' => 'l',
		'/ñ|ń|ņ|ň|ŉ/' => 'n',
		'/ò|ó|ô|õ|ō|ŏ|ǒ|ő|ơ|ø|ǿ|º/' => 'o',
		'/ö|œ/' => 'oe',
		'/ŕ|ŗ|ř/' => 'r',
		'/ś|ŝ|ş|ș|š|ſ/' => 's',
		'/ß/' => 'ss',
		'/ţ|ț|ť|ŧ/' => 't',
		'/þ/' => 'th',
		'/ù|ú|û|ũ|ū|ŭ|ů|ű|ų|ư|ǔ|ǖ|ǘ|ǚ|ǜ/' => 'u',
		'/ü/' => 'ue',
		'/ŵ/' => 'w',
		'/ý|ÿ|ŷ/' => 'y',
		'/є/' => 'ye',
		'/ї/' => 'yi',
		'/ź|ż|ž/' => 'z',
		'/А/' => 'A',
		'/Б/' => 'B',
		'/В/' => 'V',
		'/Г/' => 'G',
		'/Д/' => 'D',
		'/Е/' => 'E',
		'/Ж/' => 'J',
		'/З/' => 'Z',
		'/И/' => 'I',
		'/Й/' => 'J',
		'/К/' => 'K',
		'/Л/' => 'L',
		'/М/' => 'M',
		'/Н/' => 'N',
		'/О/' => 'O',
		'/П/' => 'P',
		'/Р/' => 'R',
		'/С/' => 'S',
		'/Т/' => 'T',
		'/У/' => 'U',
		'/Ф/' => 'F',
		'/Х/' => 'H',
		'/Ц/' => 'C',
		'/Ч/' => 'CH',
		'/Ш/' => 'SH',
		'/Щ/' => 'SHT',
		'/Ъ/' => 'Y',
		'/Ь/' => 'I',
		'/Ю/' => 'U',
		'/Я/' => 'JA',
		'/а/' => 'a',
		'/б/' => 'b',
		'/в/' => 'v',
		'/г/' => 'g',
		'/д/' => 'd',
		'/е/' => 'e',
		'/ж/' => 'j',
		'/з/' => 'z',
		'/и/' => 'i',
		'/й/' => 'j',
		'/к/' => 'k',
		'/л/' => 'l',
		'/м/' => 'm',
		'/н/' => 'n',
		'/о/' => 'o',
		'/п/' => 'p',
		'/р/' => 'r',
		'/с/' => 's',
		'/т/' => 't',
		'/у/' => 'u',
		'/ф/' => 'f',
		'/х/' => 'h',
		'/ц/' => 'c',
		'/ч/' => 'ch',
		'/ш/' => 'sh',
		'/щ/' => 'sht',
		'/ъ/' => 'y',
		'/ь/' => 'i',
		'/ю/' => 'u',
		'/я/' => 'ja'
	];
	$quotedReplacement = preg_quote($replacement, '/');

	$merge = [
		'/[^\s\p{Zs}\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]/mu' => ' ',
		'/[\s\p{Zs}]+/mu' => $replacement,
		sprintf('/^[%s]+|[%s]+$/', $quotedReplacement, $quotedReplacement) => '',
	];

	$map = $transliteration + $merge;
	return preg_replace(array_keys($map), array_values($map), $string);
}