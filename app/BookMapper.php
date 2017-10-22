<?php
namespace App;

class BookMapper {

	protected static $bookMapping  = array(
		"Genesis"           => "GEN",
		"Exodus"            => "EXO",
		"Leviticus"         => "LEV",
		"Numeri"            => "NUM",
		"Deutronomium"      => "DEU",
		"Jozua"             => "JOS",
		"Richteren"         => "JDG",
		"Ruth"              => "RUT",
		"1 Samuël"          => "1SA",
		"2 Samuël"          => "2SA",
		"1 Koningen"        => "1KI",
		"2 Koningen"        => "2KI",
		"1 Kronieken"       => "1CH",
		"2 Kronieken"       => "2CH",
		"Ezra"              => "EZR",
		"Nehemia"           => "NEH",
		"Esther"            => "EST",
		"Job"               => "JOB",
		"Psalmen"           => "PSA",
		"Spreuken"          => "PRO",
		"Prediker"          => "ECC",
		"Hooglied"          => "SNG",
		"Jesaja"            => "ISA",
		"Jeremia"           => "JER",
		"Klaagliederen"     => "LAM",
		"Ezechiël"          => "EZK",
		"Daniël"            => "DAN",
		"Hosea"             => "HOS",
		"Joël"              => "JOL",
		"Amos"              => "AMO",
		"Obadja"            => "OBA",
		"Jona"              => "JON",
		"Micha"             => "MIC",
		"Nahum"             => "NAM",
		"Habakuk"           => "HAB",
		"Sefanja"           => "ZEP",
		"Haggaï"            => "HAG",
		"Zacharia"          => "ZEC",
		"Maleachi"          => "MAL",
		"Mattheüs"          => "MAT",
		"Markus"            => "MRK",
		"Lukas"             => "LUK",
		"Johannes"          => "JHN",
		"Handelingen"       => "ACT",
		"Romeinen"          => "ROM",
		"1 Korinthiërs"     => "1CO",
		"2 Korinthiërs"     => "2CO",
		"Galaten"           => "GAL",
		"Efeziërs"          => "EPH",
		"Filippenzen"       => "PHP",
		"Kolossenzen"       => "COL",
		"1 Tessalonicenzen" => "1TH",
		"2 Tessalonicenzen" => "2TH",
		"1 Timotheüs"       => "1TI",
		"2 Timotheüs"       => "2TI",
		"Titus"             => "TIT",
		"Filemon"           => "PHM",
		"Hebreeërs"         => "HEB",
		"Jakobus"           => "JAS",
		"1 Petrus"          => "1PE",
		"2 Petrus"          => "2PE",
		"1 Johannes"        => "1JN",
		"2 Johannes"        => "2JN",
		"3 Johannes"        => "3JN",
		"Judas"             => "JUD",
		"Openbaringen"      => "REV"
	);

	protected static $bookMappingEnglish  = array(
		"Genesis" => "GEN",
		"Exodus"  => "EXO",
		"Leviticus" => "LEV",
		"Numbers" => "NUM",
		"Deuteronomy" => "DEU",
		"Joshua" => "JOS",
		"Judges" => "JDG",
		"Ruth" => "RUT",
		"1 Samuel"  => "1SA",
		"2 Samuel" => "2SA",
		"1 Kings" => "1KI",
		"2 Kings"  => "2KI",
		"1 Chronicles" => "1CH",
		"2 Chronicles" => "2CH",
		"Ezra" => "EZR",
		"Nehemiah" => "NEH",
		"Esther" => "EST",
		"Job" => "JOB",
		"Psalms" => "PSA",
		"Proverbs" => "PRO",
		"Ecclesiastes" => "ECC",
		"Song of Solomon" => "SNG",
		"Isaiah" => "ISA",
		"Jeremiah" => "JER",
		"Lamentations" => "LAM",
		"Ezekiel" => "EZK",
		"Daniel"  => "DAN",
		"Hosea" => "HOS",
		"Joel"  => "JOL",
		"Amos" => "AMO",
		"Obadiah" => "OBA",
		"Jonah" => "JON",
		"Micah" => "MIC",
		"Nahum" => "NAM",
		"Habakkuk" => "HAB",
		"Zephaniah" => "ZEP",
		"Haggai" => "HAG",
		"Zechariah" => "ZEC",
		"Malachi" => "MAL",
		"Matthew" => "MAT",
		"Mark" => "MRK",
		"Luke" => "LUK",
		"John" => "JHN",
		"Acts" => "ACT",
		"Romans" => "ROM",
		"1 Corinthians" => "1CO",
		"2 Corinthians" => "2CO",
		"Galatians" => "GAL",
		"Ephesians" => "EPH",
		"Philippians" => "PHP",
		"Colossians" => "COL",
		"1 Thessalonians" => "1TH",
		"2 Thessalonians" => "2TH",
		"1 Timothy" => "1TI",
		"2 Timothy" => "2TI",
		"Titus" => "TIT",
		"Philemon" => "PHM",
		"Hebrews" => "HEB",
		"James" => "JAS",
		"1 Peter"  => "1PE",
		"2 Peter" => "2PE",
		"1 John" => "1JN",
		"2 John" => "2JN",
		"3 John" => "3JN",
		"Jude" => "JUD",
		"Revelation" => "REV"
	);

	public static function getApiNameByName($name){
		if(isset(self::$bookMapping[$name])){
			return self::$bookMapping[$name];
		}
		return false;
	}

	public static function getApiNameByEnglishName($name){
		if(isset(self::$bookMappingEnglish[$name])){
			return self::$bookMappingEnglish[$name];
		}
		return false;
	}

}