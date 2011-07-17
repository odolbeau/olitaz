<?php

namespace Olitaz\HomeBundle\WS;

use Symfony\Component\HttpKernel\Log\LoggerInterface;

class Tumblr {

    /**
     * @var string
     */
    private $apiKey;
    /**
     * @var Symfony\Component\HttpKernel\Log\LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * Constructor
     *
     * @param string $apiKey
     * @param LoggerInterface $logger
     */
    public __construct($apiKey, LoggerInterface $logger) {
        $this->apiKey = $apiKey;
        $this->logger = $logger;
    }

}
