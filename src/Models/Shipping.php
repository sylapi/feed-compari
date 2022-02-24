<?php
namespace Sylapi\Feeds\Compari\Models;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("shipping")
 * @Serializer\AccessType("public_method")
 */
class Shipping
{
    /**
     * @Serializer\Type("string")
     * @Serializer\Exclude
     */
    private $currency;

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("DeliveryCost")
     */
    private $price;
    

    /**
     * @Serializer\Type("integer")
     * @Serializer\Exclude
     */
    private $maxHandlingTime;


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
        if(is_numeric($this->price) && $this->getCurrency()) {
            return $this->price.' '.$this->getCurrency();
        }
        return null;
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
     * Get the value of maxHandlingTime
     */ 
    public function getMaxHandlingTime()
    {
        return $this->maxHandlingTime;
    }

    /**
     * Set the value of maxHandlingTime
     *
     * @return  self
     */ 
    public function setMaxHandlingTime($maxHandlingTime)
    {
        $this->maxHandlingTime = $maxHandlingTime;

        return $this;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("DeliveryTime")
     * @Serializer\XmlElement(cdata=false)
     * @return null|string
     */
    public function getDeliveryTime()
    {
        $maxHandlingTime = $this->getMaxHandlingTime();
        if(!isset($maxHandlingTime)) {
            return null;
        }
        return (string) $maxHandlingTime;
    }    

    public function make($shipping): self
    {
        $item  = new self;

        $itemVars = array_keys(get_class_vars(self::class));
    
        foreach($itemVars as $itemVar) {
            $getterName = 'get'.ucfirst($itemVar);
            $setterName = 'set'.ucfirst($itemVar);

            if(method_exists($shipping, $getterName) && method_exists($item, $setterName)) {
                $elem =  $shipping->{$getterName}();
                $item->{$setterName}($elem);  
            }
        }

        return $item;
    }      
}