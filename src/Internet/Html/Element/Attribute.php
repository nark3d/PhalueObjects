<?php

namespace BestServedCold\PhalueObjects\Internet\Html\Element;

use BestServedCold\PhalueObjects\Internet\Html\Element;
use BestServedCold\PhalueObjects\VOString;

/**
 * Class Attribute
 *
 * @package BestServedCold\PhalueObjects\Internet\Html\Element
 */
class Attribute extends VOString
{
    /**
     * @var array $globalAttributes
     */
    private $globalAttributes = [
        'accesskey',
        'class',
        'contenteditable',
        'contextmenu',
        'data',
        'dir',
        'draggable',
        'hidden',
        'id',
        'is',
        'itemid',
        'itemprop',
        'itemref',
        'itemscope',
        'itemtype',
        'lang',
        'onabort',
        'onautocomplete',
        'onautocompleteerror',
        'onblur',
        'oncancel',
        'oncanplay',
        'oncanplaythrough',
        'onchange',
        'onclick',
        'onclose',
        'oncontextmenu',
        'oncuechange',
        'ondblclick',
        'ondrag',
        'ondragend',
        'ondragenter',
        'ondragexit',
        'ondragleave',
        'ondragover',
        'ondragstart',
        'ondrop',
        'ondurationchange',
        'onemptied',
        'onended',
        'onerror',
        'onfocus',
        'oninput',
        'oninvalid',
        'onkeydown',
        'onkeypress',
        'onkeyup',
        'onload',
        'onloadeddata',
        'onloadedmetadata',
        'onloadstart',
        'onmousedown',
        'onmouseenter',
        'onmouseleave',
        'onmousemove',
        'onmouseout',
        'onmouseover',
        'onmouseup',
        'onmousewheel',
        'onpause',
        'onplay',
        'onplaying',
        'onprogress',
        'onratechange',
        'onreset',
        'onresize',
        'onscroll',
        'onseeked',
        'onseeking',
        'onselect',
        'onshow',
        'onsort',
        'onstalled',
        'onsubmit',
        'onsuspend',
        'ontimeupdate',
        'ontoggle',
        'onvolumechange',
        'onwaiting',
        'spellcheck',
        'style',
        'tabindex',
        'title',
        'translate',
        'xml:lang',
        'xml:base'
    ];

