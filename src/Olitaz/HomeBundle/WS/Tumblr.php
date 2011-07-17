<?php

namespace Olitaz\HomeBundle\WS;

use Symfony\Component\HttpKernel\Log\LoggerInterface;

class Tumblr {

    /**
     * @var string
     */
    private $entryPoint;
    /**
     * @var string
     */
    private $apiKey;
    /**
     * @var Symfony\Component\HttpKernel\Log\LoggerInterface
     */
    private $logger;

    /**
     * Constructor
     *
     * @param string $apiKey
     * @param LoggerInterface $logger
     */
    public function __construct($entryPoint, $apiKey, LoggerInterface $logger)
    {
        $this->entryPoint = $entryPoint;
        $this->apiKey = $apiKey;
        $this->logger = $logger;
    }

    public function retrieveLastPosts($number)
    {
        $response = $this->call('posts', array('limit' => $number));

        if(!$response || 200 != $response->meta->status || !$response->response->posts)
        {
            return null;
        }

        $posts = array();
        foreach($response->response->posts as $p) {
            $post['url'] = $p->post_url;
            $post['date'] = $p->date;
            $post['title'] = $p->title;
            $body = html_entity_decode(strip_tags($p->body), ENT_COMPAT, 'UTF-8');
            $body = mb_substr($body, 0, 120);
            $delimiter = max(mb_strripos($body, ' '), mb_strripos($body, '.'));
            if($delimiter) {
                $body = mb_substr($body, 0, $delimiter);
            }
            $post['body'] = $body.'...';
            $posts[] = $post;
        }

        return $posts;
    }

    /**
     * call
     *
     * @param string $urlPart
     * @param array $params array of key / value
     * @return stdClass
     */
    public function call($urlPart, $params)
    {
        $url = $this->entryPoint.'/'.$urlPart.'?api_key='.$this->apiKey;

        foreach($params as $key => $value) {
            $url .= '&'.$key.'='.$value;
        }

        $ch = curl_init();
        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

        if ($this->logger != null) {
            $this->logger->debug('Call ' . $url);
        }

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result);
    }
}
