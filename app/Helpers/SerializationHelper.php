<?php

namespace App\Helpers;

class SerializationHelper
{
    public static function serializeQuantity($entity, $quantity, $withoutValue = false)
    {
        if ($quantity === 1) {
            $group = 'one';
        } elseif ($quantity >= 2 && $quantity <= 4) {
            $group = 'few';
        } else {
            $group = 'many';
        }
        $serializedEntity = __('serialize.' . $entity . '.' . $group);
        if ($withoutValue) {
            return $serializedEntity;
        }
        return "{$quantity} {$serializedEntity}";
    }
}
