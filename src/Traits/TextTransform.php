<?php

namespace Yorki\Shopify\Traits;

trait TextTransform
{
    /**
     * @param string $camelCase
     * @param string $delimiter
     *
     * @return string
     */
    protected function toSnakeCase($camelCase, $delimiter = '_')
    {
        if (!ctype_lower($camelCase)) {
            $camelCase = preg_replace('/\s+/u', '', ucwords($camelCase));
            $camelCase = mb_strtolower(preg_replace('/(.)(?=[A-Z])/u', '$1' . $delimiter, $camelCase), 'UTF-8');
        }

        return $camelCase;
    }

    /**
     * @param string $snakeCase
     *
     * @return string
     */
    protected function toCamelCase($snakeCase)
    {
        $snakeCase = ucwords(str_replace(['-', '_'], ' ', $snakeCase));
        $snakeCase = str_replace(' ', '', $snakeCase);

        return lcfirst($snakeCase);
    }
}