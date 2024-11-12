<?php
require_once 'entities/database/IEntity.class.php';

class Categoria implements IEntity
{
    //Atrubutos
    private $id;
    private $nombre;
    private $numImagenes;

    //Constructor

    public function __construct(string $nombre = '', int $numImagenes = 0)
    {
        $this->nombre = $nombre;
        $this->numImagenes = $numImagenes;
    }


    /**
     * Get the value of descripcion
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNumImagenes()
    {
        return $this->numImagenes;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNumImagenes(int $numImagenes)
    {
        $this->numImagenes = $numImagenes;

        return $this;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id)
    {
            $this->id = $id;

            return $this;
    }

    public function toArray(): array
    {
        return [
            'id'=> $this->getId(),
            'nombre'=> $this->getNombre(),
            'numImagenes'=> $this->getNumImagenes()
        ];
    }
}
