<?php
require_once 'exceptions/FileException.class.php';
require_once 'utils/strings.php';
class File {
    private $file; //Fichero que se subirá al servidor, contendrá los atributos guardados en la variable global $_FILES
    private $fileName; //Nombre del fichero a la subida

    /**
     * @param $fileName nombre del fichero
     * @param $arrTypes array con los tipos de ficheros aceptados
     * @throws FileException
     */
    public function __construct(string $fileName, array $arrTypes)
    {

        $this->file = $_FILES[$fileName]; //Obtenemos el nombre del archivo a través de la variable global $_FILES (la clave es el atributo name)
        $this->fileName = ''; //Asiganamos string vacío para posteriormente almacenar el nombre del archivo

        //Comprobamos que el array $_FILES contiene el fichero
        if (!isset($this->file)) {

            //Si no, mostramos el error: No se ha encontrado el archivo
            throw new FileException(ERROR_STRINGS[UPLOAD_ERR_NO_FILE]);
        }

        //Si el valor en $this->file['error'] no es UPLOAD_ERR_OK (No hay ningún error), esq que ha habido algún problema, se lanza una excepción.
        if ($this->file['error'] !== UPLOAD_ERR_OK){

            throw new FileException(ERROR_STRINGS[$this->file['error']]);

            // switch ($this->file['error']) {
            //     case UPLOAD_ERR_INI_SIZE:
            //     case UPLOAD_ERR_FORM_SIZE:{
            //         throw new FileException('El fichero es demasiado grande');
            //         break;
            //     }
            //     case UPLOAD_ERR_PARTIAL:{
            //         throw new FileException('No se ha poddo subir el fichero completo');
            //         break;
            //     }       
            //     default:{
            //         throw new FileException('No se ha podido subir el fichero');
            //         break;
            //     }
            // }
        }

        //Validamos el tipo de archivo
        if (in_array($this->file['type'], $arrTypes) === false) {

            //Si no, nos manda un error de tipo no soportado
            throw new FileException(ERROR_STRINGS[UPLOAD_ERR_EXTENSION]);
            
        }
    }

    //Una vez procesado, retornamos el nombre del archivo
    public function getFileName()
    {
        return $this->fileName;
    }

    //Guardamos el archivo subido en el servidor en la ubicación específica. 
    /**
     * @param string $rutaDestino donde se almacenará el archivo subidoç
     * @throws FileException lanza la excepcion
     */
    public function saveUploadFile(string $rutaDestino) {

        // Verifica que el archivo haya sido subido mediante una solicitud POST
        // No se puede usar el método GET para enviar ficheros
        if (!is_uploaded_file($this->file['tmp_name'])) {

            //Si no, manda un error
            throw new FileException('El archivo no se ha subido mediante el formulario');
        }
   
        //Mediante pathinfo separamos el nombre base de la extension
        $nombreBase = pathinfo($this->file['name'], PATHINFO_FILENAME); //Este sirve para extraer el nombre
        $extension = pathinfo($this->file['name'], PATHINFO_EXTENSION); //Este sirve para extraer la extension
       
     
        $contador = 1; //Creamos un contador para añadir al nombre de la imagen si su nombre ya existe
        $ruta = $rutaDestino . $this->file['name']; //Ruta
   
        //Si el archivo ya existe, añade el contador despues del nombre para evitar sobreescrituras
        while (file_exists($ruta)) {

            $this->fileName = $nombreBase . "_$contador." . $extension;
            $ruta = $rutaDestino . $this->fileName;
            $contador++;
        }

        //Si no existía, usa el nombre original
        if ($contador === 1) {

            $this->fileName = $this->file['name'];
        }
   
        //Finalmente guardamos el archivo en el servidor
        if (!move_uploaded_file($this->file['tmp_name'], $ruta)) {

            //Si falla, lanza una excepción
            throw new FileException(ERROR_STRINGS[ERROR_MV_UP_FILE]);
        }
    }
   
    /**
     * @param string $rutaOrigen
     * @param string $rutaDestino
     * @throws FileException
     */
    public function copyFile (string $rutaOrigen,string $rutaDestino){

        $origen = $rutaOrigen.$this->fileName;
        $destino = $rutaDestino.$this->fileName;
        
        //Comprobamos si el archivo de origen existe
        if(is_file($origen) === false){

            //Si no, lanza una excepción
            throw new FileException("No existe el fichero $origen que intentas copiar");
        }


        //Verificamos si el archivo de destino ya existe para evitar sobeescrituras
        if(is_file($destino) === true){

            //Si existe, lanza una excepción
            throw new FileException("El fichero $destino ya existe y no se puede sobreescribir");
        }


        //Usamos la funcion copy para realizar la copia del archivo de origen al destino
        if(copy($origen, $destino) === false){

            //Si falla, lanza una excepción.
            throw new FileException("No se ha podido copiar el fichero $origen a $destino");
        }
    }
   
}
