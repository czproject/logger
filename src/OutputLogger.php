<?php

	namespace CzProject\Logger;


	class OutputLogger implements ILogger
	{
		/** @var int */
		private $level;


		/**
		 * @param  int $level
		 */
		public function __construct($level = ILogger::INFO)
		{
			$this->level = $level;
		}


		public function log($msg, $level = ILogger::INFO)
		{
			if ($level >= $this->level) {
				echo $msg, "\n";
			}
		}
	}
