<?php

namespace Yorki\Shopify\Criteria;

use Yorki\Shopify\Client;
use Yorki\Shopify\Data;
use Yorki\Shopify\Traits\Casts;
use Yorki\Shopify\Traits\TextTransform;

class Base extends Data
{
    use TextTransform,
        Casts;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var array
     */
    protected $keys = [];

    /**
     * @var array
     */
    protected $filters = [];

    /**
     * @param Client $client
     * @param array $data
     */
    public function __construct(Client $client, $data = [])
    {
        $this->client = $client;

        parent::__construct($data);

        $this->addTraitsKeys();
    }

    protected function addTraitsKeys()
    {
        if (method_exists($this, 'addCreatedAtKeys')) {
            $this->addCreatedAtKeys();
        }

        if (method_exists($this, 'addUpdatedAtKeys')) {
            $this->addUpdatedAtKeys();
        }

        if (method_exists($this, 'addPublishedAtKeys')) {
            $this->addPublishedAtKeys();
        }

        if (method_exists($this, 'addStartsAtKeys')) {
            $this->addStartsAtKeys();
        }

        if (method_exists($this, 'addEndsAtKeys')) {
            $this->addEndsAtKeys();
        }

        if (method_exists($this, 'addProcessedAtKeys')) {
            $this->addProcessedAtKeys();
        }
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
        $prefix = strtoupper(substr($name, 0, 5));
        $suffix = substr($name, 5);

        if ('WHERE' !== $prefix) {
            throw new \Exception('Call to undefined method ' . $name);
        }

        if (empty($arguments)) {
            throw new \Exception('Empty where arguments');
        }

        $name = $this->toSnakeCase($suffix);

        if (!in_array($name, $this->keys)) {
            if (strpos($name, '_between')) {
                $name = substr($name, 0, strpos($name, '_between'));

                if (in_array($name . '_min', $this->keys) && in_array($name . '_max', $this->keys)) {
                    if (is_array($arguments[0]) && count($arguments[0]) > 1) {
                        return $this->whereBetween($name, $arguments[0]);
                    } elseif (count($arguments) > 1) {
                        return $this->whereBetween($name, $arguments);
                    }
                }

                throw new \Exception('Invalid between declaration');
            }

            throw new \Exception('Unknown criteria key ' . $name);
        }

        return $this->where($name, $arguments[0]);
    }

    /**
     * @param string $field
     * @param mixed $value
     *
     * @return $this
     */
    public function where($field, $value)
    {
        $this->filters[$field] = $this->castDataBackward($field, $value);

        return $this;
    }

    /**
     * @param $field
     * @param array $values
     *
     * @throws \Exception
     *
     * @return $this
     */
    public function whereBetween($field, array $values)
    {
        if (count($values) < 2) {
            throw new \Exception('Invalid between declaration');
        }

        if (!in_array($field . '_min', $this->keys) && in_array($field . '_max', $this->keys)) {
            throw new \Exception('This key cannot be declared as between');
        }

        $this->where($field . '_min', $values[0]);
        $this->where($field . '_max', $values[1]);

        return $this;
    }

    /**
     * @param int $page
     *
     * @return $this
     */
    public function page($page)
    {
        $this->filters['page'] = (int) $page;

        return $this;
    }

    /**
     * @param int $limit
     *
     * @return $this
     */
    public function limit($limit)
    {
        if ($limit > 250) {
            $limit = 250;
        }

        $this->filters['limit'] = (int) $limit;

        return $this;
    }

    /**
     * @param string|array $fields
     *
     * @return $this
     */
    public function only($fields)
    {
        if (is_array($fields)) {
            $fields = implode(',', $fields);
        }

        $this->filters['fields'] = $fields;

        return $this;
    }

    public function toArray()
    {
        return $this->filters;
        $data = $this->getChangedData();
        $result = [];

        foreach ($this->keys as $key) {
            if (isset($data[$key])) {
                $result[$key] = $data[$key];
            }
        }

        return $result;
    }
}