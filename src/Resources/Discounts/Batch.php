<?php

namespace Yorkii\Shopify\Resources\Discounts;

use Yorkii\Shopify\Resources\Base;
use Yorkii\Shopify\Resources\Traits\Creates;
use Yorkii\Shopify\Resources\Traits\Depends;
use Yorkii\Shopify\Resources\Traits\GetsSingle;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $started_at
 * @property-read Carbon $completed_at
 *
 * @property int $id
 * @property int $price_rule_id
 * @property int $codes_count
 * @property int $imported_count
 * @property int $failed_count
 * @property string $status
 *
 * @method int getId()
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Carbon getStartedAt()
 * @method Carbon getCompletedAt()
 * @method int getPriceRuleId()
 * @method int getCodesCount()
 * @method int getImportedCount()
 * @method int getFailedCount()
 * @method string getStatus()
 *
 * @method $this setId($id)
 * @method $this setPriceRuleId($priceRuleId)
 * @method $this setCodesCount($codesCount)
 * @method $this setImportedCount($importedCount)
 * @method $this setFailedCount($failedCount)
 * @method $this setStatus($status)
 */
class Batch extends Base
{
    use GetsSingle,
        Creates,
        Depends;

    /**
     * @var string
     */
    protected $resourceName = 'discount_code_creation';

    /**
     * @var string
     */
    protected $endpoint = 'admin/price_rules/:price_rule_id/batch';

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
        'codes_count' => 'int',
        'imported_count' => 'int',
        'failed_count' => 'int',
    ];

    /**
     * @throws \Exception
     *
     * @return array
     */
    public function discountCodes()
    {
        $response = $this->client->performGetRequest(
            $this->getFilledSingleEndpoint(null, '/discount_codes.json')
        );

        $data = $response->toArray();
        $result = [];

        if (empty($data['discount_codes'])) {
            return [];
        }

        foreach ($data['discount_codes'] as $code) {
            $result[] = $code['code'];
        }

        return $result;
    }
}