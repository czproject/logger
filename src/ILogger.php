<?php

	declare(strict_types=1);

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


		/**
		 * @param  string $msg
		 * @param  int $level
		 * @return void
		 */
		function log($msg, $level = self::INFO);
	}
