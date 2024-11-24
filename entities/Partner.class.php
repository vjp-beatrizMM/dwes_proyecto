<?php

require_once 'database/IEntity.class.php';

class Partner implements IEntity {

    //Definimos consante con la ruta de las imágenes
    const RUTA_IMAGENES_GALLERY = 'images/index/gallery/';

    //Definimos las variables de la clase
    private $nombre;
    private $logo;
    private $descripcion;
    private $id;


    /**
     * Constructor de la clase
     * @param $nombre, $logo, $descripción, los inicializamos vacíos por defecto
     */
    public function __construct($nombre = '', $logo = '', $descripcion = '') {
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;
    }

    /**
     * Método toArray, Cumple con la interfaz IEntity que implementa la clase
     * Para serializar datos y trabajar con la base de datos
     */
    public function toArray(): array{
        return [
            'nombre' => $this->nombre,
            'logo' => $this->logo,
            'descripcion' => $this->descripcion
        ];
    }

    /**
     * Get the value of UrlLogo
     */
    public function getUrlLogo() {
        return self::RUTA_IMAGENES_GALLERY . $this->logo;
    }

    /**
     * Get the value of Id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Get the value of logo
     */
    public function getLogo() {
        return $this->logo;
    }

    /**
     * Get the value of descripción
     */
    public function getDescripcion() {
        return $this->descripcion;
    }
}