<?php

class Order extends Site
{
    const DOMAIN = 'http://oferia.pl';

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = self::DOMAIN . $url;
    }
}