<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Portatil
 *
 * @ORM\Table(name="portatil")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PortatilRepository")
 */
class Portatil
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
     * @ORM\Column(name="codigo", type="string", length=255)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=255)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="aula", type="string", length=255)
     */
    private $aula;

    /**
     * Un portatil tiene muchos alumnos
     * @ORM\OneToMany(targetEntity="Alumno", mappedBy="portatil")
     */
    private $alumnos;

    public function __construct() {
        $this->alumnos = new ArrayCollection();
    }

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
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Portatil
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set marca
     *
     * @param string $marca
     *
     * @return Portatil
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set aula
     *
     * @param string $aula
     *
     * @return Portatil
     */
    public function setAula($aula)
    {
        $this->aula = $aula;

        return $this;
    }

    /**
     * Get aula
     *
     * @return string
     */
    public function getAula()
    {
        return $this->aula;
    }

    /**
     * Add alumno
     *
     * @param \AppBundle\Entity\Alumno $alumno
     *
     * @return Portatil
     */
    public function addAlumno(\AppBundle\Entity\Alumno $alumno)
    {
        $this->alumnos[] = $alumno;

        return $this;
    }

    /**
     * Remove alumno
     *
     * @param \AppBundle\Entity\Alumno $alumno
     */
    public function removeAlumno(\AppBundle\Entity\Alumno $alumno)
    {
        $this->alumnos->removeElement($alumno);
    }

    /**
     * Get alumnos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAlumnos()
    {
        return $this->alumnos;
    }
    public function __toString()
    {
        return $this->codigo;
    }

}
