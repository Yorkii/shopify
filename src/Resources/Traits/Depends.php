<?php

namespace Yorkii\Shopify\Resources\Traits;

use Yorkii\Shopify\Resources\Base;

trait Depends
{
    /**
     * @var array
     */
    protected $resolvedDependencies = [];

    /**
     * @return array
     */
    public function depends()
    {
        if (property_exists($this, 'depends')) {
            return $this->depends;
        }

        return [];
    }

    /**
     * @param string $name
     *
     * @return array|mixed
     */
    public function getResolvedDependencies($name = null)
    {
        if (null === $name) {
            return $this->resolvedDependencies;
        }

        return isset($this->resolvedDependencies[$name])
            ? $this->resolvedDependencies[$name]
            : null;
    }

    /**
     * @param Base $resource
     *
     * @return $this
     */
    public function of($resource)
    {
        if (!method_exists($resource, 'provides')) {
            return $this;
        }

        foreach ($this->depends() as $depend) {
            foreach ($resource->provides() as $external => $internal) {
                if ($depend === $external) {
                    $this->resolvedDependencies[$external] = $resource->{$internal};
                }
            }
        }

        if (method_exists($resource, 'passes')
            && method_exists($resource, 'getResolvedDependencies')
        ) {
            foreach ($resource->passes() as $variable) {
                $this->resolvedDependencies[$variable] = $resource->getResolvedDependencies($variable);
            }
        }

        return $this;
    }

    /**
     * @param array $values
     *
     * @return $this
     */
    public function using(array $values)
    {
        foreach ($values as $provide => $value) {
            $this->resolvedDependencies[$provide] = $value;
        }

        return $this;
    }
}