<?php

namespace Yorkii\Shopify\Resources\OnlineStore;

use Yorkii\Shopify\Resources\BaseResource;
use Yorkii\Shopify\Resources\Traits\Provides;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property int $id
 * @property int $theme_store_id
 * @property string $name
 * @property string $role
 * @property bool $previewable
 * @property bool $processing
 *
 * @method C getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method int getId()
 * @method int getThemeStoreId()
 * @method string getName()
 * @method string getRole()
 * @method bool getPreviewable()
 * @method bool getProcessing()
 * 
 * @method $this setId($value)
 * @method $this setThemeStoreId($value)
 * @method $this setName($value)
 * @method $this setRole($value)
 * @method $this setPreviewable($value)
 * @method $this setProcessing($value)
 */
class Theme extends BaseResource
{
    use Provides;

    /**
     * @var string
     */
    protected $resourceName = 'theme';

    /**
     * @var array
     */
    protected $provides = [
        'theme_id' => 'id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'previewable' => 'bool',
        'processing' => 'bool',
    ];
}