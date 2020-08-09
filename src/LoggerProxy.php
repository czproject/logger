<?php

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
		 * @param  string
		 * @return void
		 */
		public function debug($s)
		{
			$this->logger->log($s, ILogger::DEBUG);
		}


		/**
		 * @param  string
		 * @return void
		 */
		public function log($s)
		{
			$this->logger->log($s);
		}


		/**
		 * @param  string
		 * @return void
		 */
		public function info($s)
		{
			$this->logger->log($s);
		}


		/**
		 * @param  string
		 * @return void
		 */
		public function success($s)
		{
			$this->logger->log($s, ILogger::SUCCESS);
		}


		/**
		 * @param  string
		 * @return void
		 */
		public function warning($s)
		{
			$this->logger->log($s, ILogger::WARNING);
		}


		/**
		 * @param  string
		 * @return void
		 */
		public function error($s)
		{
			$this->logger->log($s, ILogger::ERROR);
		}


		/**
		 * @param  string
		 * @return void
		 */
		public function exception($s)
		{
			$this->logger->log($s, ILogger::EXCEPTION);
		}


		/**
		 * @param  string
		 * @return void
		 */
		public function critical($s)
		{
			$this->logger->log($s, ILogger::CRITICAL);
		}
	}
