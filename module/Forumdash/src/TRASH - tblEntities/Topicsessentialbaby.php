<?php

namespace Forumdash\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Topicsessentialbaby
 *
 * @ORM\Table(name="topicsessentialbaby")
 * @ORM\Entity
 */
class Topicsessentialbaby
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
     * @ORM\Column(name="Link", type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="Topic", type="text", nullable=true)
     */
    private $topic;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PostingTime", type="datetime", nullable=true)
     */
    private $postingtime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="PostedStatus", type="boolean", nullable=false)
     */
    private $postedstatus;

    /**
     * @var string
     *
     * @ORM\Column(name="ProductKeyword", type="string", length=100, nullable=true)
     */
    private $productkeyword;

    /**
     * @var string
     *
     * @ORM\Column(name="LongURL1", type="string", length=255, nullable=true)
     */
    private $longurl1;

    /**
     * @var string
     *
     * @ORM\Column(name="LongURL2", type="string", length=255, nullable=true)
     */
    private $longurl2;

    /**
     * @var string
     *
     * @ORM\Column(name="ShortURL1", type="string", length=100, nullable=true)
     */
    private $shorturl1;

    /**
     * @var string
     *
     * @ORM\Column(name="ShortURL2", type="string", length=100, nullable=true)
     */
    private $shorturl2;

    /**
     * @var string
     *
     * @ORM\Column(name="Response", type="text", nullable=true)
     */
    private $response;

    /**
     * @var string
     *
     * @ORM\Column(name="CustResponse", type="text", nullable=true)
     */
    private $custresponse;

    /**
     * @var integer
     *
     * @ORM\Column(name="AffprogramId1", type="integer", nullable=false)
     */
    private $affprogramid1;

    /**
     * @var integer
     *
     * @ORM\Column(name="AffprogramId2", type="integer", nullable=false)
     */
    private $affprogramid2;



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
     * Set link
     *
     * @param string $link
     * @return Topicsessentialbaby
     */
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set topic
     *
     * @param string $topic
     * @return Topicsessentialbaby
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    
        return $this;
    }

    /**
     * Get topic
     *
     * @return string 
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set postingtime
     *
     * @param \DateTime $postingtime
     * @return Topicsessentialbaby
     */
    public function setPostingtime($postingtime)
    {
        $this->postingtime = $postingtime;
    
        return $this;
    }

    /**
     * Get postingtime
     *
     * @return \DateTime 
     */
    public function getPostingtime()
    {
        return $this->postingtime;
    }

    /**
     * Set postedstatus
     *
     * @param boolean $postedstatus
     * @return Topicsessentialbaby
     */
    public function setPostedstatus($postedstatus)
    {
        $this->postedstatus = $postedstatus;
    
        return $this;
    }

    /**
     * Get postedstatus
     *
     * @return boolean 
     */
    public function getPostedstatus()
    {
        return $this->postedstatus;
    }

    /**
     * Set productkeyword
     *
     * @param string $productkeyword
     * @return Topicsessentialbaby
     */
    public function setProductkeyword($productkeyword)
    {
        $this->productkeyword = $productkeyword;
    
        return $this;
    }

    /**
     * Get productkeyword
     *
     * @return string 
     */
    public function getProductkeyword()
    {
        return $this->productkeyword;
    }

    /**
     * Set longurl1
     *
     * @param string $longurl1
     * @return Topicsessentialbaby
     */
    public function setLongurl1($longurl1)
    {
        $this->longurl1 = $longurl1;
    
        return $this;
    }

    /**
     * Get longurl1
     *
     * @return string 
     */
    public function getLongurl1()
    {
        return $this->longurl1;
    }

    /**
     * Set longurl2
     *
     * @param string $longurl2
     * @return Topicsessentialbaby
     */
    public function setLongurl2($longurl2)
    {
        $this->longurl2 = $longurl2;
    
        return $this;
    }

    /**
     * Get longurl2
     *
     * @return string 
     */
    public function getLongurl2()
    {
        return $this->longurl2;
    }

    /**
     * Set shorturl1
     *
     * @param string $shorturl1
     * @return Topicsessentialbaby
     */
    public function setShorturl1($shorturl1)
    {
        $this->shorturl1 = $shorturl1;
    
        return $this;
    }

    /**
     * Get shorturl1
     *
     * @return string 
     */
    public function getShorturl1()
    {
        return $this->shorturl1;
    }

    /**
     * Set shorturl2
     *
     * @param string $shorturl2
     * @return Topicsessentialbaby
     */
    public function setShorturl2($shorturl2)
    {
        $this->shorturl2 = $shorturl2;
    
        return $this;
    }

    /**
     * Get shorturl2
     *
     * @return string 
     */
    public function getShorturl2()
    {
        return $this->shorturl2;
    }

    /**
     * Set response
     *
     * @param string $response
     * @return Topicsessentialbaby
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
     * Set custresponse
     *
     * @param string $custresponse
     * @return Topicsessentialbaby
     */
    public function setCustresponse($custresponse)
    {
        $this->custresponse = $custresponse;
    
        return $this;
    }

    /**
     * Get custresponse
     *
     * @return string 
     */
    public function getCustresponse()
    {
        return $this->custresponse;
    }

    /**
     * Set affprogramid1
     *
     * @param integer $affprogramid1
     * @return Topicsessentialbaby
     */
    public function setAffprogramid1($affprogramid1)
    {
        $this->affprogramid1 = $affprogramid1;
    
        return $this;
    }

    /**
     * Get affprogramid1
     *
     * @return integer 
     */
    public function getAffprogramid1()
    {
        return $this->affprogramid1;
    }

    /**
     * Set affprogramid2
     *
     * @param integer $affprogramid2
     * @return Topicsessentialbaby
     */
    public function setAffprogramid2($affprogramid2)
    {
        $this->affprogramid2 = $affprogramid2;
    
        return $this;
    }

    /**
     * Get affprogramid2
     *
     * @return integer 
     */
    public function getAffprogramid2()
    {
        return $this->affprogramid2;
    }
}