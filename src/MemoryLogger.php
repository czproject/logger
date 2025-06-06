<?php

	declare(strict_types=1);

	namespace CzProject\Logger;


	class MemoryLogger implements ILogger
	{
		/** @var int */
		private $level;

		/** @var string[] */
		private $log = [];


		/**
		 * @param  int $level
		 */
		public function __construct($level = ILogger::INFO)
		{
			$this->level = $level;
		}


		public function log($msg, $level = self::INFO)
		{
			if ($level >= $this->level) {
				$this->log[] = $msg;
			}
		}


		/**
		 * @return string[]
		 */
		public function getLog()
		{
			return $this->log;
		}
	}
