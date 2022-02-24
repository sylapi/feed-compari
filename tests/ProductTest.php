<?php

namespace Sylapi\Feeds\Compari\Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Feeds\FeedGenerator;
use Sylapi\Feeds\Compari\Feed;
use Sylapi\Feeds\Compari\Models\Product;
use Sylapi\Feeds\Compari\Models\Shipping;
use Sylapi\Feeds\Compari\Models\ProductDetail;

class ProductTest extends PHPUnitTestCase
{

    private $product;

    private $serializer;

    public function setUp():void
    {
        $this->product = $this->createProduct();
        $this->serializer = (new FeedGenerator())->getSerializer();
    }

    private function createProduct(): Product
    {

        $productDetails = [];
        for($x = 0; $x < 4; $x++)  {
            $productDetail = new ProductDetail();
            $productDetail->setSectionName('Param '.$x)
                ->setAttributeValue('Value '.$x);
    
            $productDetails[] = $productDetail;
        }
        
        $shipping = new Shipping();
        $shipping->setPrice(12.22)
            ->setCurrency('RON')
            ->setMaxHandlingTime(4)
            ;

        $product = new Product();
        
        $product->setId('id-1234567890')
            ->setTitle('Product title')
            ->setDescription('Product description...')
            ->setLink('https://url.exmaple.com/products/id-1234567890/')
            ->setImageLink('https://url.exmaple.com/storage/images/products/id-1234567890/main.jpg')
            ->setCurrency('RON')
            ->setPrice(11.00)
            ->setSalePrice(9.95)
            ->setProductCategory('Calculatoare>Laptop')
            ->setBrand('Brand XYZ')
            ->setGtin('9876543210')
            ->setShipping($shipping)
            ->setProductDetails($productDetails);
        return $product;
    }


    public function testProductXML()
    {
        $content = $this->serializer->serialize($this->product, 'xml');
        $filePath = __DIR__.'/Mock/product.xml';
        $this->assertXmlStringEqualsXmlFile($filePath, $content);
    }

    public function testMakeProduct()
    {
        $categoryName = 'Test Category';

        $productBase = new \Sylapi\Feeds\Models\Product();
        $productBase->setProductCategory([
            Feed::NAME => $categoryName
            ])
            ->setShipping(new \Sylapi\Feeds\Models\Shipping())
            ->setProductDetails([
                Feed::NAME => [ new \Sylapi\Feeds\Models\ProductDetail() ]
            ])
        ;
        $product = (new Product)->make($productBase);
        $productDetails = $product->getProductDetails();
        $this->assertInstanceOf(Product::class, $product);
        $this->assertInstanceOf(Shipping::class, $product->getShipping());
        $this->assertInstanceOf(ProductDetail::class, $productDetails[0]);
        $this->assertEquals($categoryName, $product->getProductCategory());

    }
}