<?php
    require_once 'entities/database/IEntity.class.php';

    Class ImagenGaleria implements IEntity {

        const rutaImagenesPortfolio = 'images/index/portfolio/';
        const rutaImagenesGallery = 'images/index/gallery/';

        private $nombre;
        private $descripcion;
        private $numVisualizaciones;
        private $numLikes;
        private $numDownloads;
        private $id;
        private $categoria;

        public function __construct(string $nombre='', string $descripcion='', int $categoria=0, int $numVisualizaciones=0, int $numLikes=0, int $numDownloads=0)
        {
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->categoria = $categoria;
            $this->numVisualizaciones = $numVisualizaciones;
            $this->numLikes = $numLikes;
            $this->numDownloads = $numDownloads;
            $this->id = null;
        }

        public function getNombre() : string{
            return $this->nombre;
        }

        public function setNombre(string $nombre) : void{
            $this->nombre = $nombre;
        }

        public function getDescripcion() : string{
            return $this->descripcion;
        }

        public function setDescripcion(string $descripcion) : void{
            $this->descripcion = $descripcion;
        }

        public function setCategorai(int $categoria) : void{
            $this->categoria = $categoria;
        }

        public function getCategoria() : int{
            return $this->categoria;
        }
        
        public function getNumVisualizaciones() : int{
            return $this->numVisualizaciones;
        }

        public function setNumVisualizaciones(int $numVisualizaciones) : void{
            $this->numVisualizaciones = $numVisualizaciones;
        }

        
        public function getNumLike() : int{
            return $this->numLikes;
        }

        public function setNumLike(int $numLikes) : void{
            $this->numLikes = $numLikes;
        }

        
        public function getNumDownloads() : int{
            return $this->numDownloads;
        }

        public function setNumDownloads(int $numDownloads) : void{
            $this->numDownloads = $numDownloads;
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function toArray(): array{
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

        public function getUrlPortfolio():string{
            return self::rutaImagenesPortfolio.$this->getNombre();
        }

        public function getUrlGallery():string{
            return self::rutaImagenesGallery.$this->getNombre();
        }

    }

?>