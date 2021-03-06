<?php

namespace BS3ShortcodeHandlers\Handlers;

use BS3ShortcodeHandlers\Helpers\FormatHelper;
use BS3ShortcodeHandlers\Parsers\DataAttributesParser;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;

final class RowHandler
{

    function __invoke(ShortcodeInterface $shortcode)
    {
        $attributeParser = new DataAttributesParser();
        $formatHelper = new FormatHelper();

        $atts = array(
            "xclass" => $shortcode->getParameter('xclass', false),
            "data" => $shortcode->getParameter('data', false)
        );

        $class = 'row';
        $class .= ($atts['xclass']) ? ' ' . $atts['xclass'] : '';

        $dataProps = $attributeParser($atts['data']);

        return sprintf('<div class="%s"%s>%s</div>', $formatHelper->esc_attr($class), $dataProps ? ' ' . ($dataProps) : '', $shortcode->getContent());
    }
}
