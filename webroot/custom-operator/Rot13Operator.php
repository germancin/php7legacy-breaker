<?php

namespace Vendor\Rx\Operator;

use Rx\DisposableInterface;
use Rx\ObservableInterface;
use Rx\ObserverInterface;
use Rx\Operator\OperatorInterface;

class Rot13Operator implements OperatorInterface
{
    /**
     * @inheritDoc
     */
    public function __invoke(ObservableInterface $observable, ObserverInterface $observer): DisposableInterface
    {

        $attacheWordCount = function($message){
            return self::attacheWordCount($message);
        };

        return $observable->subscribe(
            function ($json) use ($observer, $attacheWordCount) {
                $observer->onNext($attacheWordCount($json));
            },
            [$observer, 'onError'],
            [$observer, 'onCompleted']
        );
    }

    /**
     * @param string $message
     * @return string
     */
    private static function attacheWordCount(string $message): string
    {
        return $message . "(" . strlen($message) . ")";
    }
}