<?php
require_once 'entities/database/IEntity.class.php';

//Creamos la clase categoría con la implementación de la intefaz IEntity
class Categoria implements IEntity
{
    //Atributos
    private $id;
    private $nombre;
    private $numImagenes;

    //Constructor, inicializamos los atributos con valores por defecto
    public function __construct(string $nombre = '', int $numImagenes = 0)
    {
        $this->nombre = $nombre;
        $this->numImagenes = $numImagenes;
    }


    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of NumImagenes
     */
    public function getNumImagenes()
    {
        return $this->numImagenes;
    }

    /**
     * Set the value of NumImagenes
     * @return  self
     */
    public function setNumImagenes(int $numImagenes)
    {
        $this->numImagenes = $numImagenes;
        return $this;
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

    //
    public function toArray(): array
    {
        return [
            'id'=>$this->getId(),
            'nombre'=>$this->getNombre(),
            'numImagenes'=>$this->getNumImagenes()
        ];
    }
}

?>