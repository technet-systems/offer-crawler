<?php

class SiteLoader
{
    /**
     * @return array Site
     */
    public function getSites()
    {
        $fileManager = new FileManager();
        $locations = $fileManager->getDataFromFile('res', 'settings.json');

        $sites = [];

        foreach ($locations as $category => $url)
        {
            $site = new Site();
            $site->setCategory($category);
            $site->setUrl($url);
            $sites[] = $site;
        }

        return $sites;
    }
}