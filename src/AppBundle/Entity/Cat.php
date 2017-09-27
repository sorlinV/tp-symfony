<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cat
 *
 * @ORM\Table(name="cat")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CatRepository")
 */
class Cat
{
    /**
    * @ORM\ManyToMany(targetEntity="Chien", inversedBy="Cat", cascade={"persist"})
    * @ORM\JoinTable(name="Chien_tags")
    */
    private $chiens;

    public function __construct()
    {
        $this->chiens = new ArrayCollection();
    }

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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="master", type="string", length=255)
     */
    private $master;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="mouseKilled", type="integer")
     */
    private $mouseKilled;


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
     * Set name
     *
     * @param string $name
     *
     * @return Cat
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Cat
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Cat
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set master
     *
     * @param string $master
     *
     * @return Cat
     */
    public function setMaster($master)
    {
        $this->master = $master;

        return $this;
    }

    /**
     * Get master
     *
     * @return string
     */
    public function getMaster()
    {
        return $this->master;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Cat
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set mouseKilled
     *
     * @param integer $mouseKilled
     *
     * @return Cat
     */
    public function setMouseKilled($mouseKilled)
    {
        $this->mouseKilled = $mouseKilled;

        return $this;
    }

    /**
     * Get mouseKilled
     *
     * @return int
     */
    public function getMouseKilled()
    {
        return $this->mouseKilled;
    }

    /**
     * Add chien
     *
     * @param \AppBundle\Entity\Tag $chien
     *
     * @return Cat
     */
    public function addChien(\AppBundle\Entity\Tag $chien)
    {
        $this->chiens[] = $chien;

        return $this;
    }

    /**
     * Remove chien
     *
     * @param \AppBundle\Entity\Tag $chien
     */
    public function removeChien(\AppBundle\Entity\Tag $chien)
    {
        $this->chiens->removeElement($chien);
    }

    /**
     * Get chiens
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChiens()
    {
        return $this->chiens;
    }
}
