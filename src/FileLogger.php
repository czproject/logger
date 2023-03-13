<?php

	namespace CzProject\Logger;


	class FileLogger implements ILogger
	{
		/** @var resource */
		private $file;

		/** @var int */
		private $level;


		/**
		 * @param  string $file
		 * @param  int $level
		 */
		public function __construct($file, $level = ILogger::INFO)
		{
			$fp = fopen($file, 'w');

			if ($fp === FALSE) {
				throw new \RuntimeException("fopen() failed.");
			}

			$this->file = $fp;
			$this->level = $level;
		}


		public function log($msg, $level = ILogger::INFO)
		{
			if ($level >= $this->level) {
				fwrite($this->file, $msg . "\n");
			}
		}
	}
