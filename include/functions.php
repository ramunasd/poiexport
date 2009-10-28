<?php

$LANG = $_SESSION['LANG'];

function msg($s) {
	global $LANG;
	global $messages;

	if (isset($messages[$s])) {
		echo $messages[$s];
	} else {
		echo $s;
	}
}

//include the required localization file
function i18n() {
        global $LANG;
	$LANG = $_SESSION['LANG'];
	if (!isset($LANG) OR !isset($_SESSION['LANG'])) {
		$LANG = split(",",$_SERVER["HTTP_ACCEPT_LANGUAGE"]);
		$LANG = split("-",$LANG[0]);
		$LANG = $LANG[0];
		if ($LANG == "") {
			$LANG = "en";
		}
	}
	global $messages;
	//if the language file does not exist, default to english
	if (include_once 'include/'.$LANG.'.php'){
		$_SESSION['LANG']=$LANG;
	} else {
		$LANG='en';
		$_SESSION['LANG']=$LANG;
	}
}
?>