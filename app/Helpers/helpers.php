<?php

use App\Helpers\SerializationHelper;

function format_title($title, $type = 1): string
{
    switch ($type) {
        case 1:
            return $title . ' | ' . config('settings.app_name');
        case 2:
            return $title . ' | ' . config('settings.app_name_client');
        default:
            return $title;
    }
}

function country_code_localized($code): string
{
    return trans('serialize.other.country.' . $code);
}

function language_code_localized($code): string
{
    return trans('serialize.other.language.' . $code);
}

function datetime_format($object): string
{
    return $object->format('d.m.Y H:i');
}

function relative_serialized_diff($from, $to): string
{
    $totalDiff = $to->diffInSeconds($from);

    $days = intval($totalDiff / (60 * 60 * 24));
    $hours = intval($totalDiff / (60 * 60)) % 24;
    $minutes = intval($totalDiff / 60) % 60;
    $seconds = $totalDiff % 60;

    $serializedSeconds = SerializationHelper::serializeQuantity('second', $seconds);

    if ($days > 0) {
        $serializedDays = SerializationHelper::serializeQuantity('day', $days);
        $serializedHours = SerializationHelper::serializeQuantity('hour', $hours);
        $serializedMinutes = SerializationHelper::serializeQuantity('minute', $minutes);

        return $serializedDays . ' '
            . $serializedHours . ' '
            . $serializedMinutes . ' '
            . trans('app.context.word.and') . ' '
            . $serializedSeconds;
    }
    if ($hours > 0) {
        $serializedHours = SerializationHelper::serializeQuantity('hour', $hours);
        $serializedMinutes = SerializationHelper::serializeQuantity('minute', $minutes);

        return $serializedHours . ' '
            . $serializedMinutes . ' '
            . trans('app.context.word.and') . ' '
            . $serializedSeconds;
    }
    if ($minutes > 0) {
        $serializedMinutes = SerializationHelper::serializeQuantity('minute', $minutes);

        return $serializedMinutes . ' '
            . trans('app.context.word.and') . ' '
            . $serializedSeconds;
    }
    return $serializedSeconds;
}

function eq_admin_route(string $route = null): string
{
    if (!$route) {
        return config('settings.url_prefix_admin');
    }
    return config('settings.url_prefix_admin') . '/' . $route;
}

function eq_media_route(string $path): string
{
    return \Illuminate\Support\Facades\Storage::disk('media')->path($path);
}
