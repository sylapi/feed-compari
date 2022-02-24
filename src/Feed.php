<?php
namespace Sylapi\Feeds\Compari;

use Sylapi\Feeds\Abstracts\Feed as FeedAbstract;
use Sylapi\Feeds\Contracts\ProductSerializer;

class Feed extends FeedAbstract
{
    const NAME = 'compari';

    public function getDefaultFileName(): string
    {
        return self::NAME;
    }

    public function getProductInstance(): ProductSerializer
    {
        return new Models\Product();
    }

    public function initXML(): \DOMElement
    {
        $doc = $this->getDocument();
        $maniNode = $doc->createElement("products");
        $doc->appendChild($maniNode);
        $this->setMainXmlElement($maniNode);

        return $maniNode;
    }

}