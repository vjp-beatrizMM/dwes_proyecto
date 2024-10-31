<?php
// require
    class File {

        private $file;
        private $fileName;

        public function __construct(string $fileName, array $arrTypes)
        {
            //con $fielName obtendremso el fichero medainte el array $_FILES que contiene
            //todo los ficheros que se suben al servidor mediante un formulario
            $this->file = $_FILES[$fileName];
            $this->fileName = '';

            //Comprobamos que es array contiene el fichero
            if (!isset($this->file)){
            
            }

            //Verificamos si ha habido un error durante lasubida del fichero
            if($this->file['error'] !== UPLOAD_ERR_OK){

                //Dentro del if verificamos de que tipo ha sido el error
                switch ($this->file['error']){
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:{

                        //Algún problema con el tamaño del fichero
                        break;
                    }
                    case UPLOAD_ERR_PARTIAL:{

                        //Error en la transferencia -subida incomp`leta
                        break;
                    }
                    default:{

                        //Error en lasubida delfichero
                        break;
                    }
                }
            } 

            //Comporbamos si elfichero subido es de un tipo delos que tenemos soportado
            if(in_array($this->file['type'], $arrTypes)===false){
                //Error tipo no soportado
            }
        }

        


        public function getFilename() : string{
            return $this->fileName;
        }

    }

?>