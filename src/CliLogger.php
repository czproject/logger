<?php

	namespace CzProject\Logger;


	class CliLogger implements ILogger
	{
		/** @var int */
		private $level;

		/** @var bool */
		private $colored;

		/** @var array */
		protected static $colors = array(
			ILogger::SUCCESS => '0;32',
			ILogger::ERROR => '0;31',
			ILogger::EXCEPTION => '0;31',
			ILogger::CRITICAL => '0;31',
			ILogger::WARNING => '0;33',
			ILogger::DEBUG => '1;30',
		);


		/**
		 * @param  int
		 */
		public function __construct($level = ILogger::INFO, $colored = NULL)
		{
			$this->level = $level;
			$this->colored = $colored !== NULL ? $colored : self::detectColoredOutput();
		}


		public function log($msg, $level = ILogger::INFO)
		{
			if ($level >= $this->level) {
				if ($this->colored && isset(self::$colors[$level])) {
					echo "\033[", self::$colors[$level], 'm', $msg, "\033[0m\n";

				} else {
					echo $msg, "\n";
				}
			}
		}


		/**
		 * @return	bool
		 */
		public static function detectColoredOutput()
		{
			// Code from Tracy (from Nette Framework)
			// see https://github.com/nette/tracy/blob/master/src/Tracy/Dumper.php#L315-L317
			return (getenv('ConEmuANSI') === 'ON'
				|| getenv('ANSICON') !== FALSE
				|| (defined('STDOUT') && function_exists('posix_isatty') && posix_isatty(STDOUT)));
		}
	}
