<?php

class Site
{
    /**
     * @var string
     */
    protected $category;

    /**
     * @var string
     */
    protected $url;

    const DOMAIN = 'http://oferia.pl/zlecenia';

    const SEARCH = 'data-click-area';

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = self::DOMAIN . $url;
    }
}