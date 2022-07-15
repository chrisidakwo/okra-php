<?php

namespace Okra\Support;

use DateTime;
use Okra\Exceptions\InvalidRequestDataException;
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
            if (is_array($value) && self::assertArrayIsAssoc($value)) {
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
    public static function assertArrayIsAssoc(array $array): bool
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
    public static function assertArrayIsMultiDimensional(array $array): bool
    {
        $rv = array_filter($array, 'is_array');

        return count($rv) > 0;
    }

    /**
     * Assert that a string is a valid date.
     *
     * @param string $date
     * @param string $format
     * @return void
     * @throws InvalidRequestDataException
     */
    public static function assertStringIsDate(string $date, string $format = 'Y-m-d'): void
    {
        $d = DateTime::createFromFormat($format, $date);

        if (false === ($d && ($d->format($format) === $date))) {
            throw new InvalidRequestDataException("The provided string [$date] is not a valid date.");
        }
    }
}
