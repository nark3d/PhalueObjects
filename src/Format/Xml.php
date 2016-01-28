<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Format;

final class Xml extends Format
{
    public function __construct($value)
    {
        parent::__construct($value);
        $domDocument = new \DOMDocument('1.0', 'UTF-8');
        $domDocument->formatOutput = true;
        $domDocument->encoding = 'UTF-8';
        $domDocument->loadXML($this->getValue());
        $this->value = $domDocument;
    }

    public function parse()
    {
        return [$this->getValue()->documentElement->tagName =>
            $this->convert($this->value->documentElement)];
    }

    public function convert($node, $output = [])
    {
        switch ($node->nodeType) {
            case XML_CDATA_SECTION_NODE:
                $output['@cdata'] = trim($node->textContent);
                break;
            case XML_TEXT_NODE:
                $output = trim($node->textContent);
                break;
            case XML_ELEMENT_NODE:
                $output = $this->elementNode($node);
                break;
        }

        return $output;
    }

    private function elementNode($node)
    {
        $output = $this->addChildNodes($this->childNode($node));
        return $this->attributes($node, $output);
    }

    private function childNode($node)
    {
        foreach($node->childNodes as $child) {
            $children = $this->convert($child);

            if(isset($child->tagName)) {
                $tagName = $child->tagName;
                $output[$tagName] = isset($output[$tagName])
                    ? $output[$tagName]
                    : [];

                $output[$tagName][] = $children;
            } elseif($children !== '') {
                $output = $children;
            }
        }

        return $output;
    }

    private function loopAttributes($attributes, $array = [])
    {
        // Loop through the attributes and collect them.
        foreach($attributes as $key => $node) {
            $array[$key] = (string) $node->value;
        }

        return $array;
    }

    private function attributes($node, $output)
    {
        // If there are attributes.
        if($node->attributes->length) {
            $output = is_array($output) ? $output : ['@value' => $output];
            $output['@attributes'] = $this->loopAttributes($node->attributes);
        }

        return $output;
    }

    private function addChildNodes ($output)
    {
        if(is_array($output)) {
            foreach ($output as $key => $value) {
                $output[$key] = is_array($value) && count($value) === 1
                    ? $value[0]
                    : $value;
            }

            $output = empty($output) ? '' : $output;
        }

        return $output;
    }


}
