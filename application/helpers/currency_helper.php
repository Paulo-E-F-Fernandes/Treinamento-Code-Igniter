<?php

function numeros_em_reais($numero)
{
    /*  ******AULA 3 (https://www.alura.com.br/course/codeigniter/section/3)****** */
    /* Número para ser formatado
     * Quantidade de casas decimais
     * Separador dos decimais
     * Separador dos milhares
     */
    return 'R$ ' . number_format($numero, 2, ',', '.');
}