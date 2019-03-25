<?php

namespace Yorkii\Shopify\Resources\Products;

use Yorkii\Shopify\Criteria\Products\SmartCollectionCriteria;
use Yorkii\Shopify\Properties\Products\SmartCollectionImage;
use Yorkii\Shopify\Resources\BaseResource;
use Yorkii\Shopify\Resources\Traits\Counts;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $published_at
 * @property-read SmartCollectionImage $image
 *
 * @property int $id
 * @property string $body_html
 * @property string $handle
 * @property string $published_scope
 * @property array $rules
 * @property bool $disjunctive
 * @property string $sort_order
 * @property string $template_suffix
 * @property string $title
 * 
 * @method int getId()
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Carbon getPublishedAt()
 * @method SmartCollectionImage getImage()
 * @method string getBodyHtml()
 * @method string getHandle()
 * @method string getPublishedScope()
 * @method array getRules()
 * @method bool getDisjunctive()
 * @method string getSortOrder()
 * @method string getTemplateSuffix()
 * @method string getTitle()
 * 
 * @method $this setId($id)
 * @method $this setBodyHtml($bodyHtml)
 * @method $this setHandle($handle)
 * @method $this setPublishedScope($publishedScope)
 * @method $this setRules($rules)
 * @method $this setDisjunctive($disjunctive)
 * @method $this setSortOrder($sortOrder)
 * @method $this setTemplateSuffix($templateSuffix)
 * @method $this setTitle($title)
 */
class SmartCollection extends BaseResource
{
    use Counts;

    /**
     * @var string
     */
    protected $resourceName = 'smart_collection';

    /**
     * @var array
     */
    protected $casts = [
        'rules' => 'array',
        'disjunctive' => 'bool',
        'image' => 'property:' . SmartCollectionImage::class,
    ];

    /**
     * @return SmartCollectionCriteria
     */
    public function criteria()
    {
        return new SmartCollectionCriteria($this->client);
    }
}