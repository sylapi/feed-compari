<?php
namespace Sylapi\Feeds\Compari\Models;

use JMS\Serializer\Annotation as Serializer;
use Sylapi\Feeds\Contracts\ProductSerializer;
use Sylapi\Feeds\Compari\Feed;

/**
 * @Serializer\XmlRoot("product")
 * @Serializer\AccessType("public_method")
 */

class Product implements ProductSerializer
{
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Identifier")
     * @Serializer\XmlElement(cdata=false)
     */
    private $id;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Name")
     * @Serializer\XmlElement(cdata=false)
     */
    private $title;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Description")
     * @Serializer\XmlElement(cdata=false)
     */
    private $description;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ProductUrl")
     * @Serializer\XmlElement(cdata=false)
     */
    private $link;

    /**
     * @Serializer\Type("string") 
     * @Serializer\SerializedName("ImageUrl")
     * @Serializer\XmlElement(cdata=false)
     */
    private $imageLink;

    /**
     * @Serializer\Type("string")
     * @Serializer\Exclude
     */
    private $currency;

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Price")
     * @Serializer\Exclude(if = "object.getSalePrice() != null")
     */
    private $price;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Price")
     * @Serializer\XmlElement(cdata=false)
     */
    private $salePrice;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Category")
     * @Serializer\XmlElement(cdata=false)
     */
    private $productCategory;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Manufacturer")
     * @Serializer\XmlElement(cdata=false)
     */
    private $brand;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EanCode")
     * @Serializer\XmlElement(cdata=false)
     */
    private $gtin;
    
    /**
     * @Serializer\Type("Sylapi\Feeds\Compari\Models\Shipping")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Inline
     */
    private $shipping;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Attributes")
     * @Serializer\XmlList(entry = "Attribute")
     */
    private $productDetails;

    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of link
     */ 
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the value of link
     *
     * @return  self
     */ 
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }    

    /**
     * Get the value of imageLink
     */ 
    public function getImageLink()
    {
        return $this->imageLink;
    }

    /**
     * Set the value of imageLink
     *
     * @return  self
     */ 
    public function setImageLink($imageLink)
    {
        $this->imageLink = $imageLink;

        return $this;
    }

    /**
     * Get the value of currency
     */ 
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set the value of currency
     *
     * @return  self
     */ 
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of salePrice
     */ 
    public function getSalePrice()
    {
        return $this->salePrice;
    }

    /**
     * Set the value of salePrice
     *
     * @return  self
     */ 
    public function setSalePrice($salePrice)
    {
        $this->salePrice = $salePrice;

        return $this;
    }

    /**
     * Get the value of productCategory
     */ 
    public function getProductCategory()
    {
        return $this->productCategory;
    }

    /**
     * Set the value of productCategory
     *
     * @return  self
     */ 
    public function setProductCategory($productCategory)
    {
        $this->productCategory = $productCategory;

        return $this;
    }

    /**
     * Get the value of brand
     */ 
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set the value of brand
     *
     * @return  self
     */ 
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get the value of gtin
     */ 
    public function getGtin()
    {
        return $this->gtin;
    }

    /**
     * Set the value of gtin
     *
     * @return  self
     */ 
    public function setGtin($gtin)
    {
        $this->gtin = $gtin;

        return $this;
    }

    /**
     * Get the value of shipping
     */ 
    public function getShipping()
    {
        return $this->shipping;
    }


    /**
     * Set the value of shipping
     *
     * @return  self
     */ 
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;

        return $this;
    } 

    /**
     * Get the value of productDetails
     */ 
    public function getProductDetails()
    {
        return $this->productDetails;
    }

    /**
     * Set the value of productDetails
     *
     * @return  self
     */ 
    public function setProductDetails($productDetails)
    {
        $this->productDetails = $productDetails;

        return $this;
    }    

    public function make(\Sylapi\Feeds\Models\Product $product): self
    {
        $item  = new self;

        $itemVars = array_keys(get_class_vars(self::class));
    
        foreach($itemVars as $itemVar) {
            $getterName = 'get'.ucfirst($itemVar);
            $setterName = 'set'.ucfirst($itemVar);

            if(method_exists($product, $getterName) && method_exists($item, $setterName)) {
                $elem =  $product->{$getterName}();
                if(is_object($elem)) {
                    switch(get_class($elem)) {
                        case 'Sylapi\Feeds\Models\Shipping' :
                            $elem = (new Shipping)->make($elem);
                        break;                        
                    }
                }

                if($itemVar === 'productCategory') {
                    if(is_array($elem) && isset($elem[Feed::NAME])) {
                        $elem = $elem[Feed::NAME];
                    } else {
                        $elem = null;
                    }
                }

                if($itemVar === 'productDetails') {
                    if(isset($elem[Feed::NAME]) && is_array($elem[Feed::NAME])) {
                        $elems = [];
                        foreach($elem[Feed::NAME] as $pd){
                            $elems[] = (new ProductDetail)->make($pd);
                        }
                        $elem = $elems;
                    } else {
                        $elem = null;
                    }
                }

                $item->{$setterName}($elem);  
            }
        }

        return $item;
    }
}
