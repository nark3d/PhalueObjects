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

    /**
     * @return array
     */
    public function parse()
    {
        return [$this->getValue()->documentElement->tagName =>
            $this->parseElement($this->value->documentElement)];
    }

    /**
     * @param $node
     * @param array $output
     * @return array
     */
    public function parseElement($node, $output = [])
    {
        switch ($node->nodeType) {
            case XML_CDATA_SECTION_NODE:
                $output['@cdata'] = trim($node->textContent);
                break;
            case XML_TEXT_NODE:
                return trim($node->textContent);
                break;
            case XML_ELEMENT_NODE:
                return $this->elementNode($node);
                break;
        }

        return $output;
    }

    /**
     * @param $node
     * @return array
     */
    private function elementNode($node)
    {
        $output = $this->childNode($node);
        $output = $this->addChildNodes($output);
        return $this->attributes($node, $output);
    }

    /**
     * @param $node
     * @param array $output
     * @return array
     */
    private function childNode($node, $output = [])
    {
        foreach ($node->childNodes as $child) {
            $children = $this->parseElement($child);

            if (isset($child->tagName)) {
                $tagName = $child->tagName;
                $output[$tagName] = isset($output[$tagName])
                    ? $output[$tagName]
                    : [];
                $output[$tagName][] = $children;
            } elseif ($children !== '') {
                $output = $children;
            }
        }
        return $output;
    }

    private function loopAttributes($attributes, $array = [])
    {
        // Loop through the attributes and collect them.
        foreach ($attributes as $key => $node) {
            $array[$key] = (string) $node->value;
        }

        return $array;
    }

    private function attributes($node, $output)
    {
        // If there are attributes.
        if ($node->attributes->length) {
            $output = is_array($output) ? $output : ['@value' => $output];
            $output['@attributes'] = $this->loopAttributes($node->attributes);
        }
        return $output;
    }

    private function addChildNodes($output)
    {
        if (is_array($output)) {
            foreach ($output as $key => $value) {
                $output[$key] = is_array($value) && count($value) === 1
                    ? $value[0]
                    : $value;
            }
            $output = !isset($output) || empty($output) ? '' : $output;
        }

        return $output;
    }
}
