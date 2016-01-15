<?php

class ErrorLevelCalculator {
	protected static $levels = array(
		'E_ALL', 'E_ERROR', 'E_WARNING', 'E_PARSE', 'E_NOTICE', 'E_CORE_ERROR', 
		'E_CORE_WARNING', 'E_COMPILE_ERROR', 'E_COMPILE_WARNING', 'E_STRICT',
		'E_USER_ERROR', 'E_USER_WARNING', 'E_USER_NOTICE'
	);
	public function toString($value)
	{
    	$output = array();
    	$seperator = ' | ';
    	if ($value > 2048) {
    		$output[] = 'E_ALL';
    		$seperator = ' & ~';
    		$value = E_ALL - $value;
    	}
    	foreach (self::$levels as $code => $name) {
    		if (($value & (int) constant($name)) == (int) constant($name)) {
				$output[] = $name;
				$value &= ~(int) constant($name);
    		}
    	}
    	return implode($seperator, $output);
	}
}