    /**
     * @var array $allowedAttributes
     */
    private $allowedAttributes = [
        'accept'       => [ 'form', 'input' ],
        'accesskey'    => [ 'form' ],
        'action'       => [ 'form' ],
        'align'        => [ 'applet', 'caption', 'col', 'colgroup', 'hr', 'iframe', 'img', 'table', 'tbody', 'td',
            'tfoot', 'th', 'thead', 'tr' ],
        'alt'          => [ 'applet', 'area', 'img', 'input' ],
        'async'        => [ 'script' ],
        'autocomplete' => [ 'form', 'input' ],
        'autofocus'    => [ 'button', 'input', 'keygen', 'select', 'textarea' ],
        'autoplay'     => [ 'audio', 'video' ],
        'autosave'     => [ 'input' ],
        'bgcolor'      => [ 'body', 'col', 'colgroup', 'table', 'tbody', 'tfoot', 'td', 'th', 'tr' ],
        'border'       => [ 'img', 'object', 'table' ],
        'buffered'     => [ 'audio', 'video' ],
        'challenge'    => [ 'keygen' ],
        'charset'      => [ 'meta', 'script' ],
        'checked'      => [ 'command', 'input' ],
        'cite'         => [ 'blockquote', 'del', 'ins', 'q' ],
        'code'         => [ 'applet' ],
        'codebase'     => [ 'applet' ],
        'color'        => [ 'basefont', 'font', 'hr' ],
        'cols'         => [ 'textarea' ],
        'colspan'      => [ 'td', 'th' ],
        'content'      => [ 'meta' ],
        'controls'     => [ 'audio', 'video' ],
        'coords'       => [ 'area' ],
        'data'         => [ 'object' ],
        'datetime'     => [ 'del', 'ins', 'time' ],
        'default'      => [ 'track' ],
        'defer'        => [ 'script' ],
        'dirname'      => [ 'input', 'textarea' ],
        'disabled'     => [ 'button', 'command', 'fieldset', 'input', 'keygen', 'optgroup', 'option', 'select',
            'textearea' ],
        'download'     => [ 'a', 'area' ],
        'enctype'      => [ 'form' ],
        'for'          => [ 'label', 'output' ],
        'form'         => [ 'button', 'fieldset', 'input', 'keygen', 'label', 'meter', 'object', 'output', 'prgress',
            'select', 'textarea' ],
        'formaction'   => [ 'input', 'button' ],
        'headers'      => [ 'td', 'th' ],
        'height'       => [ 'canvas', 'embed', 'iframe', 'img', 'input', 'object', 'video' ],
        'high'         => [ 'meter' ],
        'href'         => [ 'a', 'area', 'base', 'link' ],
        'hreflang'     => [ 'a', 'area', 'link' ],
        'http-equiv'   => [ 'meta' ],
        'icon'         => [ 'command' ],
        'integrity'    => [ 'link', 'script' ],
        'ismap'        => [ 'img' ],
        'keytype'      => [ 'keygen' ],
        'kind'         => [ 'track' ],
        'label'        => [ 'track' ],
        'lang'         => [ 'track' ],
        'language'     => [ 'script' ],
        'list'         => [ 'input' ],
        'loop'         => [ 'audio', 'bgsound', 'video' ],
        'low'          => [ 'meter' ],
        'manifest'     => [ 'html' ],
        'max'          => [ 'input', 'meter', 'progress' ],
        'maxlength'    => [ 'input', 'textarea' ],
        'media'        => [ 'a', 'area', 'link', 'source', 'style' ],
        'method'       => [ 'form' ],
        'min'          => [ 'input', 'meter' ],
        'multiple'     => [ 'input', 'select' ],
        'muted'        => [ 'video' ],
        'name'         => [ 'button', 'form', 'fieldset', 'iframe', 'input', 'keygen', 'object', 'output', 'select',
            'textarea', 'map', 'meta', 'param' ],
        'novalidate'   => [ 'form' ],
        'open'         => [ 'details' ],
        'optimum'      => [ 'meter' ],
        'pattern'      => [ 'input' ],
        'ping'         => [ 'a', 'area' ],
        'placeholder'  => [ 'input', 'textarea' ],
        'poster'       => [ 'video' ],
        'preload'      => [ 'audio', 'video' ],
        'radiogroup'   => [ 'command' ],
        'readonly'     => [ 'input', 'textarea' ],
        'rel'          => [ 'a', 'area', 'link' ],
        'required'     => [ 'input', 'select', 'textarea' ],
        'reversed'     => [ 'ol' ],
        'rows'         => [ 'textarea' ],
        'rowspan'      => [ 'td', 'th' ],
        'sandbox'      => [ 'iframe' ],
        'scope'        => [ 'th' ],
        'scoped'       => [ 'style' ],
        'seamless'     => [ 'iframe' ],
        'selected'     => [ 'option' ],
        'shape'        => [ 'a', 'area' ],
        'size'         => [ 'input', 'select' ],
        'sizes'        => [ 'link', 'img', 'source' ],
        'span'         => [ 'col', 'colgroup' ],
        'src'          => [ 'audio', 'embed', 'iframe', 'img', 'input', 'script', 'source', 'track', 'video' ],
        'srcdoc'       => [ 'iframe' ],
        'srclang'      => [ 'track' ],
        'srcset'       => [ 'img' ],
        'start'        => [ 'ol' ],
        'step'         => [ 'input' ],
        'summary'      => [ 'table' ],
        'target'       => [ 'a', 'area', 'base', 'form' ],
        'type'         => [ 'button', 'input', 'command', 'embed', 'object', 'script', 'source', 'style', 'menu' ],
        'usemap'       => [ 'img', 'input', 'object' ],
        'value'        => [ 'button', 'option', 'input', 'li', 'meter', 'progress', 'param' ],
        'width'        => [ 'canvas', 'embed', 'iframe', 'img', 'input', 'object', 'video' ],
        'wrap'         => [ 'textarea' ]
    ];

    /**
     * Attribute constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        if (!in_array(
            $value,
            array_merge($this->globalAttributes, array_keys($this->allowedAttributes))
        )) {
            throw new \InvalidArgumentException('[' . $value . '] is not a valid HTML Attribute');
        }

        parent::__construct($value);
    }

    /**
     * @param  $element
     * @return bool
     */
    public function validForElement(Element $element)
    {
        return in_array($element->getValue(), $this->globalAttributes)
            || in_array($element->getValue(), $this->allowedAttributes[ $this->getValue() ]);
    }
}
