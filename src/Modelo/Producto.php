<?php
namespace App\Modelo;

class Producto
{
    private $id;
    private $nombre;
    private $nombreCorto;
    private $pvp;
    private $familia;
    private $descripcion;

    public function __construct(string $nombre = null, string $nombreCorto = null, string $descripcion = null, float $pvp = null, string $familia = null)
    {
        if (!is_null($nombre)) {
            $this->nombre = $nombre;
        }
        if (!is_null($nombreCorto)) {
            $this->nombreCorto = $nombreCorto;
        }
        if (!is_null($descripcion)) {
            $this->descripcion = $descripcion;
        }
        if (!is_null($pvp)) {
            $this->pvp = $pvp;
        }
        if (!is_null($familia)) {
            $this->familia = $familia;
        }
    }

    public function getId(): string {
        return $this->id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getNombreCorto(): string {
        return $this->nombre_corto;
    }

    public function getPvp(): float {
        return $this->pvp;
    }

    public function getFamilia(): string {
        return $this->familia;
    }

    public function getDescripcion(): string {
        return $this->descripcion;
    }

    public function setId(string $id): void {
        $this->id = $id;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function setNombreCorto(string $nombreCorto): void {
        $this->nombreCorto = $nombreCorto;
    }

    public function setPvp(float $pvp): void {
        $this->pvp = $pvp;
    }

    public function setFamilia(string $familia): void {
        $this->familia = $familia;
    }

    public function setDescripcion(string $descripcion): void {
        $this->descripcion = $descripcion;
    }

}

