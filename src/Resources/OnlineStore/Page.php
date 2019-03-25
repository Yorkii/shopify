<?php

namespace Yorkii\Shopify\Resources\OnlineStore;

use Yorkii\Shopify\Criteria\OnlineStore\PageCriteria;
use Yorkii\Shopify\Resources\BaseResource;
use Yorkii\Shopify\Resources\Metafield\Metafield;
use Yorkii\Shopify\Resources\Traits\Counts;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $published_at
 * @property-read Metafield $metafield
 *
 * @property int $id
 * @property int $shop_id
 * @property string $title
 * @property string $author
 * @property string $body_html
 * @property string $handle
 * @property string $template_suffix
 * 
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Carbon getPublishedAt()
 * @method Metafield getMetafield() 
 * @method int getId()
 * @method int getShopId()
 * @method string getTitle()
 * @method string getAuthor()
 * @method string getBodyHtml()
 * @method string getHandle()
 * @method string getTemplateSuffix()
 * 
 * @method $this setId($value)
 * @method $this setShopId($value)
 * @method $this setTitle($value)
 * @method $this setAuthor($value)
 * @method $this setBodyHtml($value)
 * @method $this setHandle($value)
 * @method $this setTemplateSuffix($value)
 */
class Page extends BaseResource
{
    use Counts;

    /**
     * @var string
     */
    protected $resourceName = 'page';

    /**
     * @var array
     */
    protected $casts = [
        'metafield' => 'resource:' . Metafield::class,
    ];

    /**
     * @return PageCriteria
     */
    public function criteria()
    {
        return new PageCriteria($this->client);
    }
}