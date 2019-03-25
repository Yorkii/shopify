<?php

namespace Yorkii\Shopify\Resources\OnlineStore;

use Yorkii\Shopify\Criteria\OnlineStore\BlogArticleCriteria;
use Yorkii\Shopify\Properties\OnlineStore\Image;
use Yorkii\Shopify\Resources\BaseResource;
use Yorkii\Shopify\Resources\Metafield\Metafield;
use Yorkii\Shopify\Resources\Traits\Counts;
use Yorkii\Shopify\Resources\Traits\Depends;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $published_at
 * @property-read Metafield $metafield
 * @property-read Image $image
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $author
 * @property string $body_html
 * @property string $handle
 * @property string $summary_html
 * @property string $template_suffix
 * @property array $tags
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Carbon getPublishedAt()
 * @method Metafield getMetafield()
 * @method Image getImage()
 * @method int getId()
 * @method int getUserId()
 * @method string getTitle()
 * @method string getAuthor()
 * @method string getBodyHtml()
 * @method string getHandle()
 * @method string getSummaryHtml()
 * @method string getTemplateSuffix()
 * @method array getTags()
 * 
 * @method $this setId($value)
 * @method $this setUserId($value)
 * @method $this setTitle($value)
 * @method $this setAuthor($value)
 * @method $this setBodyHtml($value)
 * @method $this setHandle($value)
 * @method $this setSummaryHtml($value)
 * @method $this setTemplateSuffix($value)
 * @method $this setTags(array $value)
 */
class BlogArticle extends BaseResource
{
    use Counts,
        Depends;

    /**
     * @var string
     */
    protected $resourceName = 'article';

    /**
     * @var string
     */
    protected $endpoint = 'admin/blogs/:blog_id/articles';

    /**
     * @var array
     */
    protected $depends = [
        'blog_id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'published' => 'bool',
        'metafield' => 'resource:' . Metafield::class,
        'image' => 'property:' . Image::class,
    ];

    /**
     * @return string
     */
    public function getEndpointSingle()
    {
        return 'admin/articles';
    }

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
     * @throws \Exception
     *
     * @return array
     */
    public function authors()
    {
        $response = $this->client->performGetRequest(
            $this->getFilledSingleEndpoint(null, '/authors.json')
        );

        $data = $response->toArray();

        return !empty($data['authors'])
            ? $data['authors']
            : [];
    }

    /**
     * @throws \Exception
     *
     * @return array
     */
    public function tags()
    {
        $response = $this->client->performGetRequest(
            $this->getFilledSingleEndpoint(null, '/tags.json')
        );

        $data = $response->toArray();

        return !empty($data['tags'])
            ? $data['tags']
            : [];
    }

    /**
     * @return BlogArticleCriteria
     */
    public function criteria()
    {
        return new BlogArticleCriteria($this->client);
    }
}