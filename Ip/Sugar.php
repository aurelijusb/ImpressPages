<?php

/**
 * ImpressPages sugar methods
 */

function ipGetOption($option, $defaultValue = null)
{
    return \Ip\ServiceLocator::getOptions()->getOption($option, $defaultValue);
}



function ipSetOption($option, $value)
{
    \Ip\ServiceLocator::getOptions()->setOption($option, $value);
}

function ipGetBreadcrumb()
{
    return \Ip\ServiceLocator::getContent()->getBreadcrumb();
}

function ipGetZones()
{
    return \Ip\ServiceLocator::getContent()->getZones();
}

function ipGetCurrentZone()
{
    return \Ip\ServiceLocator::getContent()->getCurrentZone();
}

function ipGetZone($zoneName)
{
    return \Ip\ServiceLocator::getContent()->getZone($zoneName);
}

function ipGetCurrentLanguage()
{
    return \Ip\ServiceLocator::getContent()->getCurrentLanguage();
}

function ipGetCurrentPage()
{
    return \Ip\ServiceLocator::getContent()->getCurrentPage();
}

function ipSetBlockContent($block, $content)
{
    \Ip\ServiceLocator::getContent()->setBlockContent($block, $content);
}

function ipSetLayoutVariable($name, $value)
{
    $response = \Ip\ServiceLocator::getResponse();
    if (method_exists($response, 'setLayoutVariable')) {
        $response->setLayoutVariable($name, $value);
    } else {
        ipLog('Core', 'Response method has no method setLayoutVariable');
    }
}

function ipAddJavascript($file, $stage = 1)
{
    $response = \Ip\ServiceLocator::getResponse();
    if (method_exists($response, 'addJavascript')) {
        $response->addJavascript($file, $stage);
    } else {
        ipLog('Core', 'Response method has no method addJavascript');
    }
}

function ipAddJavascriptVariable($name, $value)
{
    $response = \Ip\ServiceLocator::getResponse();
    if (method_exists($response, 'addJavascriptVariable')) {
        $response->addJavascriptVariable($name, $value);
    } else {
        ipLog('Core', 'Response method has no method addJavascriptVariable');
    }
}

function ipAddJavascriptContent($key, $javascript, $stage = 1)
{
    $response = \Ip\ServiceLocator::getResponse();
    if (method_exists($response, 'addJavascriptContent')) {
        $response->addJavascriptContent($key, $javascript, $stage = 1);
    } else {
        ipLog('Core', 'Response method has no method addJavascriptContent');
    }
}

function ipAddCss($file, $stage = 1)
{
    $response = \Ip\ServiceLocator::getResponse();
    if (method_exists($response, 'addCss')) {
        $response->addCss($file, $stage);
    } else {
        ipLog('Core', 'Response method has no method addCss');
    }

}

function ipLog($module, $message, $severity, $debugInfo = null)
{
    //TODOX
}

function ipJavascript()
{
    return \Ip\ServiceLocator::getResponse()->generateJavascript();
}

function ipHead()
{
    return \Ip\ServiceLocator::getResponse()->generateHead();
}

function ipSetLayout($file)
{
    $response = \Ip\ServiceLocator::getResponse();
    if (method_exists($response, 'setLayout')) {
        $response->setLayout($file);
    } else {
        ipLogNotice('Core', 'Response method has no method setLayout');
    }
}

/**
 * @param $block
 * @return \Ip\Block
 */
function ipBlock($block)
{
    return \Ip\ServiceLocator::getContent()->generateBlock($block);
}

/**
 * @param $slot
 * @return string
 */
function ipSlot($slot)
{
    return \Ip\ServiceLocator::getContent()->generateSlot($slot);
}

function __($text, $domain)
{
    return \Ip\Translator::translate($text, $domain);
}

function _n($singular, $plural, $number, $domain)
{
    return \Ip\Translator::translatePlural($singular, $plural, $number, $domain);
}

function _x($text, $context, $domain)
{ //TODOX
    return $text;
}

function _nx($single, $plural, $number, $context, $domain)
{
//TODOX
}