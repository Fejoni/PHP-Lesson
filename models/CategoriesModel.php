<?php

/*
 * Модель для таблицы категорий (categories)
 *
 */

/**
 * Получить дочернии категории для категории $catId
 *
 * @param int $catId
 * @return array|false
 */
function getChildrenForCat (int $catId)
{
    // НУЖНО ИСПРАВИТЬ !!!!!

    $dblocation = '127.0.0.1';
    $dbname = 'expertphp';
    $dbuser = 'root';
    $dbpasswd = '';

    // Подключение БД
    $db = new mysqli($dblocation, $dbuser, $dbpasswd, $dbname);
    $sql = "SELECT * FROM categories WHERE parent_id = '{$catId}'";

    $rs = $db->query($sql);

    return createSmartyRsArray($rs);
}

/**
 * Получить главные категории с привязками дочерних
 *
 * @return array
 */
function getAllMainCatsWithChildren(): array
{
    // НУЖНО ИСПРАВИТЬ !!!!!

    $dblocation = '127.0.0.1';
    $dbname = 'expertphp';
    $dbuser = 'root';
    $dbpasswd = '';

    // Подключение БД
    $db = new mysqli($dblocation, $dbuser, $dbpasswd, $dbname);
    $sql = "SELECT * FROM categories WHERE parent_id = 0";

    $rs = $db->query($sql);

    $smartyRs = array();
    // Перебор запросов
    while ($row = $rs->fetch_assoc()){
        // Дочернии категории

        $rsChildren = getChildrenForCat($row['id']);

        if ($rsChildren) {
            $row['children'] = $rsChildren;
        }

        // Запись всего результата в массив
        $smartyRs[] = $row;
    }

    return $smartyRs;
}
