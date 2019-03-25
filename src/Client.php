<?php

namespace Yorkii\Shopify;

use Yorkii\Shopify\Events\Events;
use Yorkii\Shopify\Properties\Inventory\InventoryLevel;
use Yorkii\Shopify\Properties\Orders\DiscountCode;
use Yorkii\Shopify\Resources\Access\AccessScope;
use Yorkii\Shopify\Resources\Access\StorefrontAccessToken;
use Yorkii\Shopify\Resources\Analytics\Report;
use Yorkii\Shopify\Resources\Billing\ApplicationCharge;
use Yorkii\Shopify\Resources\Billing\ApplicationCredit;
use Yorkii\Shopify\Resources\Billing\RecurringApplicationCharge;
use Yorkii\Shopify\Resources\Billing\UsageCharge;
use Yorkii\Shopify\Resources\Customers\Customer;
use Yorkii\Shopify\Resources\Customers\CustomerAddress;
use Yorkii\Shopify\Resources\Customers\CustomerSavedSearch;
use Yorkii\Shopify\Resources\Discounts\Batch;
use Yorkii\Shopify\Resources\Discounts\PriceRule;
use Yorkii\Shopify\Resources\Events\Event;
use Yorkii\Shopify\Resources\Events\Webhook;
use Yorkii\Shopify\Resources\Inventory\InventoryItem;
use Yorkii\Shopify\Resources\Inventory\Location;
use Yorkii\Shopify\Resources\MarketingEvent\MarketingEvent;
use Yorkii\Shopify\Resources\Metafield\Metafield;
use Yorkii\Shopify\Resources\OnlineStore\Asset;
use Yorkii\Shopify\Resources\OnlineStore\Blog;
use Yorkii\Shopify\Resources\OnlineStore\BlogArticle;
use Yorkii\Shopify\Resources\OnlineStore\Comment;
use Yorkii\Shopify\Resources\OnlineStore\Page;
use Yorkii\Shopify\Resources\OnlineStore\Redirect;
use Yorkii\Shopify\Resources\OnlineStore\ScriptTag;
use Yorkii\Shopify\Resources\OnlineStore\Theme;
use Yorkii\Shopify\Resources\Orders\AbandonedCheckouts;
use Yorkii\Shopify\Resources\Orders\DraftOrder;
use Yorkii\Shopify\Resources\Orders\Order;
use Yorkii\Shopify\Resources\Orders\OrderRisk;
use Yorkii\Shopify\Resources\Orders\Refund;
use Yorkii\Shopify\Resources\Orders\Transaction;
use Yorkii\Shopify\Resources\Plus\GiftCard;
use Yorkii\Shopify\Resources\Plus\User;
use Yorkii\Shopify\Resources\Products\Collect;
use Yorkii\Shopify\Resources\Products\CustomCollection;
use Yorkii\Shopify\Resources\Products\Product;
use Yorkii\Shopify\Resources\Products\ProductImage;
use Yorkii\Shopify\Resources\Products\ProductVariant;
use Yorkii\Shopify\Resources\Products\SmartCollection;
use Yorkii\Shopify\Resources\SalesChannels\Checkout;
use Yorkii\Shopify\Resources\SalesChannels\CollectionListing;
use Yorkii\Shopify\Resources\SalesChannels\Payment;
use Yorkii\Shopify\Resources\SalesChannels\ProductListing;
use Yorkii\Shopify\Resources\SalesChannels\ResourceFeedback;
use Yorkii\Shopify\Resources\Shipping\CarrierService;
use Yorkii\Shopify\Resources\Shipping\Fulfillment;
use Yorkii\Shopify\Resources\Shipping\FulfillmentEvent;
use Yorkii\Shopify\Resources\Shipping\FulfillmentService;
use Yorkii\Shopify\Resources\StoreProperties\Country;
use Yorkii\Shopify\Resources\StoreProperties\Policy;
use Yorkii\Shopify\Resources\StoreProperties\Province;
use Yorkii\Shopify\Resources\StoreProperties\ShippingZone;
use Yorkii\Shopify\Resources\StoreProperties\Shop;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;

