<?php

class Usuarios_model extends CI_Model
{
    
    public function salva($usuario)
    {
        $this->db->insert('usuarios', $usuario);
    }
    
    public function busca_por_email_senha($email, $senha)
    {
        $this->db->where('email', $email);
        $this->db->where('senha', $senha);
        return $this->db->get('usuarios')->row_array(); // Retorna a peimeira linha encontrada.
    }
    
    public function busca($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('usuarios')->row_array(); // Retorna a peimeira linha encontrada.
    }
}