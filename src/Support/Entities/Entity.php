<?php

namespace Okra\Support\Entities;

use GuzzleHttp\Exception\InvalidArgumentException;
use GuzzleHttp\Utils;
use Okra\Support\Helpers;
use ReflectionClass;
use stdClass;

class Entity
{
    /**
     * Entity constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties = [])
    {
        $reflectionClass = new ReflectionClass($this);
        $classProperties = $reflectionClass->getProperties();

        foreach ($classProperties as $classProperty) {
            $value = $properties[Helpers::toSnakeCase($classProperty->getName())]
                ?? $properties[$classProperty->getName()]
                ?? null;

            if (is_array($value) && Helpers::assertArrayIsAssoc($value)) {
                $object = new stdClass;
                $value = Helpers::arrayToObject($value, $object);
            } elseif (is_array($value) && Helpers::assertArrayIsMultiDimensional($value)) {
                $object = new stdClass;
                foreach (array_values($value) as $newValue) {
                    $return[] = Helpers::arrayToObject(array_values($newValue), $object);
                }

                $value = $return ?? [];
            }

            $this->{$classProperty->getName()} = $value;
        }
    }

    /**
     * @return array
     * @throws InvalidArgumentException
     */
    public function toArray(): array
    {
        // An Entity should not be dependent on guzzle.
        // Most preferably, use PHP in-built json_encode and json_decode functions.
        // Same as for every location, except within the Http directory, where such
        // and any other guzzle utility functions are called
        return Utils::jsonDecode(
            Utils::jsonEncode($this, JSON_THROW_ON_ERROR),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }
}
