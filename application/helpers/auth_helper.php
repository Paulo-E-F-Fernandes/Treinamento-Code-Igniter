<?php

function autorizar()
{
    $ci = get_instance();
    $usuario_logado = $ci->session->userdata('usuario_logado');
        
    if ( ! $usuario_logado) {
        $ci->session->set_flashdata("message", "Você precisa estar logado!");
        $ci->session->set_flashdata("type", "danger");
        redirect("/");
    }

    return $usuario_logado;
}