<?php
namespace Forumdash\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Proxies
 *
 * @ORM\Table(name="proxies")
 * @ORM\Entity
 */
class Proxies
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Proxy", type="string", length=25, nullable=false)
     */
    private $proxy;

    /**
     * @var integer
     *
     * @ORM\Column(name="Active", type="integer", nullable=false)
     */
    private $active;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set proxy
     *
     * @param string $proxy
     * @return Proxies
     */
    public function setProxy($proxy)
    {
        $this->proxy = $proxy;
    
        return $this;
    }

    /**
     * Get proxy
     *
     * @return string 
     */
    public function getProxy()
    {
        return $this->proxy;
    }

    /**
     * Set active
     *
     * @param integer $active
     * @return Proxies
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return integer 
     */
    public function getActive()
    {
        return $this->active;
    }
}