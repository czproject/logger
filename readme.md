# CzProject\Logger

[![Build Status](https://github.com/czproject/logger/workflows/Build/badge.svg)](https://github.com/czproject/logger/actions)
[![Downloads this Month](https://img.shields.io/packagist/dm/czproject/logger.svg)](https://packagist.org/packages/czproject/logger)
[![Latest Stable Version](https://poser.pugx.org/czproject/logger/v/stable)](https://github.com/czproject/logger/releases)
[![License](https://img.shields.io/badge/license-New%20BSD-blue.svg)](https://github.com/czproject/logger/blob/master/license.md)

<a href="https://www.janpecha.cz/donate/"><img src="https://buymecoffee.intm.org/img/donate-banner.v1.svg" alt="Donate" height="100"></a>


## Installation

[Download a latest package](https://github.com/czproject/logger/releases) or use [Composer](http://getcomposer.org/):

```
composer require czproject/logger
```

CzProject\Logger requires PHP 8.0 or later.


## Usage

``` php
use CzProject\Logger;
use CzProject\Logger\ILogger;

$logger = new Logger\OutputLogger(ILogger::DEBUG); // minimal level
$logger->log('Debug info', ILogger::DEBUG);
$logger->log('Output', ILogger::INFO);
$logger->log('Done!', ILogger::SUCCESS);
$logger->log('Warning...', ILogger::WARNING);
$logger->log('Error message', ILogger::ERROR);
$logger->log('Exception message', ILogger::EXCEPTION);
$logger->log('App crashed.', ILogger::CRITICAL);
```

### Loggers

* `CzProject\Logger\CliLogger($level, $colored = NULL)` - sends messages to CLI STDOUT
* `CzProject\Logger\OutputLogger($level)` - prints messages to STDOUT
* `CzProject\Logger\FileLogger($path, $level)` - saves messages into new created file
* `CzProject\Logger\MemoryLogger($level)` - saves messages into memory, you can use `$memoryLogger->getLog()`
* `CzProject\Logger\MultiLogger()` - sends messages to other loggers

``` php
$logger = new Logger\MultiLogger;
$logger->addLogger(new Logger\OutputLogger(ILogger::INFO));
$logger->addLogger(new Logger\FileLogger(__DIR__ . '/debug.log', ILogger::DEBUG));

$logger->log($msg, $level);
```

### LoggerProxy

LoggerProxy is interface for using of Logger.

```php
$logger = new Logger\OutputLogger(ILogger::DEBUG); // minimal level
$proxy = new Logger\LoggerProxy($logger);
$proxy->debug('Debug info');
$proxy->log('Output'); // or $proxy->info()
$proxy->success('Done!');
$proxy->warning('Warning...', ILogger::WARNING);
$proxy->error('Error message', ILogger::ERROR);
$proxy->exception('Exception message', ILogger::EXCEPTION);
$proxy->critical('App crashed.', ILogger::CRITICAL);
```

------------------------------

License: [New BSD License](license.md)
<br>Author: Jan Pecha, https://www.janpecha.cz/
