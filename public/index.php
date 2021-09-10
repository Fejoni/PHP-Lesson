<?php

require '../config/config.php';         // Инициализация настроек
require '../library/mainFunctions.php'; // Основные функции

// Определение Controller
$controller = isset($_GET['controllers']) ? ucfirst($_GET['controllers']) : 'Index';

// Определение Action
$action = $_GET['action'] ?? 'index';

echo 'Подключаемый php файл (Controller): ' . $controller . '<br>';
echo 'Подключаемый php файл (Action): ' . $action . '<br>';

loadPage($controller, $action);