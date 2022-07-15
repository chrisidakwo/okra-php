<?php

namespace Okra\Support;

use ReflectionException;
use ReflectionProperty;
use stdClass;

class Helpers
{
    /**
     * @param string $string
     * @return string
     */
    public static function toSnakeCase(string $string): string {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $string, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match === strtoupper($match) ? strtolower($match) : lcfirst($match);
        }

        return implode('_', $ret);
    }

    /**
     * @param array $subject
     * @param object $object
     * @return object
     */
    public static function arrayToObject(array $subject, object $object): object
    {
        foreach ($subject as $key => $value) {
            if (is_array($value) && self::arrayIsAssoc($value)) {
                $object->{$key} = new stdClass();
                self::arrayToObject($value, $object->$key);
            } else {
                $object->{$key} = $value;
            }
        }

        return $object;
    }

    /**
     * Determines if an array is associative.
     *
     * @param  array  $array
     * @return bool
     */
    public static function arrayIsAssoc(array $array): bool
    {
        $keys = array_keys($array);

        return array_keys($keys) !== $keys;
    }

    /**
     * Determine if an array is multi-dimensional.
     *
     * @param array $array
     * @return bool
     */
    public static function arrayIsMultiDimensional(array $array): bool
    {
        $rv = array_filter($array, 'is_array');

        return count($rv) > 0;
    }

    /**
     * @param string $className
     * @param string $propertyName
     * @return string|null
     * @throws ReflectionException
     */
    public static function getPropertyTypeFromAnnotation(string $className, string $propertyName): ?string
    {
        $rp = new ReflectionProperty($className, $propertyName);
        if (preg_match('/@var\s+([^\s]+)/', $rp->getDocComment(), $matches)) {
            return $matches[1];
        }

        return null;
    }
}
