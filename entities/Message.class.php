<?php
require_once 'entities/database/IEntity.class.php';

class Message implements IEntity
{

    //Declaramos atributos de la clase, relacionados con las imágenes
    private $nombre;
    private $apellidos;
    private $asunto;
    private $email;
    private $texto;
    private $id;
    private $fecha;

    //Inicializamos los atributos con valores por defecto
    public function __construct (string $nombre = '', string $apellidos = '', string $asunto = "", string $email = "", string $texto = "")
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->asunto = $asunto;
        $this->email = $email;
        $this->texto = $texto;
        $this->fecha = date("Y-m-d"); 
        $this->id = null;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     * @return  self
     */ 
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * Get the value of apellidos
     */ 
    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     * @return  self
     */ 
    public function setApellidos(string $apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    /**
     * Set the value of asunto
     * @return  self
     */ 
    public function setAsunto(string $asunto): void
    {
        $this->asunto = $asunto;
    }

    /**
     * Get the value of asunto
     */
    public function getAsunto(): string
    {
        return $this->asunto;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail(): string
    {
        return $this->email;
    }


    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Set the value of texto
     * @return  self
     */ 
    public function getTexto(): string
    {
        return $this->texto;
    }

    /**
     * Set the value of texto
     * @return  self
     */ 
    public function setTexto(string $texto): void
    {
        $this->texto = $texto;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     * @return  self
     */ 
    public function setFecha(DateTime $fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    //Estructuramos los datos del objeto Message en un array asociativo para facilitar las operaciones con la BD
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'apellidos' => $this->getApellidos(),
            'asunto' => $this->getAsunto(),
            'email' => $this->getEmail(),
            'texto' => $this->getTexto(),
            'fecha' => $this->getFecha()
        ];
    }

    
}
