<?php

namespace App\Pagination;

class Pagination
{
    /**
     * Número máximo de itens por página
     * @var integer
     */
    private $limit;
    /**
     * Quantidade total de resultados do banco
     * @var integer
     */
    private $results;
    /**
     * Quantidade de páginas
     * @var integer
     */
    private $pages;
    /**
     * Página atual
     * @var integer
     */
    private $current_page;
    /**
     * Instância da classe
     * @param integer $results
     */
    public function __construct($results, $current_page = 1, $limit = 10)
    {
        $this->results = $results;
        $this->limit = $limit;
        $this->current_page = (is_numeric($current_page) and $current_page > 0) ? $current_page : 1;
        $this->calculate();
    }
    /**
     * Calcula o total de páginas
     */
    private function calculate()
    {
        //Calcula o total de páginas
        $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;

        //Verifica se a página atual não excede o número de páginas
        $this->current_page = $this->current_page <= $this->pages ? $this->current_page : $this->pages;
    }
    /**
     * Retorna a clausula LIMIT do SQL
     * @return string
     */
    public function getLimit()
    {
        $offset = ($this->limit * ($this->current_page - 1));
        return $offset . "," . $this->limit;
    }
    /**
     * Retorna as opções de páginas disponíveis
     * @return array
     */
    public function getPages()
    {

        if ($this->pages == 1) {
            return [];
        }

        $pages = [];

        for ($i = 1; $i <= $this->pages; $i++) {

            $pages[] = [
                'page' => $i,
                'current' => $i == $this->current_page
            ];
        }

        return $pages;
    }
}
