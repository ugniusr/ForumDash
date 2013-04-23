<?php
namespace Forumdash\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Responses
 *
 * @ORM\Table(name="responses")
 * @ORM\Entity
 */
class Responses
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
     * @ORM\Column(name="Response", type="text", nullable=true)
     */
    private $response;

    /**
     * @var string
     *
     * @ORM\Column(name="ResponseGroup", type="string", length=150, nullable=false)
     */
    private $responsegroup;

    /**
     * @var integer
     *
     * @ORM\Column(name="RespGrSpecSequence", type="integer", nullable=true)
     */
    private $respgrspecsequence;

    /**
     * @var integer
     *
     * @ORM\Column(name="LanguageId", type="integer", nullable=true)
     */
    private $languageid;



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
     * Set response
     *
     * @param string $response
     * @return Responses
     */
    public function setResponse($response)
    {
        $this->response = $response;
    
        return $this;
    }

    /**
     * Get response
     *
     * @return string 
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set responsegroup
     *
     * @param string $responsegroup
     * @return Responses
     */
    public function setResponsegroup($responsegroup)
    {
        $this->responsegroup = $responsegroup;
    
        return $this;
    }

    /**
     * Get responsegroup
     *
     * @return string 
     */
    public function getResponsegroup()
    {
        return $this->responsegroup;
    }

    /**
     * Set respgrspecsequence
     *
     * @param integer $respgrspecsequence
     * @return Responses
     */
    public function setRespgrspecsequence($respgrspecsequence)
    {
        $this->respgrspecsequence = $respgrspecsequence;
    
        return $this;
    }

    /**
     * Get respgrspecsequence
     *
     * @return integer 
     */
    public function getRespgrspecsequence()
    {
        return $this->respgrspecsequence;
    }

    /**
     * Set languageid
     *
     * @param integer $languageid
     * @return Responses
     */
    public function setLanguageid($languageid)
    {
        $this->languageid = $languageid;
    
        return $this;
    }

    /**
     * Get languageid
     *
     * @return integer 
     */
    public function getLanguageid()
    {
        return $this->languageid;
    }
}