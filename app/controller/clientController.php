<?php

require_once __DIR__ . '/../service/ClientService.php';
require_once __DIR__ . '/../model/Client.php';

class ClientController{

    private $service;

    // Construtor que inicializa o service
    public function __construct() {
        $this->service = new ClientService();
    }

    // Método responsável por registrar um cliente
    public function registerClient(): array{
        try{
            
            // Captura o JSON vindo do js
            $data = json_decode(file_get_contents("php://input"), true);

            // Se o JSON não vier
            if(!$data){
                return [
                    'success' => false,
                    'error' => 'Invalid JSON received'
                ];
            }

            // Cria o model client com os dados recebidos no JSON
            $client = new Client(
                $data['firstName'],
                $data['lastName'],
                $data['email'],
                $data['password']
            );

            // Chama o service e envia o model para o método create
            return $this->service->create($client);

        } catch(Exception $e){
            return [
                    'success' => false,
                    'error' => $e->getMessage()
            ];
        }
    }
}