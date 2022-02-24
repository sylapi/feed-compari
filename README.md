# Compari Merchant

```php
$feedGenerator = new Sylapi\Feeds\FeedGenerator();
$feedGenerator->setFeed(new Sylapi\Feeds\Compari\Feed(
    Sylapi\Feeds\Parameters::create([
        'title' => 'Title example',
        'description' => 'Description example...',
        'link' => 'https://link.example/',
    ])
));

$product = new \Sylapi\Feeds\Models\Product();
//...
$feedGenerator->appendProduct($product);
$feedGenerator->appendProduct($product);
//...
$feedGenerator->appendProduct($product);
//...
$feedGenerator->save();
echo $feedGenerator->filePath();
```

## Commands

| COMMAND | DESCRIPTION |
| ------ | ------ |
| composer tests | Testy |
| composer phpstan |  PHPStan |
| composer coverage | PHPUnit Coverage |
| composer coverage-html | PHPUnit Coverage HTML (DIR: ./coverage/) |