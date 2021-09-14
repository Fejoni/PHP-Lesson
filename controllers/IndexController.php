<?php

/*
 *
 * Контроллер главной страницы
 *
 */

function testAction(){
    echo 'IndexController.php -> testAction';
    echo '12321321321';
}

// Подключаем модели
include_once '../models/CategoriesModel.php';

/**
 * Формирование главной страницы
 *
 * @param $smarty
 */

function indexAction($smarty){

    $rsCategories = getAllMainCatsWithChildren();


    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('rsCategories', $rsCategories);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}