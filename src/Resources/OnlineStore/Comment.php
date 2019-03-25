<?php

namespace Yorki\Shopify\Resources\OnlineStore;

use Yorki\Shopify\Criteria\OnlineStore\CommentCriteria;
use Yorki\Shopify\Resources\BaseResource;
use Yorki\Shopify\Resources\Traits\Counts;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $published_at
 *
 * @property int $id
 * @property int $article_id
 * @property string $author
 * @property string $body
 * @property string $body_html
 * @property string $email
 * @property string $ip
 * @property string $status
 * @property string $user_agent
 * 
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Carbon getPublishedAt()
 * @method int getId()
 * @method int getArticleId()
 * @method string getAuthor()
 * @method string getBody()
 * @method string getBodyHtml()
 * @method string getEmail()
 * @method string getIp()
 * @method string getStatus()
 * @method string getUserAgent()
 * 
 * @method $this setId($value)
 * @method $this setArticleId($value)
 * @method $this setAuthor($value)
 * @method $this setBody($value)
 * @method $this setBodyHtml($value)
 * @method $this setEmail($value)
 * @method $this setIp($value)
 * @method $this setStatus($value)
 * @method $this setUserAgent($value)
 */
class Comment extends BaseResource
{
    use Counts;

    /**
     * @var string
     */
    protected $resourceName = 'comment';

    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function spam($id = null)
    {
        return $this->singlePostWithSuccess($id, 'spam');
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function notSpam($id = null)
    {
        return $this->singlePostWithSuccess($id, 'not_spam');
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function approve($id = null)
    {
        return $this->singlePostWithSuccess($id, 'approve');
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function remove($id = null)
    {
        return $this->singlePostWithSuccess($id, 'remove');
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function restore($id = null)
    {
        return $this->singlePostWithSuccess($id, 'restore');
    }

    /**
     * @return CommentCriteria
     */
    public function criteria()
    {
        return new CommentCriteria($this->client);
    }
}