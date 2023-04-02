<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;

class TimeHelper
{
    public static function serializeTimeDiff($dateTime)
    {
        $parsedDateTime = Carbon::parse($dateTime);
        $diff = Carbon::now()->diffInSeconds($parsedDateTime, false);

        $isPast = false;
        if ($diff < 0) {
            $isPast = true;
            $diff = -$diff;
        }

        if ($isPast) {
            if ($diff < 60) {
                return static::pluralize('second', 'elapsed', $diff);
            } elseif (($diffInMinutes = floor($diff / 60)) < 60) {
                return static::pluralize('minute', 'elapsed', $diffInMinutes);
            } elseif (($diffInHours = floor($diff / 60 / 60)) < 24) {
                return static::pluralize('hour', 'elapsed', $diffInHours);
            }
        } else {
            if (($diff = floor($diff)) < 60) {
                return static::pluralize('second', 'remaining', $diff);
            } elseif (($diffInMinutes = floor($diff / 60)) < 60) {
                return static::pluralize('minute', 'remaining', $diffInMinutes);
            } elseif (($diffInHours = floor($diff / 60 / 60)) < 24) {
                return static::pluralize('hour', 'remaining', $diffInHours);
            }
        }
        return datetime_format($dateTime);
    }

    private static function pluralize($unit, $type, $count)
    {
        if ($count == 1) {
            return trans('serialize.other.time.' . $type . '.' . $unit . '__one', ['count' => $count]);
        } elseif ($count <= 4) {
            return trans('serialize.other.time.' . $type . '.' . $unit . '__few', ['count' => $count]);
        }
        return trans('serialize.other.time.' . $type . '.' . $unit . '__many', ['count' => $count]);
    }
}
