<?php

namespace Yorki\Shopify\Resources\OnlineStore;

use Yorki\Shopify\Criteria\OnlineStore\BlogCriteria;
use Yorki\Shopify\Resources\BaseResource;
use Yorki\Shopify\Resources\Metafield\Metafield;
use Yorki\Shopify\Resources\Traits\Counts;
use Yorki\Shopify\Resources\Traits\Provides;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $published_at
 * @property-read Metafield $metafield
 *
 * @property int $id
 * @property string $title
 * @property string $commentable
 * @property string $feedburner
 * @property string $feedburner_location
 * @property string $handle
 * @property string $template_suffix
 * @property array $tags
 * 
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Carbon getPublishedAt()
 * @method Metafield getMetafield() 
 * @method int getId()
 * @method string getTitle()
 * @method string getCommentable()
 * @method string getFeedburner()
 * @method string getFeedburnerLocation()
 * @method string getHandle()
 * @method string getTemplateSuffix()
 * @method array getTags()
 * 
 * @method $this setId($value)
 * @method $this setCommentable($value)
 * @method $this setTitle($value)
 * @method $this setFeedburner($value)
 * @method $this setFeedburnerLocation($value)
 * @method $this setHandle($value)
 * @method $this setTemplateSuffix($value)
 * @method $this setTags(array $value)
 */
class Blog extends BaseResource
{
    use Counts,
        Provides;

    /**
     * @var string
     */
    protected $resourceName = 'blog';

    /**
     * @var array
     */
    protected $provides = [
        'blog_id' => 'id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'metafield' => 'resource:' . Metafield::class,
    ];

    /**
     * @param string $value
     *
     * @return array
     */
    public function getTagsAttribute($value)
    {
        return $this->fromCommaSeparated($value);
    }

    /**
     * @param array $tags
     *
     * @return string
     */
    public function setTagsAttribute(array $tags)
    {
        return $this->toCommaSeparated($tags);
    }

    /**
     * @return BlogCriteria
     */
    public function criteria()
    {
        return new BlogCriteria($this->client);
    }
}