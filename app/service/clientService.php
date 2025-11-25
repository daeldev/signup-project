<?php

// Importa conexão e model
require_once __DIR__ . '/../core/database.php';
require_once __DIR__ . '/../model/client.php';

class ClientService {

    // Variável que guarda a conexão PDO
    private $db;

    // Construtor público (para o controller poder instanciar)
    public function __construct() {

        // Obtém instância da classe database (padrão Singleton)
        // getInstance() → retorna sempre a mesma conexão
        $this->db = database::getInstance()->getConnection();
    }

    // Método responsável por criar um cliente no banco
    public function create(Client $client) {

        try {

            // SQL com parâmetros nomeados
            $sql = "INSERT INTO client (first_name, last_name, email, password)
                    VALUES (:first_name, :last_name, :email, :password)";

            // Prepara o SQL para evitar SQL Injection
            $stmt = $this->db->prepare($sql);

            // Vincula valores aos parâmetros da query
            $stmt->bindValue(':first_name', $client->getFirstName());
            $stmt->bindValue(':last_name', $client->getLastName());
            $stmt->bindValue(':email', $client->getEmail());
            $stmt->bindValue(':password', $client->getPassword());

            // Executa a query
            $success = $stmt->execute();

            // Retorna resposta padronizada para o controller
            return [
                'success' => $success,
                'error' => null
            ];

        } catch (PDOException $e) {

            // Em caso de erro, retorna mensagem estruturada
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}
