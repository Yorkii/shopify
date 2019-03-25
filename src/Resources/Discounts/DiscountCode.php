<?php

namespace Yorkii\Shopify\Resources\Discounts;

use Yorkii\Shopify\Resources\BaseResource;
use Yorkii\Shopify\Resources\Traits\Depends;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * 
 * @property int $id
 * @property int $price_rule_id
 * @property int $usage_count
 * 
 * @method Carbon getCreatedAt()
 * @method int getId()
 * @method int getPriceRuleId()
 * @method int getUsageCount()
 * 
 * @method int setId($id)
 * @method int setPriceRuleId($priceRuleId)
 * @method int setUsageCount($usageCount)
 */
class DiscountCode extends BaseResource
{
    use Depends;

    /**
     * @var string
     */
    protected $resourceName = 'discount_code';

    /**
     * @var string
     */
    protected $endpoint = 'admin/price_rules/:price_rule_id/discount_codes';

    /**
     * @var string
     */
    protected $endpointLookup = 'admin/discount_codes';

    /**
     * @var array
     */
    protected $depends = [
        'price_rule_id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'usage_count' => 'int',
    ];

    /**
     * @param string $code
     *
     * @throws \Exception
     *
     * @return $this|null
     */
    public function lookup($code)
    {
        $response = $this->client->performGetRequest(
            $this->getEndpointWithVariables(false, $this->endpointLookup) . '/lookup.json',
            ['code' => $code]
        );

        // This resource returns 303, client should follow
        if ($response->getStatusCode() !== 200) {
            return null;
        }

        return $this->fillFromResponse($response);
    }

    /**
     * @param int $id
     * @param array $codes
     *
     * @return Batch|null
     */
    public function batch($id = null, $codes = [])
    {
        $batch = new Batch($this->client, [
            'price_rule_id' => $this->getData('price_rule_id'),
        ]);

        if (null === $id) {
            $data = [];

            foreach ($codes as $code) {
                $data[] = ['code' => $code];
            }

            return $batch->create($data)
                ? $batch
                : null;
        }

        return $batch->get($id);
    }
}