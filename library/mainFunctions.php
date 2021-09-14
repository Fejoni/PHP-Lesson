<?php

/**
 *
 * Основные функции
 *
 */

/**
 * Формирование запрашиваемой страницы
 *
 * @param string $controllerName название контроллера
 * @param string $actionName название функции обработки страницы
 */
function loadPage($smarty, $controllerName, $actionName = 'index'){

    include_once PathPrefix . $controllerName . PathPostfix;

    $function = $actionName . 'Action';
    $function($smarty);
}

/**
 * Загрузка шаблона
 *
 * @param object $smarty объект шаблонизатора
 * @param string $templateName название файла шаблона
 */
function loadTemplate($smarty, $templateName)
{
    $smarty->display($templateName . TemplatePostfix);
}

function createSmartyRsArray($rs)
{
    if (!$rs) return false;

    $smartyRs = array();
    while ($row = $rs->fetch_assoc()){
        $smartyRs[] = $row;
    }
    return $smartyRs;
}

// Дебагер

function debug($data = null, $die = 1)
{
    echo "Debug: <br /><pre>";
    print_r($data);
    echo "</pre>";

    if ($die) die;
}