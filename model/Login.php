<?php
class Login extends Conectar
{
    public function login()
    {
        $conectar = $this->Conexion(); // Obtener la conexión usando el método de la clase base
        if (isset($_POST["enviar"])) {
            $codigoUsuario = $_POST["codigoUsuario"];
            $passwordUsuario = $_POST["passwordUsuario"];
            if (empty($codigoUsuario) || empty($passwordUsuario)) {
                header("Location:" . Conectar::ruta() . "index.php?m=2");
                exit();
            } else {
                $sql = "SELECT * FROM Seguridad.Usuarios WHERE codigoUsuario = ? AND passwordUsuario = ? AND isActivo = 1 ";
                $stmt = $conectar->prepare($sql);
                $stmt->bindValue(1, $codigoUsuario);
                $stmt->bindValue(2, $passwordUsuario);
                $stmt->execute();
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($resultado) {
                    $_SESSION["idUsuario"] = $resultado["idUsuario"];
                    $_SESSION["codigoUsuario"] = $resultado["codigoUsuario"];
                    $_SESSION["nombreUsuario"] = $resultado["nombreUsuario"];
                    $_SESSION["isActivo"] = $resultado["isActivo"];
                    $sql = "UPDATE Seguridad.Usuarios SET ultimaConexion = GETDATE() WHERE idUsuario = " . $_SESSION["idUsuario"];
                    $stmt = $conectar->prepare($sql);
                    $stmt->execute(); // Ejecutar la consulta de actualización
                    header("Location:" . Conectar::ruta() . "view/Home/");
                    exit();
                } else {
                    header("Location:" . Conectar::ruta() . "index.php?m=1");
                    exit();
                }
            }
        }
    }
}
