<?php
namespace Forumdash\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affiliateprograms
 *
 * @ORM\Table(name="affiliateprograms")
 * @ORM\Entity
 */
class Affiliateprograms
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
     * @ORM\Column(name="ProgramName", type="string", length=50, nullable=true)
     */
    private $programname;

    /**
     * @var string
     *
     * @ORM\Column(name="PreKeywordLinkPart", type="string", length=255, nullable=true)
     */
    private $prekeywordlinkpart;

    /**
     * @var string
     *
     * @ORM\Column(name="PostKeywordLinkPart", type="string", length=255, nullable=true)
     */
    private $postkeywordlinkpart;

    /**
     * @var string
     *
     * @ORM\Column(name="HomePageLink", type="string", length=255, nullable=true)
     */
    private $homepagelink;



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
     * Set programname
     *
     * @param string $programname
     * @return Affiliateprograms
     */
    public function setProgramname($programname)
    {
        $this->programname = $programname;
    
        return $this;
    }

    /**
     * Get programname
     *
     * @return string 
     */
    public function getProgramname()
    {
        return $this->programname;
    }

    /**
     * Set prekeywordlinkpart
     *
     * @param string $prekeywordlinkpart
     * @return Affiliateprograms
     */
    public function setPrekeywordlinkpart($prekeywordlinkpart)
    {
        $this->prekeywordlinkpart = $prekeywordlinkpart;
    
        return $this;
    }

    /**
     * Get prekeywordlinkpart
     *
     * @return string 
     */
    public function getPrekeywordlinkpart()
    {
        return $this->prekeywordlinkpart;
    }

    /**
     * Set postkeywordlinkpart
     *
     * @param string $postkeywordlinkpart
     * @return Affiliateprograms
     */
    public function setPostkeywordlinkpart($postkeywordlinkpart)
    {
        $this->postkeywordlinkpart = $postkeywordlinkpart;
    
        return $this;
    }

    /**
     * Get postkeywordlinkpart
     *
     * @return string 
     */
    public function getPostkeywordlinkpart()
    {
        return $this->postkeywordlinkpart;
    }

    /**
     * Set homepagelink
     *
     * @param string $homepagelink
     * @return Affiliateprograms
     */
    public function setHomepagelink($homepagelink)
    {
        $this->homepagelink = $homepagelink;
    
        return $this;
    }

    /**
     * Get homepagelink
     *
     * @return string 
     */
    public function getHomepagelink()
    {
        return $this->homepagelink;
    }
}