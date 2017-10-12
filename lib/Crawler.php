<?php

class Crawler
{
    public function crawl()
    {
        $siteLoader = new SiteLoader();
        $sites = $siteLoader->getSites();

        $orderLoader = new OrderLoader();

        $newOrders = [];

        foreach ($sites as $site) {
            $siteContent = file($site->getUrl());

            foreach ($siteContent as $line) {
                if(strpos($line, Site::SEARCH)) {
                    $newOrder = explode('"', $line);
                    $newOrders[$newOrder[1]] = $site->getCategory();
                }
            }
        }

        $matchedOrders = $this->matchResults($newOrders);

        if ($matchedOrders == false)
        {
            return false;
        }

        $matchedOrders = $orderLoader->getOrders($matchedOrders);

        return $matchedOrders;
    }

    private function matchResults($newOrders)
    {
        $storage = new Storage();
        $data = $storage->getDataFromFile();

        if(count($data))
        {
            $matchedOrders = array_diff_assoc($newOrders, $data);

            if(count($matchedOrders))
            {
                $storage->saveDataToFile($newOrders);
                return $matchedOrders;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}