<?php

namespace Yorki\Shopify\Properties\Inventory;

use Yorki\Shopify\Criteria\Inventory\InventoryLevelCriteria;
use Yorki\Shopify\Resources\Base;
use Yorki\Shopify\Resources\Traits\GetsAll;
use \Carbon\Carbon;

/**
 * @property-read Carbon $updated_at
 * 
 * @property int $inventory_item_id
 * @property int $location_id
 * @property int $available
 * @property string $admin_graphql_api_id
 * 
 * @method Carbon getUpdatedAt() 
 * @method int getInventoryItemId()
 * @method int getLocationId()
 * @method int getAvailable()
 * @method string getAdminGraphqlApiId()
 *
 * @method $this setInventoryItemId($value)
 * @method $this setLocationId($value)
 * @method $this setAvailable($value)
 * @method $this setAdminGraphqlApiId($value)
 */
class InventoryLevel extends Base
{
    use GetsAll;

    /**
     * @var string
     */
    protected $resourceName = 'inventory_level';

    /**
     * @var array 
     */
    protected $casts = [
        'available' => 'int',
    ];

    /**
     * @param int $inventoryItemId
     * @param int $locationId
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function delete($inventoryItemId = null, $locationId = null)
    {
        if (null === $inventoryItemId) {
            $inventoryItemId = $this->getData('inventory_item_id');
        }

        if (null === $locationId) {
            $locationId = $this->getData('location_id');
        }

        if (null === $inventoryItemId || null === $locationId) {
            return false;
        }

        $response = $this->client->performDeleteRequest(
            $this->getEndpointWithVariables() . '.json',
            [
                'inventory_item_id' => $inventoryItemId,
                'location_id' => $locationId,
            ]
        );

        return $response->getStatusCode() === 200;
    }

    /**
     * @param array $params
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function adjust(array $params = [])
    {
        $response = $this->client->performPostRequest(
            $this->getEndpointWithVariables() . '/adjust.json',
            $params
        );

        return $response->getStatusCode() === 200;
    }

    /**
     * @param array $params
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function connect(array $params = [])
    {
        $response = $this->client->performPostRequest(
            $this->getEndpointWithVariables() . '/connect.json',
            $params
        );

        return $response->getStatusCode() === 200;
    }

    /**
     * @param array $params
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function set(array $params = [])
    {
        $response = $this->client->performPostRequest(
            $this->getEndpointWithVariables() . '/set.json',
            $params
        );

        return $response->getStatusCode() === 200;
    }

    /**
     * @return InventoryLevelCriteria
     */
    public function criteria()
    {
        return new InventoryLevelCriteria($this->client);
    }
}