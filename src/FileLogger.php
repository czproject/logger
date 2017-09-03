<?php

	namespace CzProject\Logger;


	class FileLogger implements ILogger
	{
		/** @var resource */
		private $file;

		/** @var int */
		private $level;


		/**
		 * @param  string
		 * @param  int
		 */
		public function __construct($file, $level = ILogger::INFO)
		{
			$this->file = fopen($file, 'w');
			$this->level = $level;
		}


		public function log($msg, $level = ILogger::INFO)
		{
			if ($level >= $this->level) {
				fwrite($this->file, $msg . "\n");
			}
		}
	}
