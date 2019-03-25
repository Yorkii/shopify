<?php

namespace Yorki\Shopify\Resources\Customers;

use Yorki\Shopify\Collection;
use Yorki\Shopify\Criteria\Customers\CustomerSavedSearchCriteria;
use Yorki\Shopify\Resources\BaseResource;
use Yorki\Shopify\Resources\Traits\Counts;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 *
 * @property int $id
 * @property string $name
 * @property string $query
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method int getId()
 * @method string getName()
 * @method string getQuery()
 * 
 * @method $this setId($id)
 * @method $this setName($name)
 * @method $this setQuery($query)
 */
class CustomerSavedSearch extends BaseResource
{
    use Counts;

    /**
     * @var string
     */
    protected $resourceName = 'customer_saved_search';

    /**
     * @throws \Exception
     *
     * @return Collection
     */
    public function customers()
    {
        $response = $this->client->performGetRequest(
            $this->getFilledSingleEndpoint(null, '/customers.json')
        );

        return $this->getCollectionFromResponse(
            $response,
            'customers',
            Customer::class
        );
    }

    /**
     * @return CustomerSavedSearchCriteria
     */
    public function criteria()
    {
        return new CustomerSavedSearchCriteria($this->client);
    }
}