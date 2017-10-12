<?php

class FileManager
{
    private $data;
    const DIR = __DIR__ . '/../';

    public function getDataFromFile($directoryName, $fileName)
    {
        $data = json_decode(file_get_contents(self::DIR . $directoryName . '/' . $fileName));
        $this->data = $data;

        return $data;
    }

    // TODO save a file from to a proper direcotory
    public function saveDataToFile()
    {

    }
}

//var_dump($_SERVER["REMOTE_HOST"] ?: gethostbyaddr($_SERVER["REMOTE_ADDR"]));