<?php
namespace Forumdash\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Config
 *
 * @ORM\Table(name="config")
 * @ORM\Entity
 */
class Config
{
	
	public function __construct()
    {
    }
	
	
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
     * @ORM\Column(name="VariableName", type="string", length=20, nullable=false)
     */
    private $variablename;

    /**
     * @var string
     *
     * @ORM\Column(name="Value", type="string", length=50, nullable=false)
     */
    private $value;



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
     * Set variablename
     *
     * @param string $variablename
     * @return Config
     */
    public function setVariablename($variablename)
    {
        $this->variablename = $variablename;
    
        return $this;
    }

    /**
     * Get variablename
     *
     * @return string 
     */
    public function getVariablename()
    {
        return $this->variablename;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Config
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }
}