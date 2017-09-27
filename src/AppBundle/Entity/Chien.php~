<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chien
 *
 * @ORM\Table(name="chien")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChienRepository")
 */
class Chien
{
    /**
    * @ORM\ManyToMany(targetEntity="Cat", inversedBy="Chien", cascade={"persist"})
    * @ORM\JoinTable(name="Cat_tags")
    */
    private $cats;
    
        public function __construct()
        {
            $this->cats = new ArrayCollection();
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
     * @ORM\Column(name="race", type="string", length=255)
     */
    private $race;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="born", type="datetime")
     */
    private $born;

    /**
     * @var string
     *
     * @ORM\Column(name="weigth", type="string", length=255)
     */
    private $weigth;


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
     * @return Chien
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
     * Set race
     *
     * @param string $race
     *
     * @return Chien
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set born
     *
     * @param \DateTime $born
     *
     * @return Chien
     */
    public function setBorn($born)
    {
        $this->born = $born;

        return $this;
    }

    /**
     * Get born
     *
     * @return \DateTime
     */
    public function getBorn()
    {
        return $this->born;
    }

    /**
     * Set weigth
     *
     * @param string $weigth
     *
     * @return Chien
     */
    public function setWeigth($weigth)
    {
        $this->weigth = $weigth;

        return $this;
    }

    /**
     * Get weigth
     *
     * @return string
     */
    public function getWeigth()
    {
        return $this->weigth;
    }

    /**
     * Add cat
     *
     * @param \AppBundle\Entity\Tag $cat
     *
     * @return Chien
     */
    public function addCat(\AppBundle\Entity\Tag $cat)
    {
        $this->cats[] = $cat;

        return $this;
    }

    /**
     * Remove cat
     *
     * @param \AppBundle\Entity\Tag $cat
     */
    public function removeCat(\AppBundle\Entity\Tag $cat)
    {
        $this->cats->removeElement($cat);
    }

    /**
     * Get cats
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCats()
    {
        return $this->cats;
    }
}
