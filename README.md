# Shopify REST API Client for PHP

```php
$client = new Client([
    'shop_url' => 'myshop.myshopify.com',
    'api_key' => 'shopify-api-key',
    'api_password' => 'shopify-api-password',
]);
```

```php
// Get customer by ID
$customer = $client->customer()
    ->get(152990151821);
    
// One way of accessing customer data is by properties
if ($customer->accepts_marketing) {
    //do your stuff
}

// You can also use getters
$customer->getOrdersCount();

// Dates are casted to Carbon objects
$customer->getCreatedAt()->format('d.m.Y');

// You can chain to call api for customer orders
// This method does return Collection which you can iterate
foreach ($customer->orders() as $order) {
    $order->getTotalPrice();
}

// You can trigger specific actions for resource
// This method does call api for activation url for customer
$link = $customer->accountActivationUrl();

// Get Product
$product = $client->product()->get(217318923993);

// Some resources have dependencies, like product variants belongs to product
foreach ($product->getVariants() as $variant) {
    $variant->getPrice();
}

// You can also get all variants this way
$variants = $client->productVariant()->of($product)->all();

// Or even this way
$variants = $client->productVariant()->using(['product_id' => 217318923993])->all();

// You add listing criteria on resources
$criteria = $client->product()->criteria();
$criteria->whereTitle('T-Shirt')
    ->whereCreatedAtMin(Carbon::today()->modify('-1 week'));

// You can use between method for fields which has _min and _max suffix
$criteria->whereBetween('created_at', [Carbon::yesterday(), Carbon::today()]);

// Or
$criteria->whereCreatedAtBetween(Carbon::yesterday(), Carbon::today());

// You can use where method instead of dynamic camel case
$criteria->where('vendor', 'myvendor');
    
// Results are paginated, you can set limit and page
$criteria->limit(10)
    ->page(1);

// Get all products with given criteria
$products = $client->product()->all($criteria);
```

```php
// Serve webhooks
$events = $client->events();

// Check if request is signed correctly
if ($events->isValidRequest()) {
    // You can get current topic
    $topic = $events->getTopic();
    
    // You can get shop domain this event is for
    $events->getShopDomain();
    
    // You can capture specific event manually
    if ($topic === $events->cartCreate()->topic()) {
        $cartCreateEvent = $events->cartCreate()->capture();
    }
    
    // Or do it automatically based on topic
    $cartCreateEvent = $events->capture();
    
    // Iterate over collection
    foreach ($cartCreateEvent->getLineItems() as $lineItem) {
        // Get price for cart item
        $lineItem->getPrice();
    }
}
```

```php
// Get product of ID 1699015181608
$product = $client->product()
    ->get(1699015181608);

// Modify this product via setters and save it    
$product->setTitle('Star Wars T-Shirt')
    ->setBodyHtml('Fancy <strong>Star Wars</strong>strong> T-Shirt')
    ->setTags(['star wars', 'tshirt'])
    ->save();

// Lets iterate over product variants    
foreach ($product->variants as $variant) {
    // Change price for given sku
    if ($variant->sku === 'tshirt-star-wars') {
        // Set new prive via property and save
        $variant->price = 19.99;
        $variant->save();
    }
}

// We can set new body_html via property aswell
$product->body_html = 'Fancy Star Wars T-Shirt which costs $19.99';
$product->save();
```

```php
// Get our shop details
$shop = $client->shop()->get();
echo 'Shop ' . $shop->name . ', ';
echo 'located at ' . $shop->address1 . ', ' . $shop->zip . ' ' . $shop->city;

if ($shop->taxes_included) {
    echo '- taxes are included';
}

echo ', current plan is ' . $shop->plan_display_name;

// All dates are transformed to Carbon object
echo ', created at ' . $shop->created_at->fomat('H:i:s, d.m.Y');
```