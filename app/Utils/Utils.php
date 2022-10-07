<?php

namespace App\Utils;

/**
 * Classe responsável por carregar utilitários da aplicação
 */
class Utils
{
    /**
     * Visualiza os dados através de uma tag pre
     */
    public static function pre($args, $visible = true): void
    {
        if ($visible) {

            echo "<pre>";
            print_r($args);
            echo "</pre>";
            exit;
        }
    }
}
