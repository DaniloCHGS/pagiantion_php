
# Pagination

Classe responsável por fazer paginação de dados


## Demonstração

Insira um gif ou um link de alguma demonstração

```PHP
<?php

include __DIR__ . "/vendor/autoload.php";

use App\Pagination\Pagination;
use App\Utils\Utils;

$total = 20;
$current_page = $_GET['page'] ?? 1;

$pagination = new Pagination($total, $current_page);

//Debug
Utils::pre($pagination, false);
Utils::pre($pagination->getLimit(), false);
Utils::pre($pagination->getPages(), false);


//Exemplo
$paginationLayout = '';
$pages = $pagination->getPages();

foreach ($pages as $key => $page) {
    $paginationLayout .= "<a href='?".$pag['page']."'/>";
}
```