<?php

class Storage
{
    const DIR = __DIR__ . '/../data/';
    private $data;

    /**
     * @return array of recent orders
     */
    public function getDataFromFile() {
        $lastFile = end(array_diff(scandir(self::DIR), array('.', '..')));

        $data = json_decode(file_get_contents(self::DIR . $lastFile), true);
        $this->data = $data;

        return $data;
    }

    public function saveDataToFile(array $newOrders) {
        file_put_contents(self::DIR . time() . '.json', json_encode($newOrders, JSON_PRETTY_PRINT));
    }
}