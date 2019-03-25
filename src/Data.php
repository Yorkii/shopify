<?php

namespace Yorki\Shopify;

use Yorki\Shopify\Traits\Casts;
use Yorki\Shopify\Traits\TextTransform;

class Data
{
    use TextTransform,
        Casts;

    /**
     * @var bool
     */
    protected $readOnly;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var array
     */
    protected $changedData;

    /**
     * Data constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->changedData = [];
        $this->setOriginalData($data);
    }

    /**
     * @param string $name
     * @param string $arguments
     *
     * @throws \Exception
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        $prefix = strtoupper(substr($name, 0, 3));
        $suffix = substr($name, 3);

        switch ($prefix) {
            case 'GET':
                return $this->getData($this->toSnakeCase($suffix));
            case 'SET':
                if ($this->readOnly) {
                    throw new \Exception('This data is read only');
                }

                return $this->setData($this->toSnakeCase($suffix), $arguments[0]);
            default:
                throw new \Exception('Call to undefined method ' . $name);
        }
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function __get($name)
    {
        return $this->getData($name);
    }

    /**
     * @param string $name
     * @param string $value
     *
     * @return $this
     */
    public function __set($name, $value)
    {
        return $this->setData($name, $value);
    }

    /**
     * @param string $value
     *
     * @return array
     */
    protected function fromCommaSeparated($value)
    {
        if (empty(trim($value))) {
            return [];
        }

        $exploded = explode(',', $value);

        return array_map('trim', $exploded);
    }

    /**
     * @param array $value
     *
     * @return string
     */
    protected function toCommaSeparated(array $value)
    {
        return implode(',', $value);
    }

    /**
     * @param string $name
     * @param mixed $default
     * @param bool $cast
     *
     * @return mixed
     */
    public function getData($name = null, $default = null, $cast = true)
    {
        $data = array_merge($this->data, $this->changedData);

        if (null === $name) {
            return $data;
        }

        if (!isset($data[$name])) {
            return $default;
        }

        $method = $this->toCamelCase('get_' . $name . '_attribute');

        if (method_exists($this, $method)) {
            return $this->{$method}($data[$name]);
        }

        return $cast
            ? $this->castData($name, $data[$name])
            : $data[$name];
    }

    /**
     * @param string $name
     * @param string $value
     *
     * @return $this
     */
    public function setData($name, $value)
    {
        $method = $this->toCamelCase('set_' . $name . '_attribute');

        if (method_exists($this, $method)) {
            $value = $this->{$method}($value);
        }

        $this->changedData[$name] = $value;

        return $this;
    }

    /**
     * @return array
     */
    public function getChangedData()
    {
        return $this->changedData;
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function setOriginalData(array $data)
    {
        $this->data = $data;

        foreach ($this->data as $name => $value) {
            $this->castData($name, $value);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getKeys()
    {
        return array_keys($this->data);
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function has($key)
    {
        return in_array($key, $this->getKeys());
    }

    /**
     * @return array
     */
    public function getOriginalData()
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $data = [];

        foreach ($this->data as $name => $value) {
            $castedObject = $this->getCastedObject($name);

            if ($castedObject) {
                $data[$name] = $castedObject->toArray();

                continue;
            }

            $data[$name] = $this->getData($name, null, false);
        }

        return $data;
    }
}
