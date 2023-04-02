<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class CSVReader
{
    public static function loadToArray($file, $separator = ',')
    {
        $header = null;
        $loaded = [];
        $paired = [];

        $stream = Storage::readStream($file);
        if ($stream) {
            while (($data = fgetcsv($stream, 1000, $separator)) !== false) {
                if (is_null($header)) {
                    $header = $data;
                } else {
                    $loaded[] = $data;
                }
            }
        }
        foreach ($loaded as $i => $row) {
            for ($j = 0; $j < count($row); $j++) {
                $paired[$i][$header[$j]] = !empty($row[$j]) ? $row[$j] : null;
            }
        }
        return $paired;
    }
}
