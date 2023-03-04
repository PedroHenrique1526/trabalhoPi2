<?php
require_once("Conexao.php");
class Usuario
{
    public $email;
    public $senha;
    private $nome;
    private $idade;
    private $jogou;
    private $suges;
    private $sexo;

    public function __construct()
    {
    }

    public function updateUsuario($email, $senha, $coluna, $valor)
    {
        $bancoDeDados = new Conexao;
        $bancoDeDados->connect();

        $resultado = $bancoDeDados->executarQuery("UPDATE usuarios SET $coluna = '$valor' WHERE email = '$email' AND senha = '$senha'");
        return $resultado;
    }

    public function deleteUsuario($id)
    {
        $bancoDeDados = new Conexao;
        $bancoDeDados->connect();

        $resultado = $bancoDeDados->executarQuery("DELETE FROM usuarios WHERE usuarios.id = '$id'");
        return $resultado;
    }

    public function setarDados($email, $senha, $nome, $idade, $sexo, $jogou, $suges)
    {
        $this->email = $email;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->idade = $idade;
        $this->jogou = $jogou;
        $this->suges = $suges;
        $this->sexo = $sexo;
    }

    public function atualizar($id)
    {
        $bancoDeDados = new Conexao;
        $bancoDeDados->connect();

        $bancoDeDados->executarQuery("UPDATE usuarios SET email = '$this->email', senha = '$this->senha', nome = '$this->nome', idade = $this->idade, sexo = '$this->sexo', jogou = '$this->jogou', suges = '$this->suges' WHERE usuarios.id = $id");
    }

    public function adicionar()
    {
        try {
            $bancoDeDados = new Conexao;
            $bancoDeDados->connect();

            $bancoDeDados->executarQuery("INSERT INTO usuarios (email, senha, nome, idade, sexo, jogou, suges) VALUES ('$this->email', '$this->senha',  '$this->nome', $this->idade, '$this->sexo', '$this->jogou', '$this->suges')");

            return true;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    public  function select_perfil($email)
    {
        $bancoDeDados = new Conexao;
        $bancoDeDados->connect();
        $resultado = $bancoDeDados->executarQuery("SELECT * FROM usuarios WHERE email = '$email'");
        return $resultado;
    }

    public  function select_perfilID($id)
    {
        $bancoDeDados = new Conexao;
        $bancoDeDados->connect();
        $dados = $bancoDeDados->executarQuery("SELECT * FROM usuarios WHERE usuarios.id = '$id'");

        $i = 0;

        foreach ($dados as $dado) {
            $idd[$i] = $dado[0];
            $email[$i] = $dado[1];
            $senha[$i] = $dado[2];
            $nome[$i] = $dado[3];
            $idade[$i] = $dado[4];
            $sexo[$i] = $dado[5];
            $jogou[$i] = $dado[6];
            $suges[$i] = $dado[7];

            $usuarios[$i] = array($idd[$i], $email[$i], $senha[$i], $nome[$i], $idade[$i], $sexo[$i], $jogou[$i], $suges[$i]);

            $i++;
        }

        return $usuarios;
    }

    public function exibirTudo()
    {
        $bancoDeDados = new Conexao;
        $bancoDeDados->connect();
        $dados = $bancoDeDados->executarQuery("SELECT usuarios.id, usuarios.email, usuarios.senha, usuarios.nome, usuarios.idade, sexo.name, usuarios.jogou, usuarios.suges  FROM usuarios, sexo WHERE usuarios.sexo = sexo.id");
        $i = 0;

        foreach ($dados as $dado) {
            $id[$i] = $dado[0];
            $email[$i] = $dado[1];
            $senha[$i] = $dado[2];
            $nome[$i] = $dado[3];
            $idade[$i] = $dado[4];
            $sexo[$i] = $dado[5];
            $jogou[$i] = $dado[6];
            $suges[$i] = $dado[7];

            $usuarios[$i] = array($id[$i], $email[$i], $senha[$i], $nome[$i], $idade[$i], $sexo[$i], $jogou[$i], $suges[$i]);

            $i++;
        }

        return $usuarios;
    }

    public  function select_linhas()
    {
        $bancoDeDados = new Conexao;
        $bancoDeDados->connect();
        $resultado = $bancoDeDados->executarQuery("SELECT * FROM sexo");
        return $resultado;
    }

    public function verificarEmailUsuario($email, $id)
    {
        $bancoDeDados = new Conexao;
        $bancoDeDados->connect();

        $qr = $bancoDeDados->executarQuery("SELECT * FROM usuarios WHERE email = '$email' AND usuarios.id = '$id'");

        return $qr->fetchAll();
    }

    public function verificarEmail($email)
    {
        $bancoDeDados = new Conexao;
        $bancoDeDados->connect();

        $qr = $bancoDeDados->executarQuery("SELECT * FROM usuarios WHERE email = '$email'");

        return $qr->fetchAll();
    }

    public function login($email, $senha)
    {
        $bancoDeDados = new Conexao;
        $bancoDeDados->connect();

        $qr = $bancoDeDados->executarQuery("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");

        return $qr->fetchAll();
    }

    public function deletar($id)
    {
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function setIdade($idade)
    {
        $this->idade = $idade;
    }

    public function getJogou()
    {
        return $this->jogou;
    }

    public function setJogou($jogou)
    {
        $this->jogou = $jogou;
    }

    public function getSuges()
    {
        return $this->suges;
    }

    public function setSuges($suges)
    {
        $this->suges = $suges;
    }
}
