<?php
namespace Forumdash\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Projects
 *
 * @ORM\Table(name="projects")
 * @ORM\Entity
 */
class Projects
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
     * @ORM\Column(name="ProjectName", type="string", length=50, nullable=true)
     */
    private $projectname;

    /**
     * @var string
     *
     * @ORM\Column(name="Website", type="string", length=200, nullable=true)
     */
    private $website;

    /**
     * @var integer
     *
     * @ORM\Column(name="LastAccountUsed", type="integer", nullable=false)
     */
    private $lastaccountused;

    /**
     * @var integer
     *
     * @ORM\Column(name="LastTopicUsed", type="integer", nullable=false)
     */
    private $lasttopicused;

    /**
     * @var integer
     *
     * @ORM\Column(name="LastTemplateUsed", type="integer", nullable=false)
     */
    private $lasttemplateused;

    /**
     * @var integer
     *
     * @ORM\Column(name="LastProxyUsed", type="integer", nullable=false)
     */
    private $lastproxyused;

    /**
     * @var string
     *
     * @ORM\Column(name="ImacrosCodeGeneric", type="text", nullable=true)
     */
    private $imacroscodegeneric;

    /**
     * @var string
     *
     * @ORM\Column(name="ImacrosCreateAccCode", type="text", nullable=true)
     */
    private $imacroscreateacccode;

    /**
     * @var string
     *
     * @ORM\Column(name="ImacrosLoginPost", type="text", nullable=true)
     */
    private $imacrosloginpost;

    /**
     * @var string
     *
     * @ORM\Column(name="Linkstructure", type="text", nullable=true)
     */
    private $linkstructure;

    /**
     * @var string
     *
     * @ORM\Column(name="Senderemail", type="text", nullable=true)
     */
    private $senderemail;

    /**
     * @var string
     *
     * @ORM\Column(name="TopicsTable", type="string", length=50, nullable=true)
     */
    private $topicstable;

    /**
     * @var string
     *
     * @ORM\Column(name="AnswerTemplate", type="string", length=50, nullable=true)
     */
    private $answertemplate;

    /**
     * @var integer
     *
     * @ORM\Column(name="ShiftLinkstructureBy", type="integer", nullable=false)
     */
    private $shiftlinkstructureby;

    /**
     * @var integer
     *
     * @ORM\Column(name="Pausebeforeconfirm", type="integer", nullable=false)
     */
    private $pausebeforeconfirm;

    /**
     * @var integer
     *
     * @ORM\Column(name="Pausebeforenextpost", type="integer", nullable=false)
     */
    private $pausebeforenextpost;

    /**
     * @var boolean
     *
     * @ORM\Column(name="PostQnA", type="boolean", nullable=false)
     */
    private $postqna;

    /**
     * @var string
     *
     * @ORM\Column(name="Language", type="string", length=2, nullable=true)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="properties", type="text", nullable=true)
     */
    private $properties;

    /**
     * @var string
     *
     * @ORM\Column(name="ProjectStatus", type="text", nullable=true)
     */
    private $projectstatus;


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
     * Set projectname
     *
     * @param string $projectname
     * @return Projects
     */
    public function setProjectname($projectname)
    {
        $this->projectname = $projectname;
    
        return $this;
    }

    /**
     * Get projectname
     *
     * @return string 
     */
    public function getProjectname()
    {
        return $this->projectname;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return Projects
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    
        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set lastaccountused
     *
     * @param integer $lastaccountused
     * @return Projects
     */
    public function setLastaccountused($lastaccountused)
    {
        $this->lastaccountused = $lastaccountused;
    
        return $this;
    }

    /**
     * Get lastaccountused
     *
     * @return integer 
     */
    public function getLastaccountused()
    {
        return $this->lastaccountused;
    }

    /**
     * Set lasttopicused
     *
     * @param integer $lasttopicused
     * @return Projects
     */
    public function setLasttopicused($lasttopicused)
    {
        $this->lasttopicused = $lasttopicused;
    
        return $this;
    }

    /**
     * Get lasttopicused
     *
     * @return integer 
     */
    public function getLasttopicused()
    {
        return $this->lasttopicused;
    }

    /**
     * Set lasttemplateused
     *
     * @param integer $lasttemplateused
     * @return Projects
     */
    public function setLasttemplateused($lasttemplateused)
    {
        $this->lasttemplateused = $lasttemplateused;
    
        return $this;
    }

    /**
     * Get lasttemplateused
     *
     * @return integer 
     */
    public function getLasttemplateused()
    {
        return $this->lasttemplateused;
    }

    /**
     * Set lastproxyused
     *
     * @param integer $lastproxyused
     * @return Projects
     */
    public function setLastproxyused($lastproxyused)
    {
        $this->lastproxyused = $lastproxyused;
    
        return $this;
    }

    /**
     * Get lastproxyused
     *
     * @return integer 
     */
    public function getLastproxyused()
    {
        return $this->lastproxyused;
    }

    /**
     * Set imacroscodegeneric
     *
     * @param string $imacroscodegeneric
     * @return Projects
     */
    public function setImacroscodegeneric($imacroscodegeneric)
    {
        $this->imacroscodegeneric = $imacroscodegeneric;
    
        return $this;
    }

    /**
     * Get imacroscodegeneric
     *
     * @return string 
     */
    public function getImacroscodegeneric()
    {
        return $this->imacroscodegeneric;
    }

    /**
     * Set imacroscreateacccode
     *
     * @param string $imacroscreateacccode
     * @return Projects
     */
    public function setImacroscreateacccode($imacroscreateacccode)
    {
        $this->imacroscreateacccode = $imacroscreateacccode;
    
        return $this;
    }

    /**
     * Get imacroscreateacccode
     *
     * @return string 
     */
    public function getImacroscreateacccode()
    {
        return $this->imacroscreateacccode;
    }

    /**
     * Set imacrosloginpost
     *
     * @param string $imacrosloginpost
     * @return Projects
     */
    public function setImacrosloginpost($imacrosloginpost)
    {
        $this->imacrosloginpost = $imacrosloginpost;
    
        return $this;
    }

    /**
     * Get imacrosloginpost
     *
     * @return string 
     */
    public function getImacrosloginpost()
    {
        return $this->imacrosloginpost;
    }

    /**
     * Set linkstructure
     *
     * @param string $linkstructure
     * @return Projects
     */
    public function setLinkstructure($linkstructure)
    {
        $this->linkstructure = $linkstructure;
    
        return $this;
    }

    /**
     * Get linkstructure
     *
     * @return string 
     */
    public function getLinkstructure()
    {
        return $this->linkstructure;
    }

    /**
     * Set senderemail
     *
     * @param string $senderemail
     * @return Projects
     */
    public function setSenderemail($senderemail)
    {
        $this->senderemail = $senderemail;
    
        return $this;
    }

    /**
     * Get senderemail
     *
     * @return string 
     */
    public function getSenderemail()
    {
        return $this->senderemail;
    }

    /**
     * Set topicstable
     *
     * @param string $topicstable
     * @return Projects
     */
    public function setTopicstable($topicstable)
    {
        $this->topicstable = $topicstable;
    
        return $this;
    }

    /**
     * Get topicstable
     *
     * @return string 
     */
    public function getTopicstable()
    {
        return $this->topicstable;
    }

    /**
     * Set answertemplate
     *
     * @param string $answertemplate
     * @return Projects
     */
    public function setAnswertemplate($answertemplate)
    {
        $this->answertemplate = $answertemplate;
    
        return $this;
    }

    /**
     * Get answertemplate
     *
     * @return string 
     */
    public function getAnswertemplate()
    {
        return $this->answertemplate;
    }

    /**
     * Set shiftlinkstructureby
     *
     * @param integer $shiftlinkstructureby
     * @return Projects
     */
    public function setShiftlinkstructureby($shiftlinkstructureby)
    {
        $this->shiftlinkstructureby = $shiftlinkstructureby;
    
        return $this;
    }

    /**
     * Get shiftlinkstructureby
     *
     * @return integer 
     */
    public function getShiftlinkstructureby()
    {
        return $this->shiftlinkstructureby;
    }

    /**
     * Set pausebeforeconfirm
     *
     * @param integer $pausebeforeconfirm
     * @return Projects
     */
    public function setPausebeforeconfirm($pausebeforeconfirm)
    {
        $this->pausebeforeconfirm = $pausebeforeconfirm;
    
        return $this;
    }

    /**
     * Get pausebeforeconfirm
     *
     * @return integer 
     */
    public function getPausebeforeconfirm()
    {
        return $this->pausebeforeconfirm;
    }

    /**
     * Set pausebeforenextpost
     *
     * @param integer $pausebeforenextpost
     * @return Projects
     */
    public function setPausebeforenextpost($pausebeforenextpost)
    {
        $this->pausebeforenextpost = $pausebeforenextpost;
    
        return $this;
    }

    /**
     * Get pausebeforenextpost
     *
     * @return integer 
     */
    public function getPausebeforenextpost()
    {
        return $this->pausebeforenextpost;
    }

    /**
     * Set postqna
     *
     * @param boolean $postqna
     * @return Projects
     */
    public function setPostqna($postqna)
    {
        $this->postqna = $postqna;
    
        return $this;
    }

    /**
     * Get postqna
     *
     * @return boolean 
     */
    public function getPostqna()
    {
        return $this->postqna;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Projects
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    
        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }
    
    /**
     * Set properties
     *
     * @param string $properties
     * @return Projects
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
    
        return $this;
    }

    /**
     * Get properties
     *
     * @return string 
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Set projectstatus
     *
     * @param string $projectstatus
     * @return Projects
     */
    public function setProjectStatus($projectstatus)
    {
        $this->projectstatus = $projectstatus;
    
        return $this;
    }

    /**
     * Get projectstatus
     *
     * @return string 
     */
    public function getProjectStatus()
    {
        return $this->projectstatus;
    }
}