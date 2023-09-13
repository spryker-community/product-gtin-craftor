# spryker-community/product-gtin-craftor

## OpenAI

Update your shared config
```
use ValanticSpryker\Shared\OpenAi\OpenAiConstants;
...

$config[KernelConstants::CORE_NAMESPACES]  = [
    'ValanticSpryker',
    'SprykerCommunity',
    ...
];

...
$config[OpenAiConstants::OPENAI_API_KEY] = 'xxxxxx';
```

## UPC Database
Update your shared config
```
use SprykerCommunity\Shared\UpcDatabase\UpcDatabaseConstants;
...
$config[UpcDatabaseConstants::UPC_DATABASE_PRODUCT_ENDPOINT] = 'https://api.upcdatabase.org/product/';
$config[UpcDatabaseConstants::UPC_DATABASE_API_KEY] = 'A9BE6C4442AA0E897F26F0E31B578729';
```

## Purpose
Main focus of our product gtin creator is the data enrichment of products through different APIs.
The enrichment is triggered through an input of a global trade item number(gtin)

### Planned Integration
For the start we were planing to integrate the UPC database which returns properties like title, description, brand, manufacturer and category for a given gtin
As an extension we are planing to send these properties to openAI to get a product description.
As a result you get product data with only providing of a gtin

### For whom?
This is interesting for small companies that do not have access to Pim or other services or for companies with insufficient data sets. It also increases time to market when initial product data needs to be made available quickly and developer resources are limited. It can also be used to generate real demo data.

### Future
For the future multiple improvement or additions can be made.
As an example we could connect an image service to get images or other specific attributes which are common for products. 
