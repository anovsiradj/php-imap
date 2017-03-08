<?php
function &config($data = null) {
	static $config = array();
	if ($data === null) {
		return $config;
	} elseif(is_array($data)) {
		foreach ($data as $k => $v) {
			$config[$k] = $v;
		}
	} else {
		// todo: header 500
		die(__FILE__ . ':' . (__LINE__ + 1));
	}
}


class MyAppConfig
{
	private static $instance;
	private static $__collection = array();

	public static function &init()
	{
		$args = func_get_args();
		if (isset($args[1])) {
			if (is_string($args[0])) {
				static::$__collection[$args[0]] = $args[1];
			}

		} elseif(isset($args[0]) && is_array($args[0])) {
			foreach ($args[0] as $k => $v) {
				static::$__collection[$k] = $v;
			}
		}

		if (!isset(static::$instance)) {
			static::$instance = new MyAppConfig;
		}

		return static::$instance;
	}

	public function __get($k)
	{
		if (isset(static::$__collection[$k])) {
			return static::$__collection[$k];
		}
		return null;
	}

	public function __set($k,$v)
	{
		static::$__collection[$k] = $v;
	}
}
