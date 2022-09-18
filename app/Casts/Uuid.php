<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Uid\Uuid as SymfonyUuid;

class Uuid implements CastsAttributes
{
    /**
     * Cast the given value to a UUID
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes)
    {
        $converted = SymfonyUuid::fromRfc4122($value);
        Log::debug('Cast UUID "${value}" from string');

        return $converted;
    }

    /**
     * Convert the UUID to a string ready for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        $converted = SymfonyUuid::toRfc4122($value);
        Log::debug('Converted UUID to string "${value}"');

        return $converted;
    }

    /**
     * Convert the UUID back to a string ready for serialization.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function serialize($model, string $key, $value, array $attributes)
    {
        $converted = SymfonyUuid::toRfc4122($value);
        Log::debug('Converted UUID to string "${value}" ready for serialization');

        return $converted;
    }
}
