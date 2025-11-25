<?php

// Define o namespace da classe no padrão laravel
namespace App\Models;

// Importa a classe Model que já contem funcionalidades prontas
use Illuminate\Database\Eloquent\Model;

// Extende o Model, herdando todas as funcionalidades
class Client extends Model{

    // Define o nome da tabela associada ao bd
    protected $table = 'client';

    // Cria uma lista de atributos
    protected $fillable =[
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    // Esconde o password de respostas JSON
    protected $hidden =[
        'password',
    ];
}