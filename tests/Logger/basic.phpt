<?php

declare(strict_types=1);

use CzProject\Logger;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


test(function () {
	$logger = new Logger\MultiLogger;

	$memoryLogger = new Logger\MemoryLogger;
	$logger->addLogger($memoryLogger);

	$file = Tester\FileMock::create('');
	$fileLogger = new Logger\FileLogger($file, Logger\ILogger::DEBUG);
	$logger->addLogger($fileLogger);

	$proxy = new Logger\LoggerProxy($logger);
	$proxy->debug('DEBUG');
	$proxy->log('INFO LOG');
	$proxy->info('INFO');
	$proxy->success('SUCCESS');
	$proxy->warning('WARNING');
	$proxy->error('ERROR');
	$proxy->exception('EXCEPTION');
	$proxy->critical('CRITICAL');

	Assert::same([
		'INFO LOG',
		'INFO',
		'SUCCESS',
		'WARNING',
		'ERROR',
		'EXCEPTION',
		'CRITICAL',
	], $memoryLogger->getLog());

	Assert::same("DEBUG\nINFO LOG\nINFO\nSUCCESS\nWARNING\nERROR\nEXCEPTION\nCRITICAL\n", file_get_contents($file));
});
