<?php


/**
 * <b> Загрузка страницы <b>
 *
 * @param $controller
 * @param string $action
 */
function loadPage($controller, $action = 'index'){
    require PathPrefix . $controller . PathPostfix;

    $function = $action . 'Action';
    $function();
}