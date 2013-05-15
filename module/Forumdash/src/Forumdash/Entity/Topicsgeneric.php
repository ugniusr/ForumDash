<?php

namespace Forumdash\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ClassMetadata;
// use Doctrine\ORM\Mapping\ClassMetadataInfo;

/**
 * Topicsgeneric
 *
 * @ORM\Entity
 */
class Topicsgeneric
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
     * @var string
     *
     * @ORM\Column(name="TopicTranslated", type="text", nullable=true)
     */
    private $topictranslated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PostingTime", type="datetime", nullable=true)
     */
    
    private $postingtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="PostedStatus", type="integer", nullable=false)
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

    private $tblname_local;

    /*    
    public function __construct($tblname)
    {
        $this->setTableName($tblname);
        return $this;
    }
    */
    
    public function getTable()
    {
        return $this->tblname_local;

    }

    public static function loadMetadata(ClassMetadata $metadata)
    {
        $metadata->setPrimaryTable(array('name' => 'Topicsaskcom'));
        die(var_dump($metadata->getTableName()));
        $this->tblname_local = $metadata;
    }


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
     * @return Topicsgeneric
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
     * @return Topicsgeneric
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
     * Set topictranslated
     *
     * @param string $topictranslated
     * @return Topicsgeneric
     */
    public function setTopictranslated($topictranslated)
    {
        $this->topictranslated = $topictranslated;
    
        return $this;
    }

    /**
     * Get topictranslated
     *
     * @return string 
     */
    public function getTopictranslated()
    {
        return $this->topictranslated;
    }

    /**
     * Set postingtime
     *
     * @param \DateTime $postingtime
     * @return Topicsgeneric
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
     * @param integer $postedstatus
     * @return Topicsgeneric
     */
    public function setPostedstatus($postedstatus)
    {
        $this->postedstatus = $postedstatus;
    
        return $this;
    }

    /**
     * Get postedstatus
     *
     * @return integer 
     */
    public function getPostedstatus()
    {
        return $this->postedstatus;
    }

    /**
     * Set productkeyword
     *
     * @param string $productkeyword
     * @return Topicsgeneric
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
     * @return Topicsgeneric
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
     * @return Topicsgeneric
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
     * @return Topicsgeneric
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
     * @return Topicsgeneric
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
     * @return Topicsgeneric
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
     * @return Topicsgeneric
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
     * @return Topicsgeneric
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
     * @return Topicsgeneric
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