<?php

	declare(strict_types=1);

	namespace CzProject\Logger;


	class LoggerProxy
	{
		/** @var ILogger */
		private $logger;


		public function __construct(ILogger $logger)
		{
			$this->logger = $logger;
		}


		/**
		 * @param  string $s
		 * @return void
		 */
		public function debug($s)
		{
			$this->logger->log($s, ILogger::DEBUG);
		}


		/**
		 * @param  string $s
		 * @return void
		 */
		public function log($s)
		{
			$this->logger->log($s);
		}


		/**
		 * @param  string $s
		 * @return void
		 */
		public function info($s)
		{
			$this->logger->log($s);
		}


		/**
		 * @param  string $s
		 * @return void
		 */
		public function success($s)
		{
			$this->logger->log($s, ILogger::SUCCESS);
		}


		/**
		 * @param  string $s
		 * @return void
		 */
		public function warning($s)
		{
			$this->logger->log($s, ILogger::WARNING);
		}


		/**
		 * @param  string $s
		 * @return void
		 */
		public function error($s)
		{
			$this->logger->log($s, ILogger::ERROR);
		}


		/**
		 * @param  string $s
		 * @return void
		 */
		public function exception($s)
		{
			$this->logger->log($s, ILogger::EXCEPTION);
		}


		/**
		 * @param  string $s
		 * @return void
		 */
		public function critical($s)
		{
			$this->logger->log($s, ILogger::CRITICAL);
		}
	}
