<?php

namespace Yorkii\Shopify\Traits;

use Yorkii\Shopify\Collection;
use Carbon\Carbon;

trait Casts
{
    /**
     * @var array
     */
    protected $castedObjects;

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return mixed
     */
    protected function castDataBackward($name, $value)
    {
        if (null === $value) {
            return null;
        }

        if (isset($this->castedObjects[$name])) {
            if (method_exists($this->castedObjects[$name], 'toArray')) {
                return $this->castedObjects[$name]->toArray();
            }

            return $this->castedObjects[$name]->__toString();
        }

        if (!property_exists($this, 'casts') || !isset($this->casts[$name])) {
            return $value;
        }

        $castTo = $this->casts[$name];

        switch ($castTo) {
            case 'string':
                return (string)$value;
            case 'boolean':
            case 'bool':
                return (bool)$value;
            case 'integer':
            case 'int':
                return (int)$value;
            case 'float':
            case 'double':
                return (float)$value;
            case 'array':
                return (array)$value;
            default:
                $object = $this->castFromObject($name, $value);

                if ($object) {
                    return $object;
                }

                return $value;
        }
    }

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return mixed
     */
    protected function castFromObject($name, $value)
    {
        $castTo = $this->casts[$name];
        $castArray = explode(':', $castTo);
        $castAs = $castArray[0];

        if ('date' === $castAs) {
            return isset($this->castedObjects[$name])
                ? $this->castedObjects[$name]->__toString()
                : null;
        }

        if ('comma_separated' === $castAs) {
            return is_array($value)
                ? implode(',', $value)
                : $value;
        }

        if (method_exists($value, 'toArray')) {
            return $value->toArray();
        }

        if (method_exists($value, '__toString')) {
            return $value->__toString();
        }

        return $value;
    }

    /**
     * @param string $name
     * @param string $value
     *
     * @return mixed
     */
    protected function castData($name, $value)
    {
        if (null === $value) {
            return null;
        }

        if (isset($this->castedObjects[$name])) {
            return $this->castedObjects[$name];
        }

        if (!property_exists($this, 'casts') || !isset($this->casts[$name])) {
            return $this->tryAutoCastData($name, $value);
        }

        $castTo = $this->casts[$name];

        switch ($castTo) {
            case 'string':
                return (string) $value;
            case 'boolean':
            case 'bool':
                return (bool) $value;
            case 'integer':
            case 'int':
                return (int) $value;
            case 'float':
            case 'double':
                return (float) $value;
            case 'array':
                return (array) $value;
            default:
                $object = $this->castToObject($name, $value);

                if ($object) {
                    return $object;
                }

                return $value;
        }
    }

    /**
     * @param string $name
     * @param $value
     *
     * @return mixed
     */
    protected function castToObject($name, $value)
    {
        $castTo = $this->casts[$name];
        $castArray = explode(':', $castTo);
        $castAs = $castArray[0];

        if ('date' === $castAs) {
            $this->castedObjects[$name] = (count($castArray) === 2)
                ? Carbon::createFromFormat($castArray[1], $value)
                : Carbon::parse($value);

            return $this->castedObjects[$name];
        }

        if ('comma_separated' === $castAs) {
            if (empty(trim($value))) {
                return [];
            }

            $exploded = explode(',', $value);

            return array_map('trim', $exploded);
        }

        if ('collection' === $castAs) {
            $collectionType = (count($castArray) === 3)
                ? $castArray[1]
                : 'resource';
            $class = end($castArray);

            if (class_exists($class)) {
                $items = [];

                foreach ($value as $item) {
                    if ('resource' === $collectionType || 'schema' === $collectionType) {
                        $resource = new $class($this->client, $item);

                        if (method_exists($resource, 'of')
                            && method_exists($this, 'provides')
                        ) {
                            $resource->of($this);
                        }

                        $items[] = $resource;
                    } else {
                        $items[] = new $class($item);
                    }
                }

                $this->castedObjects[$name] = new Collection($items);

                return $this->castedObjects[$name];
            }
        }

        if ('resource' === $castAs || 'schema' === $castAs) {
            $class = end($castArray);

            if (class_exists($class)) {
                $this->castedObjects[$name] = new $class($this->client, $value);

                if (method_exists($this->castedObjects[$name], 'of')
                    && method_exists($this, 'provides')
                ) {
                    $this->castedObjects[$name]->of($this);
                }

                return $this->castedObjects[$name];
            }
        }

        if ('property' === $castAs) {
            $class = end($castArray);

            if (class_exists($class)) {
                $this->castedObjects[$name] = new $castTo($value);

                return $this->castedObjects[$name];
            }
        }
    }

    /**
     * @param string $name
     * @param string $value
     *
     * @return mixed
     */
    protected function tryAutoCastData($name, $value)
    {
        $exploded = explode('_', $name);
        $suffix = end($exploded);

        if ('id' === $suffix) {
            return (int) $value;
        }

        if ('at' === $suffix || 'on' === $suffix) {
            $this->castedObjects[$name] = Carbon::parse($value);

            return $this->castedObjects[$name];
        }

        return $value;
    }

    /**
     * @return array
     */
    protected function getCastedToArray()
    {
        $result = [];

        foreach ($this->castedObjects as $name => $castedObject) {
            $result[$name] = $this->castDataBackward($name, $castedObject);
        }

        return $result;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    protected function getCastedObject($name)
    {
        return isset($this->castedObjects[$name])
            ? $this->castedObjects[$name]
            : null;
    }
}