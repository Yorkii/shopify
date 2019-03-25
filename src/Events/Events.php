<?php

namespace Yorkii\Shopify\Events;

use Yorkii\Shopify\Client;
use Yorkii\Shopify\Events\App\AppUninstalledEvent;
use Yorkii\Shopify\Events\Cart\CartCreateEvent;
use Yorkii\Shopify\Events\Cart\CartUpdateEvent;
use Yorkii\Shopify\Events\Cart\CheckoutCreateEvent;
use Yorkii\Shopify\Events\Cart\CheckoutDeleteEvent;
use Yorkii\Shopify\Events\Cart\CheckoutUpdateEvent;
use Yorkii\Shopify\Events\Collection\CollectionCreateEvent;
use Yorkii\Shopify\Events\Collection\CollectionDeleteEvent;
use Yorkii\Shopify\Events\Collection\CollectionUpdateEvent;
use Yorkii\Shopify\Events\CollectionPublication\CollectionPublicationAddEvent;
use Yorkii\Shopify\Events\CollectionPublication\CollectionPublicationDeleteEvent;
use Yorkii\Shopify\Events\CollectionPublication\CollectionPublicationUpdateEvent;
use Yorkii\Shopify\Events\Customer\CustomerCreateEvent;
use Yorkii\Shopify\Events\Customer\CustomerDeleteEvent;
use Yorkii\Shopify\Events\Customer\CustomerDisableEvent;
use Yorkii\Shopify\Events\Customer\CustomerEnableEvent;
use Yorkii\Shopify\Events\Customer\CustomerUpdateEvent;
use Yorkii\Shopify\Events\CustomerSavedSearch\CustomerSavedSearchCreateEvent;
use Yorkii\Shopify\Events\CustomerSavedSearch\CustomerSavedSearchDeleteEvent;
use Yorkii\Shopify\Events\CustomerSavedSearch\CustomerSavedSearchUpdateEvent;
use Yorkii\Shopify\Events\DraftOrder\DraftOrderCreateEvent;
use Yorkii\Shopify\Events\DraftOrder\DraftOrderDeleteEvent;
use Yorkii\Shopify\Events\DraftOrder\DraftOrderUpdateEvent;
use Yorkii\Shopify\Events\Fulfillment\FulfillmentCreateEvent;
use Yorkii\Shopify\Events\Fulfillment\FulfillmentUpdateEvent;
use Yorkii\Shopify\Events\FulfillmentEvent\FulfillmentEventCreateEvent;
use Yorkii\Shopify\Events\FulfillmentEvent\FulfillmentEventDeleteEvent;
use Yorkii\Shopify\Events\InventoryItem\InventoryItemCreateEvent;
use Yorkii\Shopify\Events\InventoryItem\InventoryItemDeleteEvent;
use Yorkii\Shopify\Events\InventoryItem\InventoryItemUpdateEvent;
use Yorkii\Shopify\Events\InventoryItem\InventoryLevelConnectEvent;
use Yorkii\Shopify\Events\InventoryItem\InventoryLevelDisconnectEvent;
use Yorkii\Shopify\Events\InventoryItem\InventoryLevelUpdateEvent;
use Yorkii\Shopify\Events\Location\LocationCreateEvent;
use Yorkii\Shopify\Events\Location\LocationDeleteEvent;
use Yorkii\Shopify\Events\Location\LocationUpdateEvent;
use Yorkii\Shopify\Events\Order\OrderCancelledEvent;
use Yorkii\Shopify\Events\Order\OrderCreateEvent;
use Yorkii\Shopify\Events\Order\OrderDeleteEvent;
use Yorkii\Shopify\Events\Order\OrderFulfilledEvent;
use Yorkii\Shopify\Events\Order\OrderPaidEvent;
use Yorkii\Shopify\Events\Order\OrderPartiallyFulfilledEvent;
use Yorkii\Shopify\Events\Order\OrderUpdateEvent;
use Yorkii\Shopify\Events\OrderTransaction\OrderTransactionCreateEvent;
use Yorkii\Shopify\Events\Product\ProductCreateEvent;
use Yorkii\Shopify\Events\Product\ProductDeleteEvent;
use Yorkii\Shopify\Events\Product\ProductUpdateEvent;
use Yorkii\Shopify\Events\ProductListing\ProductListingAddEvent;
use Yorkii\Shopify\Events\ProductListing\ProductListingRemoveEvent;
use Yorkii\Shopify\Events\ProductListing\ProductListingUpdateEvent;
use Yorkii\Shopify\Events\Refund\RefundCreateEvent;
use Yorkii\Shopify\Events\Shop\ShopUpdateEvent;
use Yorkii\Shopify\Events\Theme\ThemeCreateEvent;
use Yorkii\Shopify\Events\Theme\ThemeDeleteEvent;
use Yorkii\Shopify\Events\Theme\ThemePublishEvent;
use Yorkii\Shopify\Events\Theme\ThemeUpdateEvent;