class Client
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $shopUrl;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $apiPassword;

    /**
     * @var Response
     */
    protected $lastResponse;

    /**
     * Client constructor.
     *
     * @param array $config
     * @param array $httpOptions
     */
    public function __construct(array $config, array $httpOptions = [])
    {
        $this->shopUrl = $config['shop_url'];
        $this->apiKey = $config['api_key'];
        $this->apiPassword = $config['api_password'];
        $this->httpClient = new \GuzzleHttp\Client($httpOptions);
    }

    /**
     * @return \GuzzleHttp\Client
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @return Response
     */
    public function getLastResponse()
    {
        return $this->lastResponse;
    }

    /**
     * @return string
     */
    public function getSecretKey()
    {
        return $this->apiPassword;
    }

    /**
     * @return Product
     */
    public function product()
    {
        return new Product($this);
    }

    /**
     * @return ProductImage
     */
    public function productImage()
    {
        return new ProductImage($this);
    }

    /**
     * @return ProductVariant
     */
    public function productVariant()
    {
        return new ProductVariant($this);
    }

    /**
     * @return Collect
     */
    public function collect()
    {
        return new Collect($this);
    }

    /**
     * @return CustomCollection
     */
    public function customCollection()
    {
        return new CustomCollection($this);
    }

    /**
     * @return SmartCollection
     */
    public function smartCollection()
    {
        return new SmartCollection($this);
    }

    /**
     * @return AccessScope
     */
    public function accessScope()
    {
        return new AccessScope($this);
    }

    /**
     * @return StorefrontAccessToken
     */
    public function storefrontAccessToken()
    {
        return new StorefrontAccessToken($this);
    }

    /**
     * @return Report
     */
    public function report()
    {
        return new Report($this);
    }

    /**
     * @return ApplicationCharge
     */
    public function applicationCharge()
    {
        return new ApplicationCharge($this);
    }

    /**
     * @return ApplicationCredit
     */
    public function applicationCredit()
    {
        return new ApplicationCredit($this);
    }

    /**
     * @return RecurringApplicationCharge
     */
    public function recurringApplicationCharge()
    {
        return new RecurringApplicationCharge($this);
    }

    /**
     * @return UsageCharge
     */
    public function usageCharge()
    {
        return new UsageCharge($this);
    }

    /**
     * @return Customer
     */
    public function customer()
    {
        return new Customer($this);
    }

    /**
     * @return CustomerAddress
     */
    public function customerAddress()
    {
        return new CustomerAddress($this);
    }

    /**
     * @return CustomerSavedSearch
     */
    public function customSavedSearch()
    {
        return new CustomerSavedSearch($this);
    }

    /**
     * @return DiscountCode
     */
    public function discountCode()
    {
        return new DiscountCode($this);
    }

    /**
     * @return Batch
     */
    public function batch()
    {
        return new Batch($this);
    }

    /**
     * @return PriceRule
     */
    public function priceRule()
    {
        return new PriceRule($this);
    }

    /**
     * @return Event
     */
    public function event()
    {
        return new Event($this);
    }

    /**
     * @return Webhook
     */
    public function webhook()
    {
        return new Webhook($this);
    }

    /**
     * @return InventoryItem
     */
    public function inventoryItem()
    {
        return new InventoryItem($this);
    }

    /**
     * @return InventoryLevel
     */
    public function inventoryLevel()
    {
        return new InventoryLevel($this);
    }

    /**
     * @return Location
     */
    public function location()
    {
        return new Location($this);
    }

    /**
     * @return MarketingEvent
     */
    public function marketingEvent()
    {
        return new MarketingEvent($this);
    }

    /**
     * @return Metafield
     */
    public function metafield()
    {
        return new Metafield($this);
    }

    /**
     * @return Asset
     */
    public function asset()
    {
        return new Asset($this);
    }

    /**
     * @return Blog
     */
    public function blog()
    {
        return new Blog($this);
    }

    /**
     * @return BlogArticle
     */
    public function blogArticle()
    {
        return new BlogArticle($this);
    }

    /**
     * @return Comment
     */
    public function comment()
    {
        return new Comment($this);
    }

    /**
     * @return Page
     */
    public function page()
    {
        return new Page($this);
    }

    /**
     * @return Redirect
     */
    public function redirect()
    {
        return new Redirect($this);
    }

    /**
     * @return ScriptTag
     */
    public function scriptTag()
    {
        return new ScriptTag($this);
    }

    /**
     * @return Theme
     */
    public function theme()
    {
        return new Theme($this);
    }

    /**
     * @return AbandonedCheckouts
     */
    public function abandonedCheckouts()
    {
        return new AbandonedCheckouts($this);
    }

    /**
     * @return DraftOrder
     */
    public function draftOrder()
    {
        return new DraftOrder($this);
    }

    /**
     * @return Order
     */
    public function order()
    {
        return new Order($this);
    }

    /**
     * @return OrderRisk
     */
    public function orderRisk()
    {
        return new OrderRisk($this);
    }

    /**
     * @return Refund
     */
    public function refund()
    {
        return new Refund($this);
    }

    /**
     * @return Transaction
     */
    public function transaction()
    {
        return new Transaction($this);
    }

    /**
     * @return GiftCard
     */
    public function giftCard()
    {
        return new GiftCard($this);
    }

    /**
     * @return User
     */
    public function user()
    {
        return new User($this);
    }

    /**
     * @return Checkout
     */
    public function checkout()
    {
        return new Checkout($this);
    }

    /**
     * @return CollectionListing
     */
    public function collectionListing()
    {
        return new CollectionListing($this);
    }

    /**
     * @return Payment
     */
    public function payment()
    {
        return new Payment($this);
    }

    /**
     * @return ProductListing
     */
    public function productListing()
    {
        return new ProductListing($this);
    }

    /**
     * @return ResourceFeedback
     */
    public function resourceFeedback()
    {
        return new ResourceFeedback($this);
    }

    /**
     * @return CarrierService
     */
    public function carrierService()
    {
        return new CarrierService($this);
    }

    /**
     * @return Fulfillment
     */
    public function fulfillment()
    {
        return new Fulfillment($this);
    }

    /**
     * @return FulfillmentEvent
     */
    public function fulfillmentEvent()
    {
        return new FulfillmentEvent($this);
    }

    /**
     * @return FulfillmentService
     */
    public function fulfillmentService()
    {
        return new FulfillmentService($this);
    }

    /**
     * @return Country
     */
    public function country()
    {
        return new Country($this);
    }

    /**
     * @return Policy
     */
    public function policy()
    {
        return new Policy($this);
    }

    /**
     * @return Province
     */
    public function province()
    {
        return new Province($this);
    }

    /**
     * @return ShippingZone
     */
    public function shippingZone()
    {
        return new ShippingZone($this);
    }

    /**
     * @return Shop
     */
    public function shop()
    {
        return new Shop($this);
    }

    /**
     * @return Events
     */
    public function events()
    {
        return new Events($this);
    }

    /**
     * @param string $endpoint
     *
     * @return string
     */
    protected function getFullUrlToEndpoint($endpoint)
    {
        if (strpos($endpoint, 'http') === 0) {
            return $endpoint;
        }

        return 'https://' . preg_replace('/\/+/', '/', $this->shopUrl . '/' . $endpoint);
    }

    /**
     * @return array
     */
    protected function getHeaders()
    {
        return [
            'Authorization' => 'Basic ' . base64_encode($this->apiKey . ':' . $this->apiPassword),
        ];
    }

    /**
     * @param string $endpoint
     * @param array $params
     * @param array $options
     *
     * @throws ConnectException
     * @throws RequestException
     *
     * @return Response
     */
    public function performGetRequest($endpoint, array $params = [], array $options = [])
    {
        return $this->lastResponse = new Response(
            $this->httpClient->get(
                $this->getFullUrlToEndpoint($endpoint), array_merge(
                    $options,
                    [
                        'headers' => $this->getHeaders(),
                        'query' => $params,
                    ]
                )
            )
        );
    }

    /**
     * @param string $endpoint
     * @param array $params
     * @param array $options
     *
     * @throws ConnectException
     * @throws RequestException
     *
     * @return Response
     */
    public function performPostRequest($endpoint, array $params = [], $options = [])
    {
        return $this->lastResponse = new Response(
            $this->httpClient->post(
                $this->getFullUrlToEndpoint($endpoint), array_merge(
                    $options,
                    [
                        'headers' => $this->getHeaders(),
                        'json' => $params,
                    ]
                )
            )
        );
    }

    /**
     * @param string $endpoint
     * @param array $params
     * @param array $options
     *
     * @throws ConnectException
     * @throws RequestException
     *
     * @return Response
     */
    public function performPutRequest($endpoint, array $params = [], $options = [])
    {
        return $this->lastResponse = new Response(
            $this->httpClient->put(
                $this->getFullUrlToEndpoint($endpoint), array_merge(
                    $options,
                    [
                        'headers' => $this->getHeaders(),
                        'query' => $params,
                    ]
                )
            )
        );
    }

    /**
     * @param string $endpoint
     * @param array $params
     * @param array $options
     *
     * @throws ConnectException
     * @throws RequestException
     *
     * @return Response
     */
    public function performDeleteRequest($endpoint, array $params = [], $options = [])
    {
        return $this->lastResponse = new Response(
            $this->httpClient->delete(
                $this->getFullUrlToEndpoint($endpoint), array_merge(
                    $options,
                    [
                        'headers' => $this->getHeaders(),
                        'json' => $params,
                    ]
                )
            )
        );
    }
}