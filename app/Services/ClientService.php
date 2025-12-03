<?php

namespace App\Services;

use App\Models\Client; // Importa o model Client
use Illuminate\Support\Facades\Hash; // Importa o hash do laravel
use Illuminate\Support\Facades\Log; // Importa o logger

class ClientService
{
    // Método para criar cliente que recebe e retorna uma array
    public function create(array $data): array
    {
        // Inicia o try para tratar exceções
        try {
            // Armazena o password hashed
            $data['password'] = Hash::make($data['password']);

            // Cria o client usando a ORM Eloquent e armazena a resposta
            $client = Client::create($data);

            return [
                // Retorna a resposta estruturada
                'success' => true,
                'data' => $client,
                'error' => null,
            ];
        } catch (\Exception $e) {
            // Captura qualquer erro, registra e exibe
            Log::error('error creating client: ' . $e->getMessage());

            // Retorna o erro estruturado
            return [
                'success' => false,
                'data' => null,
                'error' => $e->getMessage(),
            ];
        }
    }
}