class Events
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Events constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return Base|null
     */
    public function capture()
    {
        switch ($this->getTopicGroup()) {
            case 'carts':
                return $this->captureCartEvent();
            case 'checkouts':
                return $this->captureCheckoutEvent();
            case 'collections':
                return $this->captureCollectionEvent();
            case 'collection_listings':
                return $this->captureCollectionPublicationEvent();
            case 'customers':
                return $this->captureCustomerEvent();
            case 'customer_groups':
                return $this->captureCustomerSavedSearchEvent();
            case 'draft_orders':
                return $this->captureDraftOrderEvent();
            case 'fulfillments':
                return $this->captureFulfillmentEvent();
            case 'fulfillment_events':
                return $this->captureFulfillmentEventEvent();
            case 'inventory_items':
                return $this->captureInventoryItemEvent();
            case 'inventory_levels':
                return $this->captureInventoryLevelEvent();
            case 'locations':
                return $this->captureLocationEvent();
            case 'orders':
                return $this->captureOrderEvent();
            case 'order_transactions':
                return $this->captureOrderTransactionEvent();
            case 'products':
                return $this->captureProductEvent();
            case 'product_listings':
                return $this->captureProductListingEvent();
            case 'refunds':
                return $this->captureRefundEvent();
            case 'app':
                return $this->captureAppEvent();
            case 'shop':
                return $this->captureShopEvent();
            case 'themes':
                return $this->captureThemeEvent();
            default:
                return null;
        }
    }

    /**
     * @return CartCreateEvent|CartUpdateEvent|null
     */
    protected function captureCartEvent()
    {
        switch ($this->getTopic()) {
            case CartCreateEvent::EVENT_TOPIC:
                return $this->cartCreate()->capture();
            case CartUpdateEvent::EVENT_TOPIC:
                return $this->cartUpdate()->capture();
            default:
                return null;
        }
    }

    /**
     * @return CheckoutCreateEvent|CheckoutDeleteEvent|CheckoutUpdateEvent|null
     */
    protected function captureCheckoutEvent()
    {
        switch ($this->getTopic()) {
            case CheckoutCreateEvent::EVENT_TOPIC:
                return $this->checkoutCreate()->capture();
            case CheckoutUpdateEvent::EVENT_TOPIC:
                return $this->checkoutUpdate()->capture();
            case CheckoutDeleteEvent::EVENT_TOPIC:
                return $this->checkoutDelete()->capture();
            default:
                return null;
        }
    }

    /**
     * @return CollectionCreateEvent|CollectionDeleteEvent|CollectionUpdateEvent|null
     */
    protected function captureCollectionEvent()
    {
        switch ($this->getTopic()) {
            case CollectionCreateEvent::EVENT_TOPIC:
                return $this->collectionCreate()->capture();
            case CollectionUpdateEvent::EVENT_TOPIC:
                return $this->collectionUpdate()->capture();
            case CollectionDeleteEvent::EVENT_TOPIC:
                return $this->collectionDelete()->capture();
            default:
                return null;
        }
    }

    /**
     * @return CollectionPublicationAddEvent|CollectionPublicationDeleteEvent|CollectionPublicationUpdateEvent|null
     */
    protected function captureCollectionPublicationEvent()
    {
        switch ($this->getTopic()) {
            case CollectionPublicationAddEvent::EVENT_TOPIC:
                return $this->collectionPublicationAdd()->capture();
            case CollectionPublicationUpdateEvent::EVENT_TOPIC:
                return $this->collectionPublicationUpdate()->capture();
            case CollectionPublicationDeleteEvent::EVENT_TOPIC:
                return $this->collectionPublicationDelete()->capture();
            default:
                return null;
        }
    }

    /**
     * @return CustomerCreateEvent|CustomerDeleteEvent|CustomerDisableEvent|CustomerEnableEvent|CustomerUpdateEvent|null
     */
    protected function captureCustomerEvent()
    {
        switch ($this->getTopic()) {
            case CustomerCreateEvent::EVENT_TOPIC:
                return $this->customerCreate()->capture();
            case CustomerDeleteEvent::EVENT_TOPIC:
                return $this->customerDelete()->capture();
            case CustomerDisableEvent::EVENT_TOPIC:
                return $this->customerDisable()->capture();
            case CustomerEnableEvent::EVENT_TOPIC:
                return $this->customerEnable()->capture();
            case CustomerUpdateEvent::EVENT_TOPIC:
                return $this->customerUpdate()->capture();
            default:
                return null;
        }
    }

    /**
     * @return CustomerSavedSearchCreateEvent|CustomerSavedSearchDeleteEvent|CustomerSavedSearchUpdateEvent|null
     */
    protected function captureCustomerSavedSearchEvent()
    {
        switch ($this->getTopic()) {
            case CustomerSavedSearchCreateEvent::EVENT_TOPIC:
                return $this->customerSavedSearchCreate()->capture();
            case CustomerSavedSearchUpdateEvent::EVENT_TOPIC:
                return $this->customerSavedSearchUpdate()->capture();
            case CustomerSavedSearchDeleteEvent::EVENT_TOPIC:
                return $this->customerSavedSearchDelete()->capture();
            default:
                return null;
        }
    }

    /**
     * @return DraftOrderCreateEvent|DraftOrderDeleteEvent|DraftOrderUpdateEvent|null
     */
    protected function captureDraftOrderEvent()
    {
        switch ($this->getTopic()) {
            case DraftOrderCreateEvent::EVENT_TOPIC:
                return $this->draftOrderCreate()->capture();
            case DraftOrderUpdateEvent::EVENT_TOPIC:
                return $this->draftOrderUpdate()->capture();
            case DraftOrderDeleteEvent::EVENT_TOPIC:
                return $this->draftOrderDelete()->capture();
            default:
                return null;
        }
    }

    /**
     * @return FulfillmentCreateEvent|FulfillmentUpdateEvent|null
     */
    protected function captureFulfillmentEvent()
    {
        switch ($this->getTopic()) {
            case FulfillmentCreateEvent::EVENT_TOPIC:
                return $this->fulfillmentCreate()->capture();
            case FulfillmentUpdateEvent::EVENT_TOPIC:
                return $this->fulfillmentUpdate()->capture();
            default:
                return null;
        }
    }

    /**
     * @return FulfillmentEventCreateEvent|FulfillmentEventDeleteEvent|null
     */
    protected function captureFulfillmentEventEvent()
    {
        switch ($this->getTopic()) {
            case FulfillmentEventCreateEvent::EVENT_TOPIC:
                return $this->fulfillmentEventCreate()->capture();
            case FulfillmentEventDeleteEvent::EVENT_TOPIC:
                return $this->fulfillmentEventDelete()->capture();
            default:
                return null;
        }
    }

    /**
     * @return InventoryItemCreateEvent|InventoryItemDeleteEvent|InventoryItemUpdateEvent|null
     */
    protected function captureInventoryItemEvent()
    {
        switch ($this->getTopic()) {
            case InventoryItemCreateEvent::EVENT_TOPIC:
                return $this->inventoryItemCreate()->capture();
            case InventoryItemUpdateEvent::EVENT_TOPIC:
                return $this->inventoryItemUpdate()->capture();
            case InventoryItemDeleteEvent::EVENT_TOPIC:
                return $this->inventoryItemDelete()->capture();
            default:
                return null;
        }
    }

    /**
     * @return InventoryLevelConnectEvent|InventoryLevelDisconnectEvent|InventoryLevelUpdateEvent|null
     */
    protected function captureInventoryLevelEvent()
    {
        switch ($this->getTopic()) {
            case InventoryLevelConnectEvent::EVENT_TOPIC:
                return $this->inventoryLevelConnect()->capture();
            case InventoryLevelDisconnectEvent::EVENT_TOPIC:
                return $this->inventoryLevelDisconnect()->capture();
            case InventoryLevelUpdateEvent::EVENT_TOPIC:
                return $this->inventoryLevelUpdate()->capture();
            default:
                return null;
        }
    }

    /**
     * @return LocationCreateEvent|LocationDeleteEvent|LocationUpdateEvent|null
     */
    protected function captureLocationEvent()
    {
        switch ($this->getTopic()) {
            case LocationCreateEvent::EVENT_TOPIC:
                return $this->locationCreate()->capture();
            case LocationUpdateEvent::EVENT_TOPIC:
                return $this->locationUpdate()->capture();
            case LocationDeleteEvent::EVENT_TOPIC:
                return $this->locationDelete()->capture();
            default:
                return null;
        }
    }

    /**
     * @return OrderCancelledEvent|OrderCreateEvent|OrderDeleteEvent|OrderFulfilledEvent|OrderPaidEvent|OrderPartiallyFulfilledEvent|OrderUpdateEvent|null
     */
    protected function captureOrderEvent()
    {
        switch ($this->getTopic()) {
            case OrderCreateEvent::EVENT_TOPIC:
                return $this->orderCreate()->capture();
            case OrderUpdateEvent::EVENT_TOPIC:
                return $this->orderUpdate()->capture();
            case OrderCancelledEvent::EVENT_TOPIC:
                return $this->orderCancelled()->capture();
            case OrderDeleteEvent::EVENT_TOPIC:
                return $this->orderDelete()->capture();
            case OrderFulfilledEvent::EVENT_TOPIC:
                return $this->orderFulfilled()->capture();
            case OrderPartiallyFulfilledEvent::EVENT_TOPIC:
                return $this->orderPartiallyFulfilled()->capture();
            case OrderPaidEvent::EVENT_TOPIC:
                return $this->orderPaid()->capture();
            default:
                return null;
        }
    }

    /**
     * @return OrderTransactionCreateEvent|null
     */
    protected function captureOrderTransactionEvent()
    {
        switch ($this->getTopic()) {
            case OrderTransactionCreateEvent::EVENT_TOPIC:
                return $this->orderTransactionCreate()->capture();
            default:
                return null;
        }
    }

    /**
     * @return ProductCreateEvent|ProductDeleteEvent|ProductUpdateEvent|null
     */
    protected function captureProductEvent()
    {
        switch ($this->getTopic()) {
            case ProductCreateEvent::EVENT_TOPIC:
                return $this->productCreate()->capture();
            case ProductUpdateEvent::EVENT_TOPIC:
                return $this->productUpdate()->capture();
            case ProductDeleteEvent::EVENT_TOPIC:
                return $this->productDelete()->capture();
            default:
                return null;
        }
    }

    /**
     * @return ProductListingAddEvent|ProductListingRemoveEvent|ProductListingUpdateEvent|null
     */
    protected function captureProductListingEvent()
    {
        switch ($this->getTopic()) {
            case ProductListingAddEvent::EVENT_TOPIC:
                return $this->productListingAdd()->capture();
            case ProductListingUpdateEvent::EVENT_TOPIC:
                return $this->productListingUpdate()->capture();
            case ProductListingRemoveEvent::EVENT_TOPIC:
                return $this->productListingRemove()->capture();
            default:
                return null;
        }
    }

    /**
     * @return RefundCreateEvent|null
     */
    protected function captureRefundEvent()
    {
        switch ($this->getTopic()) {
            case RefundCreateEvent::EVENT_TOPIC:
                return $this->refundCreate()->capture();
            default:
                return null;
        }
    }

    /**
     * @return AppUninstalledEvent|null
     */
    protected function captureAppEvent()
    {
        switch ($this->getTopic()) {
            case AppUninstalledEvent::EVENT_TOPIC:
                return $this->appUninstalled()->capture();
            default:
                return null;
        }
    }

    /**
     * @return ShopUpdateEvent|null
     */
    protected function captureShopEvent()
    {
        switch ($this->getTopic()) {
            case ShopUpdateEvent::EVENT_TOPIC:
                return $this->shopUpdate()->capture();
            default:
                return null;
        }
    }

    /**
     * @return ThemeCreateEvent|ThemeDeleteEvent|ThemePublishEvent|ThemeUpdateEvent|null
     */
    protected function captureThemeEvent()
    {
        switch ($this->getTopic()) {
            case ThemeCreateEvent::EVENT_TOPIC:
                return $this->themeCreate()->capture();
            case ThemeUpdateEvent::EVENT_TOPIC:
                return $this->themeUpdate()->capture();
            case ThemeDeleteEvent::EVENT_TOPIC:
                return $this->themeDelete()->capture();
            case ThemePublishEvent::EVENT_TOPIC:
                return $this->themePublish()->capture();
            default:
                return null;
        }
    }

    /**
     * @return string
     */
    protected function getSecretKey()
    {
        return $this->client->getSecretKey();
    }

    /**
     * @return bool
     */
    public function isValidRequest()
    {
        if (!$this->getHeader('X-Shopify-Hmac-Sha256')) {
            return false;
        }

        if (!isset($_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256'])) {
            return false;
        }

        $hash = $this->getHeader('X-Shopify-Hmac-Sha256');
        $data = file_get_contents('php://input');

        $calculatedHash = base64_encode(hash_hmac('sha256', $data, $this->getSecretKey(), true));

        return hash_equals($hash, $calculatedHash);
    }

    /**
     * @param string $name
     *
     * @return string
     */
    public function getHeader($name)
    {
        foreach($_SERVER as $key => $value) {
            if (substr($key, 0, 5) !== 'HTTP_') {
                continue;
            }

            $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));

            if (strtolower($header) === strtolower($name)) {
                return $value;
            }
        }

        return null;
    }

    /**
     * @return string
     */
    public function getTopic()
    {
        return $this->getHeader('X-Shopify-Topic');
    }

    /**
     * @return string
     */
    public function getTopicGroup()
    {
        if (!$this->getTopic()) {
            return null;
        }

        return explode('/', $this->getTopic())[0];
    }

    /**
     * @return null
     */
    public function getTopicAction()
    {
        if (!$this->getTopic()) {
            return null;
        }

        $exploded = explode('/', $this->getTopic());

        return isset($exploded[1])
            ? $exploded[1]
            : null;
    }

    /**
     * @return string
     */
    public function getShopDomain()
    {
        return $this->getHeader('X-Shopify-Shop-Domain');
    }

    /**
     * @return CartCreateEvent
     */
    public function cartCreate()
    {
        return new CartCreateEvent($this->client);
    }

    /**
     * @return CartUpdateEvent
     */
    public function cartUpdate()
    {
        return new CartUpdateEvent($this->client);
    }

    /**
     * @return CheckoutCreateEvent
     */
    public function checkoutCreate()
    {
        return new CheckoutCreateEvent($this->client);
    }

    /**
     * @return CheckoutUpdateEvent
     */
    public function checkoutUpdate()
    {
        return new CheckoutUpdateEvent($this->client);
    }

    /**
     * @return CheckoutDeleteEvent
     */
    public function checkoutDelete()
    {
        return new CheckoutDeleteEvent($this->client);
    }

    /**
     * @return CollectionCreateEvent
     */
    public function collectionCreate()
    {
        return new CollectionCreateEvent($this->client);
    }

    /**
     * @return CollectionUpdateEvent
     */
    public function collectionUpdate()
    {
        return new CollectionUpdateEvent($this->client);
    }

    /**
     * @return CollectionDeleteEvent
     */
    public function collectionDelete()
    {
        return new CollectionDeleteEvent($this->client);
    }

    /**
     * @return CollectionPublicationAddEvent
     */
    public function collectionPublicationAdd()
    {
        return new CollectionPublicationAddEvent($this->client);
    }

    /**
     * @return CollectionPublicationUpdateEvent
     */
    public function collectionPublicationUpdate()
    {
        return new CollectionPublicationUpdateEvent($this->client);
    }

    /**
     * @return CollectionPublicationDeleteEvent
     */
    public function collectionPublicationDelete()
    {
        return new CollectionPublicationDeleteEvent($this->client);
    }

    /**
     * @return CustomerCreateEvent
     */
    public function customerCreate()
    {
        return new CustomerCreateEvent($this->client);
    }

    /**
     * @return CustomerDeleteEvent
     */
    public function customerDelete()
    {
        return new CustomerDeleteEvent($this->client);
    }

    /**
     * @return CustomerUpdateEvent
     */
    public function customerUpdate()
    {
        return new CustomerUpdateEvent($this->client);
    }

    /**
     * @return CustomerDisableEvent
     */
    public function customerDisable()
    {
        return new CustomerDisableEvent($this->client);
    }

    /**
     * @return CustomerEnableEvent
     */
    public function customerEnable()
    {
        return new CustomerEnableEvent($this->client);
    }

    /**
     * @return CustomerSavedSearchCreateEvent
     */
    public function customerSavedSearchCreate()
    {
        return new CustomerSavedSearchCreateEvent($this->client);
    }

    /**
     * @return CustomerSavedSearchUpdateEvent
     */
    public function customerSavedSearchUpdate()
    {
        return new CustomerSavedSearchUpdateEvent($this->client);
    }

    /**
     * @return CustomerSavedSearchDeleteEvent
     */
    public function customerSavedSearchDelete()
    {
        return new CustomerSavedSearchDeleteEvent($this->client);
    }

    /**
     * @return DraftOrderCreateEvent
     */
    public function draftOrderCreate()
    {
        return new DraftOrderCreateEvent($this->client);
    }

    /**
     * @return DraftOrderUpdateEvent
     */
    public function draftOrderUpdate()
    {
        return new DraftOrderUpdateEvent($this->client);
    }

    /**
     * @return DraftOrderDeleteEvent
     */
    public function draftOrderDelete()
    {
        return new DraftOrderDeleteEvent($this->client);
    }

    /**
     * @return FulfillmentCreateEvent
     */
    public function fulfillmentCreate()
    {
        return new FulfillmentCreateEvent($this->client);
    }

    /**
     * @return FulfillmentUpdateEvent
     */
    public function fulfillmentUpdate()
    {
        return new FulfillmentUpdateEvent($this->client);
    }

    /**
     * @return FulfillmentEventCreateEvent
     */
    public function fulfillmentEventCreate()
    {
        return new FulfillmentEventCreateEvent($this->client);
    }

    /**
     * @return FulfillmentEventDeleteEvent
     */
    public function fulfillmentEventDelete()
    {
        return new FulfillmentEventDeleteEvent($this->client);
    }

    /**
     * @return InventoryItemCreateEvent
     */
    public function inventoryItemCreate()
    {
        return new InventoryItemCreateEvent($this->client);
    }

    /**
     * @return InventoryItemUpdateEvent
     */
    public function inventoryItemUpdate()
    {
        return new InventoryItemUpdateEvent($this->client);
    }

    /**
     * @return InventoryItemDeleteEvent
     */
    public function inventoryItemDelete()
    {
        return new InventoryItemDeleteEvent($this->client);
    }

    /**
     * @return InventoryLevelConnectEvent
     */
    public function inventoryLevelConnect()
    {
        return new InventoryLevelConnectEvent($this->client);
    }

    /**
     * @return InventoryLevelDisconnectEvent
     */
    public function inventoryLevelDisconnect()
    {
        return new InventoryLevelDisconnectEvent($this->client);
    }

    /**
     * @return InventoryLevelUpdateEvent
     */
    public function inventoryLevelUpdate()
    {
        return new InventoryLevelUpdateEvent($this->client);
    }

    /**
     * @return LocationCreateEvent
     */
    public function locationCreate()
    {
        return new LocationCreateEvent($this->client);
    }

    /**
     * @return LocationDeleteEvent
     */
    public function locationDelete()
    {
        return new LocationDeleteEvent($this->client);
    }

    /**
     * @return LocationUpdateEvent
     */
    public function locationUpdate()
    {
        return new LocationUpdateEvent($this->client);
    }

    /**
     * @return OrderCreateEvent
     */
    public function orderCreate()
    {
        return new OrderCreateEvent($this->client);
    }

    /**
     * @return OrderUpdateEvent
     */
    public function orderUpdate()
    {
        return new OrderUpdateEvent($this->client);
    }

    /**
     * @return OrderCancelledEvent
     */
    public function orderCancelled()
    {
        return new OrderCancelledEvent($this->client);
    }

    /**
     * @return OrderDeleteEvent
     */
    public function orderDelete()
    {
        return new OrderDeleteEvent($this->client);
    }

    /**
     * @return OrderFulfilledEvent
     */
    public function orderFulfilled()
    {
        return new OrderFulfilledEvent($this->client);
    }

    /**
     * @return OrderPaidEvent
     */
    public function orderPaid()
    {
        return new OrderPaidEvent($this->client);
    }

    /**
     * @return OrderPartiallyFulfilledEvent
     */
    public function orderPartiallyFulfilled()
    {
        return new OrderPartiallyFulfilledEvent($this->client);
    }

    /**
     * @return OrderTransactionCreateEvent
     */
    public function orderTransactionCreate()
    {
        return new OrderTransactionCreateEvent($this->client);
    }

    /**
     * @return ProductCreateEvent
     */
    public function productCreate()
    {
        return new ProductCreateEvent($this->client);
    }

    /**
     * @return ProductUpdateEvent
     */
    public function productUpdate()
    {
        return new ProductUpdateEvent($this->client);
    }

    /**
     * @return ProductDeleteEvent
     */
    public function productDelete()
    {
        return new ProductDeleteEvent($this->client);
    }

    /**
     * @return ProductListingAddEvent
     */
    public function productListingAdd()
    {
        return new ProductListingAddEvent($this->client);
    }

    /**
     * @return ProductListingRemoveEvent
     */
    public function productListingRemove()
    {
        return new ProductListingRemoveEvent($this->client);
    }

    /**
     * @return ProductListingUpdateEvent
     */
    public function productListingUpdate()
    {
        return new ProductListingUpdateEvent($this->client);
    }

    /**
     * @return RefundCreateEvent
     */
    public function refundCreate()
    {
        return new RefundCreateEvent($this->client);
    }

    /**
     * @return ShopUpdateEvent
     */
    public function shopUpdate()
    {
        return new ShopUpdateEvent($this->client);
    }

    /**
     * @return AppUninstalledEvent
     */
    public function appUninstalled()
    {
        return new AppUninstalledEvent($this->client);
    }

    /**
     * @return ThemeCreateEvent
     */
    public function themeCreate()
    {
        return new ThemeCreateEvent($this->client);
    }

    /**
     * @return ThemeUpdateEvent
     */
    public function themeUpdate()
    {
        return new ThemeUpdateEvent($this->client);
    }

    /**
     * @return ThemeDeleteEvent
     */
    public function themeDelete()
    {
        return new ThemeDeleteEvent($this->client);
    }

    /**
     * @return ThemePublishEvent
     */
    public function themePublish()
    {
        return new ThemePublishEvent($this->client);
    }
}