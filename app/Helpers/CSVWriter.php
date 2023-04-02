<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CSVWriter
{
    private $header;

    public function setHeader($header)
    {
        $this->header = $header;
    }

    public function write($data, $separator = ';', $byKey = true)
    {
        $path = Str::random(40) . '.csv';
        Storage::append($path, implode($separator, $this->header));
        if ($byKey) {
            // TODO
            foreach ($data as $row) {
                $bufferArray = [];
                foreach ($this->header as $headerField) {
                    //
                    //
                }
            }
        } else {
            foreach ($data as $row) {
                Storage::append($path, implode($separator, array_values($row)));
            }
        }
    }
}
