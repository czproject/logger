<?php

	namespace CzProject\Logger;


	interface ILogger
	{
		const DEBUG = 0;
		const INFO = 10;
		const SUCCESS = 20;
		const WARNING = 30;
		const ERROR = 40;
		const EXCEPTION = 50;
		const CRITICAL = 60;


		function log($msg, $level = self::INFO);
	}
