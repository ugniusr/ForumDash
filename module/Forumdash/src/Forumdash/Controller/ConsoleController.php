<?php
namespace Forumdash\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Console\Request as ConsoleRequest;
use Zend\Math\Rand;
use Zend\Json\Json;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;

class ConsoleController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel(); // display standard index page
    }
    
    public function printhelloAction()
    {
        //
        $request = $this->getRequest();

        // Make sure that we are running in a console and the user has not tricked our
        // application into running this action from a public web server.
        if (!$request instanceof ConsoleRequest){
            throw new \RuntimeException('You can only use this action from a console!');
        }
        return "Hello world. \n";
    }
    public function addtopicsAction()
    {
        //
        $request = $this->getRequest();

        // Make sure that we are running in a console and the user has not tricked our
        // application into running this action from a public web server.
        if (!$request instanceof ConsoleRequest){
            throw new \RuntimeException('You can only use this action from a console!');
        }
        $id  = $request->getParam('optionalNumber');
        
        // die(var_dump($id));
        
        $objectManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        
        $Projects = $objectManager
                ->getRepository('Forumdash\Entity\Projects')
                ->findOneBy(array('id' => $id));

        $tablename = $Projects->getTopicstable();
        $tablenameref = ucfirst($tablename);
        // die(var_dump($tablenameref));      
        
        $url = $Projects->getPropertyvalue('NewtopicsURL');
        $affiliatepr1 = $Projects->getPropertyvalue('DefaultAff');

        // $url = "http://open.dapper.net/transform.php?dappName=YahooAnswersDE&transformer=JSON&applyToUrl=http%3A%2F%2Fde.answers.yahoo.com%2Fsearch%2Fsearch_result%3Fpage%3D1%26p%3Dkaufen%26scope%3Dsubject%26fltr%3D%26question_status%3Dopen%26date_submitted%3Dall%26category%3D0%26answer_count%3Dany%26orderby%3Ddate%26filter_search%3Dtrue";
        $html = file_get_contents($url);
        // 
        
        /* $html = "{\"dapper\":
                    {\"status\":\"OK\",
                        \"dappName\":\"YahooAnswersDE\",
                        \"applyToUrl\":\"http:\/\/de.answers.yahoo.com\/search\/search_result?page=1&p=kaufen&scope=subject&fltr=&question_status=open&date_submitted=all&category=0&answer_count=any&orderby=date&filter_search=true\",
                        \"executionTime\":\"0.675\",
                        \"ranAt\":\"2013-06-03 13:51:49 UTC\",
                        \"inputVars\":\"\"
                    },
                    \"groups\":
                    {\"QuestionArea\":
                            [{\"Topic\":[{\"value\":\"Wo bekomme ich einen Papagei Becher?\",\"href\":\"http:\/\/de.answers.yahoo.com\/question\/index?qid=20130603045246AAevh5s\",\"originalElement\":\"a\",\"fieldName\":\"Topic\"}]}]
                    }
                }";
         * 
         */
        $phpNative = Json::decode($html, Json::TYPE_OBJECT);
        
        $questions = array_reverse($phpNative->groups->QuestionArea);
        
        foreach ($questions as $question) :
            $linkref = $question->Topic[0]->href;
            $topicref = $question->Topic[0]->value;
            $objectManager = $this->AddNewTopic($linkref, $topicref, $affiliatepr1, $tablenameref, $objectManager);
        endforeach;
        
        $objectManager->flush();
        
        // die("Success");
        // die(var_dump($phpNative->groups->QuestionArea[0]->Topic[0]->href));
        
        return "Done importing. \n";
    }
    
    					
    public function AddNewTopic($link, $topic, $affiliatepr1, $tablename, $objectManager)
    {

        $importdata["Link"] = $link;
        $importdata["Topic"] = $topic;
        $importdata["PostedStatus"] = 0;  // CANNOT BE NULL
        $importdata["AffprogramId1"] = $affiliatepr1; // CANNOT BE NULL
        $importdata["AffprogramId2"] = 0; // CANNOT BE NULL
        
        $topicstblnew = $objectManager
                ->getRepository('Forumdash\Entity\Topicsgeneric');

        $cmf = $objectManager->getMetadataFactory();
        $class = $cmf->getMetadataFor('Forumdash\Entity\Topicsgeneric');
        $class->setPrimaryTable(array('name' => $tablename));
        
        $qb = $objectManager
                ->createQueryBuilder();
        $qb->select('addtop')
                ->from('Forumdash\Entity\Topicsgeneric', 'addtop')
                ->where('addtop.link = \'' . $link . '\'');

        $query = $qb->getQuery()
                ->useQueryCache(false);			

        $result = $query->getResult();
        
        // die(var_dump($result));
        if(empty($result))
        {
            $hydrator = new DoctrineObject(
                $objectManager,
                'Forumdash\Entity\Topicsgeneric'        
            );
            $topics = new \Forumdash\Entity\Topicsgeneric();
            $topics = $hydrator->hydrate($importdata, $topics);
            $objectManager->persist($topics);
            
            // $objectManager->flush();
        }
        return $objectManager;
    }
         
    public function checkifanswerbannedAction()
    {
        $request = $this->getRequest();

        // Make sure that we are running in a console and the user has not tricked our
        // application into running this action from a public web server.
        if (!$request instanceof ConsoleRequest){
            throw new \RuntimeException('You can only use this action from a console!');
        }

        // Get user email from console and check if the user used --verbose or -v flag
        $projNo   = $request->getParam('optionalNumber');
        $verbose     = $request->getParam('verbose');

        $objectManager = $this
            ->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager');

        $qb = $objectManager
            ->createQueryBuilder();
            
        $qb->select('p')
            ->from('Forumdash\Entity\Projects', 'p')
            ->where('p.id = ' . $projNo)
            ->orderBy('p.id', 'ASC');
        
        $query = $qb->getQuery();
        $result = $query->getResult();

        $projName = $result[0]->getProjectName();

        $html = file_get_contents('http://www.gutefrage.net/frage/wo-kann-ich-kindle-kaufen');
        //die(var_dump($html));
        $dom = new \Zend\Dom\Query($html);
        $results = $dom->queryXpath('//a[contains(@href,"http://tinyurl.com")]');
        $count = count($results); // get number of matches: 4
        foreach ($results as $result) {
            // $result is a DOMElement
        }

        //  Fetch the user and change his password, then email him ...
        // [...]


        if (!$verbose){
            return "Done! $count is selected.\n";
        }else{
            return "Done! New password for user $optNo is '$optNo'. It has also been emailed to him. \n";
        }
    }
}