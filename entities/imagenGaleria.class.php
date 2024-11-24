<?php
require_once 'entities/database/IEntity.class.php';

class ImagenGaleria implements IEntity
{

    //Declaramos constantes con las rutas de las imágenes
    const RUTA_IMAGENES_PORTAFOLIO = 'images/index/portfolio/';
    const RUTA_IMAGENES_GALLERY = 'images/index/gallery/';

    //Declaramos atributos de la clase, relacionados con las imágenes
    private $nombre;
    private $descripcion;
    private $numVisualizaciones;
    private $numLikes;
    private $numDownloads;
    private $id;
    private $categoria;

    //Inicializamos los atributos con valores por defecto
    public function __construct(string $nombre = '', string $descripcion = '', int $categoria = 0, int $numVisualizaciones = 0, int $numLikes = 0, int $numDownloads = 0)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
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
     * Get the value of descripcion
     */ 
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     * @return  self
     */ 
    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    /**
     * Set the value of categoria
     * @return  self
     */ 
    public function setCategorai(int $categoria): void
    {
        $this->categoria = $categoria;
    }

    /**
     * Get the value of categoria
     */
    public function getCategoria(): int
    {
        return $this->categoria;
    }

    /**
     * Get the value of numVisualizaciones
     */ 
    public function getNumVisualizaciones(): int
    {
        return $this->numVisualizaciones;
    }


    public function setNumVisualizaciones(int $numVisualizaciones): void
    {
        $this->numVisualizaciones = $numVisualizaciones;
    }

    /**
     * Set the value of numVisualizaciones
     * @return  self
     */ 
    public function getNumLike(): int
    {
        return $this->numLikes;
    }

    /**
     * Set the value of numLikes
     * @return  self
     */ 
    public function setNumLike(int $numLikes): void
    {
        $this->numLikes = $numLikes;
    }

    /**
     * Get the value of numDownloads
     */ 
    public function getNumDownloads(): int
    {
        return $this->numDownloads;
    }

    /**
     * Set the value of numDownloads
     * @return  self
     */ 
    public function setNumDownloads(int $numDownloads): void
    {
        $this->numDownloads = $numDownloads;
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

    //Estructuramos los datos del objeto ImagenGaleria en un array asociativo para facilitar las operaciones con la BD
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'descripcion' => $this->getDescripcion(),
            'categoria' => $this->getCategoria(),
            'numVisualizaciones' => $this->getNumVisualizaciones(),
            'numLikes' => $this->getNumLike(),
            'numDownloads' => $this->getNumDownloads()
        ];
    }

    //Función pra generar la URL de las imágenes en el portfolio
    public function getUrlPortfolio(): string
    {
        return self::RUTA_IMAGENES_PORTAFOLIO . $this->getNombre();
    }

    //Función pra generar la URL de las imágenes en la galería
    public function getUrlGallery(): string
    {
        return self::RUTA_IMAGENES_GALLERY . $this->getNombre();
    }
}
