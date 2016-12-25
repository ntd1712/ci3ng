<?php

if (!function_exists('env'))
{
    /**
     * Get the value of an environment variable. Supports boolean, empty and null
     *
     * @param   string $key
     * @param   mixed $default
     * @return  mixed
     */
    function env($key, $default = null)
    {
        $value = getenv($key);

        if (false === $value)
        {
            return value($default);
        }

        switch (strtolower($value))
        {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }

        if (startsWith($value, '"') && endsWith($value, '"'))
        {
            return substr($value, 1, -1);
        }

        return $value;
    }
}

if (!function_exists('endsWith'))
{
    /**
     * Determine if a given string ends with a given substring
     *
     * @param   string $haystack
     * @param   string|array $needles
     * @return  bool
     */
    function endsWith($haystack, $needles)
    {
        foreach ((array)$needles as $needle)
        {
            if ((string)$needle === substr($haystack, -strlen($needle)))
            {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('startsWith'))
{
    /**
     * Determine if a given string starts with a given substring
     *
     * @param   string $haystack
     * @param   string|array $needles
     * @return  bool
     */
    function startsWith($haystack, $needles)
    {
        foreach ((array)$needles as $needle)
        {
            if ('' != $needle && 0 === strpos($haystack, $needle))
            {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('purify'))
{
    /**
     * @param   $dirty_html
     * @param   string|array|HTMLPurifier_Config|mixed $config
     * @param   string $encoding
     * @return  string|array
     */
    function purify($dirty_html, $config = false, $encoding = 'UTF-8')
    {
        if (is_array($dirty_html))
        {
            $clean_html = [];

            foreach ($dirty_html as $k => $v)
            {
                $clean_html[$k] = purify($v, $config, $encoding);
            }
        }
        else
        {
            switch ($config)
            {
                case 'comment':
                    $config = HTMLPurifier_Config::createDefault();
                    $config->set('Core.Encoding', $encoding);
                    $config->set('HTML.Doctype', 'XHTML 1.0 Strict');
                    $config->set('HTML.Allowed', 'p,a[href|title],abbr[title],acronym[title],b,strong,blockquote[cite],code,em,i,strike');
                    $config->set('AutoFormat.AutoParagraph', true);
                    $config->set('AutoFormat.Linkify', true);
                    $config->set('AutoFormat.RemoveEmpty', true);
                    break;
                case false:
                    $config = HTMLPurifier_Config::createDefault();
                    $config->set('Core.Encoding', 'UTF-8');
                    $config->set('HTML.Doctype', 'XHTML 1.0 Strict');
                default:
            }

            $purifier = new HTMLPurifier($config);
            $clean_html = $purifier->purify($dirty_html);
        }

        return $clean_html;
    }
}

if (!function_exists('value'))
{
    /**
     * Return the default value of the given value
     *
     * @param   mixed $value
     * @return  mixed
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}