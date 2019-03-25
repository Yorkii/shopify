<?php

namespace Yorkii\Shopify\Resources\OnlineStore;

use Yorkii\Shopify\Resources\Base;
use Yorkii\Shopify\Resources\Traits\Deletes;
use Yorkii\Shopify\Resources\Traits\Depends;
use Yorkii\Shopify\Resources\Traits\GetsAll;
use Yorkii\Shopify\Resources\Traits\GetsSingle;
use Yorkii\Shopify\Resources\Traits\Saves;
use Yorkii\Shopify\Resources\Traits\Updates;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property int $theme_id
 * @property int $size
 * @property string $attachment
 * @property string $content_type
 * @property string $key
 * @property string $public_url
 * @property string $value
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method int getThemeId()
 * @method int getSize()
 * @method string getAttachment()
 * @method string getContentType()
 * @method string getKey()
 * @method string getPublicUrl()
 * @method string getValue()
 * 
 * @method $this setThemeId($value)
 * @method $this setSize($value)
 * @method $this setAttachment($value)
 * @method $this setContentType($value)
 * @method $this setKey($value)
 * @method $this setPublicUrl($value)
 * @method $this setValue($value)
 */
class Asset extends Base
{
    use GetsAll,
        GetsSingle,
        Updates,
        Deletes,
        Saves,
        Depends;

    /**
     * @var string
     */
    protected $resourceName = 'asset';

    /**
     * @var string
     */
    protected $endpoint = 'admin/themes/:theme_id/assets';

    /**
     * @var array
     */
    protected $depends = [
        'theme_id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'size' => 'int',
    ];

    /**
     * @param array $data
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function create(array $data)
    {
        $response = $this->client->performPutRequest(
            $this->getFilledSingleEndpoint(),
            [
                $this->getSingleKey() => $data,
            ]
        );

        if ($response->getStatusCode() !== 201) {
            return false;
        }

        $responseData = $response->toArray();

        $this->changedData = [];
        $this->data = $data;
        $this->data['id'] = $responseData[$this->getSingleKey()]['id'];

        return true;
    }

    /**
     * @param array $data
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function update(array $data)
    {
        return $this->create($data);
    }
}