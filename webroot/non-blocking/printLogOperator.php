<?php

namespace Vendor\Rx\Logger;

use Rx\DisposableInterface;
use Rx\ObservableInterface;
use Rx\ObserverInterface;
use Rx\Operator\OperatorInterface;

class printLogOperator implements OperatorInterface
{
    /**
     * @inheritDoc
     */
    public function __invoke(ObservableInterface $observable, ObserverInterface $observer): DisposableInterface
    {

        $printLogger = function($message){
            return self::printLog($message);
        };

        return $observable->subscribe(
            function ($json) use ($observer, $printLogger) {
                $observer->onNext($printLogger($json));
            },
            [$observer, 'onError'],
            [$observer, 'onCompleted']
        );




    }

    /**
     * @param string $message
     * @return string
     */
    private static function $printLog(string $message): string
    {
        error_log($message . " :: printLog", 3 , "/var/www/app.log");
        return true;
    }
}