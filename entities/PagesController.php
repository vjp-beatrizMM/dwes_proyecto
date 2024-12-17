<?php

namespace proyecto\entities;

class PagesController{ 

    public function index(){
        $imagenRepositorio = new ImagenGaleriaRepositorio();
        $imagenes = $imagenRepositorio->findAll();
        $categoriaRepositorio = new CategoriaRepositorio();
        $categoria = $categoriaRepositorio->findAll();
        $asociadoRepositorio = new AsociadoRepositorio();
        $asociado = $asociadoRepositorio->findAll();

    }






}