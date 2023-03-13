<?php

	namespace CzProject\Logger;


	class MultiLogger implements ILogger
	{
		/** @var ILogger[] */
		private $loggers = [];


		/**
		 * @return self
		 */
		public function addLogger(ILogger $logger)
		{
			$this->loggers[] = $logger;
			return $this;
		}


		public function log($msg, $level = self::INFO)
		{
			foreach ($this->loggers as $logger) {
				$logger->log($msg, $level);
			}
		}
	}
