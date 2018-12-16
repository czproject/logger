<?php

	namespace CzProject\Logger;


	class MemoryLogger implements ILogger
	{
		/** @var string[] */
		private $log = array();


		public function log($msg, $level = self::INFO)
		{
			$this->log[] = $msg;
		}


		public function getLog()
		{
			return $this->log;
		}
	}
