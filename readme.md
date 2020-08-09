
# CzProject\Logger

<a href="https://www.patreon.com/bePatron?u=9680759"><img src="https://c5.patreon.com/external/logo/become_a_patron_button.png" alt="Become a Patron!" height="35"></a>
<a href="https://www.paypal.me/janpecha/1eur"><img src="https://buymecoffee.intm.org/img/button-paypal-white.png" alt="Buy me a coffee" height="35"></a>


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

* `CzProject\Logger\CliLogger($level, $colored = NULL)` - sends messages to CLI STDOUT
* `CzProject\Logger\OutputLogger($level)` - prints messages to STDOUT
* `CzProject\Logger\FileLogger($path, $level)` - saves messages into new created file
* `CzProject\Logger\MemoryLogger()` - saves messages into memory, you can use `$memoryLogger->getLog()`
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
