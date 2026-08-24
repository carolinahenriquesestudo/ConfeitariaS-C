<?php
session_start();
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $perfil_selecionado = $_POST['perfil'] ?? '';

   
    if (empty($usuario) || empty($senha) || empty($perfil_selecionado)) {
        echo "<script>alert('Por favor, preencha todos os campos!'); window.location.href='index.html';</script>";
        exit();
    }


    $stmt = $conn->prepare("SELECT id, nome, usuario, senha, perfil FROM usuario WHERE usuario = ? AND perfil = ?");
    $stmt->bind_param("ss", $usuario, $perfil_selecionado);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        // Validação da senha
        if ($senha === $user['senha']) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nome'] = $user['nome'];
            $_SESSION['usuario_email'] = $user['usuario'];
            $_SESSION['perfil'] = $user['perfil'];

          
            switch ($user['perfil']) {
                case 'administrador':
                    header("Location: AdministradorPagina.html");
                    break;

                case 'confeiteiro':
                    header("Location: ConfeiteiroPagina.html");
                    break;

                case 'entregador':
                    header("Location: EntregadorPagina.html");
                    break;

                default:
                    header("Location: ConfeitariaS&C.html");
                    break;
            }
            exit();
        } else {
            echo "<script>alert('Senha incorreta!'); window.location.href='ConfeitariaS&C.html';</script>";
        }
    } else {
        echo "<script>alert('Usuário ou perfil não encontrado!'); window.location.href='ConfeitariaS&C.html';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>