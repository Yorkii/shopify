<?php

namespace Yorkii\Shopify\Resources;

use Yorkii\Shopify\Client;
use Yorkii\Shopify\Collection;
use Yorkii\Shopify\Data;

abstract class Base extends Data
{
    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var string
     */
    protected $resourceName;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var string
     */
    protected $singleKey;

    /**
     * @var string
     */
    protected $plural;

    /**
     * @var string
     */
    protected $collectionKey;

    /**
     * @var Client
     */
    protected $client;

    /**
     * Base constructor.
     *
     * @param Client $client
     * @param array $data
     */
    public function __construct(Client $client, array $data = [])
    {
        $this->client = $client;

        parent::__construct($data);
    }

    /**
     * @return string
     */
    protected function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    /**
     * @return string
     */
    protected function getResourceName()
    {
        return $this->resourceName;
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        if ($this->endpoint !== null) {
            return $this->endpoint;
        }

        return 'admin/' . $this->getPlural();
    }

    /**
     * @return string
     */
    protected function getSingular()
    {
        return $this->getResourceName();
    }

    /**
     * @return string
     */
    protected function getPlural()
    {
        if ($this->plural !== null) {
            return $this->plural;
        }

        return $this->getSingular() . 's';
    }

    /**
     * @return string
     */
    protected function getSingleKey()
    {
        if ($this->singleKey !== null) {
            return $this->singleKey;
        }

        return $this->getSingular();
    }

    /**
     * @return string
     */
    protected function getCollectionKey()
    {
        if ($this->collectionKey !== null) {
            return $this->collectionKey;
        }

        return $this->getPlural();
    }

    /**
     * @return string
     */
    protected function getEndpointSingle()
    {
        return $this->getEndpoint();
    }

    /**
     * @param bool $single
     * @param string $custom
     *
     * @throws \Exception
     *
     * @return string
     */
    protected function getEndpointWithVariables($single = false, $custom = '')
    {
        $endpoint = $single
            ? $this->getEndpointSingle()
            : $this->getEndpoint();

        if (!empty($custom)) {
            $endpoint = $custom;
        }

        preg_match_all('/[^\/]+/', $endpoint, $matches);

        if (empty($matches)) {
            return $endpoint;
        }

        foreach ($matches[0] as $match) {
            if (substr($match, 0, 1) === ':') {
                $variableName = substr($match, 1);

                if (!method_exists($this, 'getResolvedDependencies')) {
                    throw new \Exception('This resource has :' . $variableName . ' dependency, but no implementation');
                }

                $resolved = $this->getResolvedDependencies($variableName);

                if (!$resolved) {
                    throw new \Exception('This resource has :' . $variableName . ' dependency, but could not resolve it');
                }

                $endpoint = str_replace($match, $resolved, $endpoint);
            } elseif (substr($match, 0, 1) === '@') {
                $variableName = substr($match, 1);
                $value = $this->getData($variableName);

                if (!$value) {
                    throw new \Exception('This resource uses @' . $variableName . ' variable in endpoint, but could not get it');
                }

                $endpoint = str_replace($match, $value, $endpoint);
            }
        }

        return $endpoint;
    }

    /**
     * @param int $id
     * @param string $ending
     *
     * @throws \Exception
     *
     * @return string
     */
    protected function getFilledSingleEndpoint($id = null, $ending = '.json')
    {
        if (null === $id) {
            $id = $this->getData($this->getPrimaryKey());
        }

        if (null !== $id) {
            $id = '/' . $id;
        }

        return $this->getEndpointWithVariables(true) . $id . $ending;
    }

    /**
     * @param $response
     * @param string $customKey
     * @param string $customClass
     * @param bool $resource
     *
     * @return Collection
     */
    protected function getCollectionFromResponse($response, $customKey = null, $customClass = null, $resource = true)
    {
        $result = [];
        $data = $response->toArray();

        if ($customKey === null) {
            $customKey = $this->getCollectionKey();
        }

        if ($customClass === null) {
            $customClass = static::class;
        }

        if (empty($data[$customKey])) {
            return new Collection;
        }

        foreach ($data[$customKey] as $datum) {
            $object = $resource
                ? new $customClass($this->client, $datum)
                : new $customClass($datum);

            if ($resource
                && method_exists($object, 'of')
                && method_exists($this, 'provides')
            ) {
                $object->of($this);
            }

            $result[] = $object;
        }

        return new Collection($result);
    }

    /**
     * @param $response
     *
     * @return $this|null
     */
    protected function fillFromResponse($response)
    {
        $data = $response->toArray();

        $this->data = [];
        $this->changedData = [];

        if (empty($data[$this->getSingleKey()])) {
            return null;
        }

        $this->data = $data[$this->getSingleKey()];

        return $this;
    }

    /**
     * @param int $id
     * @param string $action
     * @param array $params
     *
     * @throws \Exception
     *
     * @return bool
     */
    protected function singlePostWithSuccess($id, $action, $params = [])
    {
        if (null === $id && null === $this->getData($this->getPrimaryKey())) {
            return false;
        }

        $response = $this->client->performPostRequest(
            $this->getFilledSingleEndpoint($id, '/' . $action . '.json'),
            $params
        );

        return $response->getStatusCode() === 200;
    }

    /**
     * @param int $id
     * @param string $action
     * @param array $params
     *
     * @throws \Exception
     *
     * @return bool
     */
    protected function singlePutWithSuccess($id, $action, $params = [])
    {
        if (null === $id && null === $this->getData($this->getPrimaryKey())) {
            return false;
        }

        $response = $this->client->performPutRequest(
            $this->getFilledSingleEndpoint($id, ($action ? '/' . $action : '') . '.json'),
            $params
        );

        return $response->getStatusCode() === 200;
    }
}