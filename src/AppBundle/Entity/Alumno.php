<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alumno
 *
 * @ORM\Table(name="alumno")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AlumnoRepository")
 */
class Alumno
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var int
     *
     * @ORM\Column(name="edad", type="integer")
     */
    private $edad;

    /**
     * @var int
     *
     * @ORM\Column(name="curso", type="integer")
     */
    private $curso;

    /**
     * Un alumno tiene un expediente
     * @ORM\OneToOne(targetEntity="Expediente", mappedBy="alumno")
     */
    private $expediente;

    /**
     * Muchos alumnos tienen un portatil
     * @ORM\ManyToOne(targetEntity="Portatil", inversedBy="alumnos")
     * @ORM\JoinColumn(name="portatil_id", referencedColumnName="id")
     */
    private $portatil;
    

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Alumno
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     *
     * @return Alumno
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return int
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set curso
     *
     * @param integer $curso
     *
     * @return Alumno
     */
    public function setCurso($curso)
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * Get curso
     *
     * @return int
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Set expediente
     *
     * @param \AppBundle\Entity\Expediente $expediente
     *
     * @return Alumno
     */
    public function setExpediente(\AppBundle\Entity\Expediente $expediente = null)
    {
        $this->expediente = $expediente;

        return $this;
    }

    /**
     * Get expediente
     *
     * @return \AppBundle\Entity\Expediente
     */
    public function getExpediente()
    {
        return $this->expediente;
    }
    public function __toString(){
        return $this->nombre;
    }

    /**
     * Set portatil
     *
     * @param \AppBundle\Entity\Portatil $portatil
     *
     * @return Alumno
     */
    public function setPortatil(\AppBundle\Entity\Portatil $portatil = null)
    {
        $this->portatil = $portatil;

        return $this;
    }

    /**
     * Get portatil
     *
     * @return \AppBundle\Entity\Portatil
     */
    public function getPortatil()
    {
        return $this->portatil;
    }
}
