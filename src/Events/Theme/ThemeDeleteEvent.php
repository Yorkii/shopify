<?php

namespace Yorkii\Shopify\Events\Theme;

use Yorkii\Shopify\Events\Base;
use \Carbon\Carbon;

/**
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $id
 * @property string $name
 * @property string $role
 * @property int $theme_store_id
 * @property bool $previewable
 * @property bool $processing
 * 
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method int getId()
 * @method string getName()
 * @method string getRole()
 * @method int getThemeStoreId()
 * @method bool getPreviewable()
 * @method bool getProcessing()
 */
class ThemeDeleteEvent extends Base
{
    const EVENT_TOPIC = 'themes/delete';

    /**
     * @var array
     */
    protected $casts = [
        'previewable' => 'bool',
        'processing' => 'bool',
    ];
}