<?php
class Database
{
    private $host = 'bx7loncqi8vnyihpduqt-mysql.services.clever-cloud.com';
    private $db = 'bx7loncqi8vnyihpduqt';
    private $user = 'ufzywigq33rdmmaz';
    private $pass = 'KjAdkfSUTAkvidNV9YdA';

    function conectar(){
        try{
            $conexion = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
            if (mysqli_connect_errno()) {
                throw new Exception("Error de conexión: " . mysqli_connect_error());
            }
            return $conexion;
        } catch(Exception $e){
            echo 'Error conexion: ' .$e->getMessage();
            exit;
        }
    }
    function insertarDatos($nombre, $email, $asunto, $mensage) {
        try {
            $conn = $this->conectar();

            $sql = "INSERT INTO Solicitudes (name, email, subject, message) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $nombre, $email, $asunto, $mensage);

            $stmt->execute();

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

// Crear una instancia de la clase Database
$db = new Database();

// Insertar datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["name"];
    $email = $_POST["email"];
    $asunto = $_POST["subject"];
    $mensage = $_POST["message"];

    if ($db->insertarDatos($nombre, $email, $asunto, $mensage)) {
        $notificacion= 'Envio exitoso';
        echo json_encode(['notificacion' => $notificacion]);
;
    } else {
        $notificacion= 'Envio Fallido';
        echo json_encode(['notificacion' => $notificacion]);

    }
}