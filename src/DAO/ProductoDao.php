<?php

namespace App\DAO;

use \PDO;
use App\Modelo\Producto;

class ProductoDao {

    private $bd;

    function __construct($bd) {
        $this->bd = $bd;
    }

    function crea(Producto $producto): bool {
        
    }

    function modifica(Producto $producto): bool {
        
    }

    function elimina(string $productoId): bool {
        
    }

    /**
     * Recupera todos los objetos Producto
     * 
     * 
     * @returns array Producto con todos los productos almacenados
     */
    function recuperaTodo(): array {
        $this->bd->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
        $sql = "select * from productos order by nombre";
        $sth = $this->bd->prepare($sql);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Producto::class);
        $productos = $sth->fetchAll();
        return $productos;
    }

}
