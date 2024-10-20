<?php

namespace vBulletin\Search\Logger;

use Psr\Log\LoggerInterface;

class FileLogger implements LoggerInterface
{
    public function __construct(private string $logFile)
    {
    }

    public function info(string $message): void
    {
        file_put_contents($this->logFile, $message . "\n", FILE_APPEND);
    }
}
