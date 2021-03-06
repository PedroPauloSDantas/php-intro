<?php

session_start();

$categorias = [];
$categorias[] = 'infantil';
$categorias[] = 'adolescente';
$categorias[] = 'adulto';

$nome = $_POST['nome'];
$idade = $_POST['idade'];

if(empty($nome))
{
    $_SESSION['mensagem-de-erro'] = 'O nome não pode ser vazio. Por favor, preencha-o novamente.';
    header('location: index.php');
    return;
}
else if(strlen($nome) < 3)
{
    $_SESSION['mensagem-de-erro'] = 'O nome deve ter mais de 3 caracteres';
    header('location: index.php');
    return;
}
else if(strlen($nome) > 40)
{
    $_SESSION['mensagem-de-erro'] = 'Nome é muito extenso';
    header('location: index.php');
    return;
}
else if(!is_numeric($idade))
{
    $_SESSION['mensagem-de-erro'] = 'Informe um número para idade';
    header('location: index.php');
    return;
}
if($idade >= 6 && $idade <= 12 )
{
    for($i = 0; $i <= count($categorias); $i++)
    {
        if($categorias[$i] == 'infantil')
        {
            $_SESSION['mensagem-de-sucesso'] = "O nadador ".$nome. " compete na categoria ".$categorias[$i]; 
            header('location: index.php');
            return;
        }
    } 
}
else if($idade >= 13 && $idade <= 18)
{
    for($i = 0; $i <= count($categorias); $i++)
    {
        if($categorias[$i] == 'adolescente')
        {
            $_SESSION['mensagem-de-sucesso'] = "O nadador ".$nome. " compete na categoria adolescente.";
            header('location: index.php');
            return;
        }
    }   
}
else
{
    for($i = 0; $i <= count($categorias); $i++)
    {
        if($categorias[$i] == 'adulto')
        {
            $_SESSION['mensagem-de-sucesso'] =  "O nadador ".$nome. " compete na categoria adulto.";
            header('location: index.php');
            return;
        } 
    } 
}
?>