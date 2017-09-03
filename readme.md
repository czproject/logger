
# CzProject\Logger


## Installation

[Download a latest package](https://github.com/czproject/logger/releases) or use [Composer](http://getcomposer.org/):

```
composer require czproject/logger
```

CzProject\Logger requires PHP 5.4.0 or later.


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

* `CzProject\Logger\OutputLogger($level)` - prints messages to STDOUT
* `CzProject\Logger\FileLogger($path, $level)` - saves messages into new created file
* `CzProject\Logger\MultiLogger()` - sends messages to other loggers

``` php
$logger = new Logger\MultiLogger;
$logger->addLogger(new Logger\OutputLogger(ILogger::INFO));
$logger->addLogger(new Logger\FileLogger(__DIR__ . '/debug.log', ILogger::DEBUG));

$logger->log($msg, $level);
```


------------------------------

License: [New BSD License](license.md)
<br>Author: Jan Pecha, https://www.janpecha.cz/
