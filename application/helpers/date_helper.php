<?php

/*  ******AULA 15 (https://www.alura.com.br/course/codeigniter-avancado/section/6)****** */
function data_PtBr_para_mysql($data)
{
    $partes = explode('/', $data);
    return "{$partes[2]}-{$partes[1]}-{$partes[0]}";
}

/*  ******AULA 17 (https://www.alura.com.br/course/codeigniter-avancado/section/8)****** */
function data_mysql_para_PtBr($data)
{
    $data = new DateTime($data);
    return $data->format("d/m/Y");
}