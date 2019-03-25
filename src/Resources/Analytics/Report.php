<?php

namespace Yorki\Shopify\Resources\Analytics;

use Yorki\Shopify\Criteria\Analytics\ReportCriteria;
use Yorki\Shopify\Resources\BaseResource;
use \Carbon\Carbon;

/**
 * @property-read Carbon $updated_at
 *
 * @property int $id
 * @property string $name
 * @property string $category
 * @property string $shopify_ql
 *
 * @method int getId()
 * @method Carbon getCreatedAt()
 * @method string getName()
 * @method string getCategory()
 * @method string getShopifyQl()
 *
 * @method $this setId($id)
 * @method $this setName($name)
 * @method $this setCategory($category)
 * @method $this setShopifyQl($shopifyQl)
 */
class Report extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceName = 'report';

    /**
     * @return ReportCriteria
     */
    public function criteria()
    {
        return new ReportCriteria($this->client);
    }
}