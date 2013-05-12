<?php
namespace Forumdash\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
//use Album\Model\Album;          // <-- Add this import
use Forumdash\Form\ForumdashForm;
use Forumdash\Form\AddforumForm;
use Forumdash\Form\AddtopicsForm;
use Forumdash\Form\AddaccountpropertyForm;

use Zend\Form\Element;
use Zend\Form\Fieldset;
use Zend\Form\Form;
//use Classes\MicrosoftTranslator;
use Bingtranslate;

use Forumdash\Entity\Topicsgeneric;
//use Forumdash\Entity\Data_import;
use Doctrine\ORM\Mapping\Driver\StaticPHPDriver;

use zfcUser;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;


require __DIR__ . '/config.inc.php';
//require __DIR__ . '/class/ServicesJSON.class.php';
//require __DIR__ . '/class/MicrosoftTranslator.class.php';


class ForumdashController extends AbstractActionController
{
	//protected $albumTable;
	
    public function indexAction()
    {


//  	echo $this->zfcUserLoginWidget();



	$objectManager = $this
        ->getServiceLocator()
        ->get('Doctrine\ORM\EntityManager');

	/* $Projects = $objectManager
		->getRepository('Forumdash\Entity\Projects')
		->findAll(); // (array('id' => '1')); */
			
	$qb = $objectManager
		->createQueryBuilder();
		
	$qb->select('p')
		->from('Forumdash\Entity\Projects', 'p')
		->where('p.id > 0')
		->orderBy('p.id', 'ASC');
	
	$query = $qb->getQuery();
	$result = $query->getResult();
	//die(var_dump($result));
	return new ViewModel(array(
            'projects' => $result,
        ));
    }


    public function editAction()
    {    
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('forumdash', array(
                'action' => 'index'
            ));
        }
		
        $numberofkwds = 5;

        $em = null;
        $em = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');

        $objectManager = null;
        $objectManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');

        $Projects = $objectManager
                ->getRepository('Forumdash\Entity\Projects')
                ->findOneBy(array('id' => $id)); 

        $tablename = $Projects->getTopicstable();
        $tablename = ucfirst($tablename); 
        $projectname = $Projects->getProjectname();
        $language = $Projects->getLanguage();

        $topicstblnew = $em
                ->getRepository('Forumdash\Entity\Topicsgeneric');

        $cmf = $em->getMetadataFactory();
        $class = $cmf->getMetadataFor('Forumdash\Entity\Topicsgeneric');
        $class->setPrimaryTable(array('name' => $tablename));

        //die(var_dump($class));

        $qb = null;
        $qb = $objectManager
                ->createQueryBuilder();

        $form = new ForumdashForm();
        $form->get('submit')->setValue('Submit');

		for ($i = 1; $i<=$numberofkwds; $i++)
		{
			$idfield = new Element('id_' . $i);
			$idfield->setLabel('');
			$idfield->setAttributes(array(
				'type'  => 'hidden'
			));
			$kwdfield = new Element('keyword_' . $i);
			$kwdfield->setLabel('');
			$kwdfield->setAttributes(array(
				'type'  => 'text'
			));	
			$answfield = new Element('answer_' . $i);
			$answfield->setLabel('');
			$answfield->setAttributes(array(
				'type'  => 'textarea',
				'rows'  => '3',
			));	
			$form->add($idfield);
			$form->add($kwdfield);
			$form->add($answfield);
		}



        $request = $this->getRequest();
        if ($request->isPost()) {

            $form->setData($request->getPost());
			
            if ($form->isValid()) {
                $keywords = $form->getData();
							
                for ($i=1; $i<=$numberofkwds; $i++)
                {
                        if ($keywords["keyword_". $i] != '')
                        {
                                $qb->update('Forumdash\Entity\Topicsgeneric', 't')
                                        ->set('t.productkeyword',$qb->expr()->literal($keywords["keyword_". $i]))
                                        ->set('t.custresponse',$qb->expr()->literal($keywords["answer_". $i]))
                                        ->where('t.id = ' . $keywords["id_". $i]);

                                $query = $qb->getQuery()
                                                        ->useQueryCache(false);		

                                $result = $query->execute();
                        }
                }

                // Redirect to list of albums
                //return $this->redirect()->toRoute('forumdash');
            }
        }
				
			
		//$form->reset();
		$qb = null;
		$qb = $objectManager
			->createQueryBuilder();
			
		$qb->select('tbl')
			->from('Forumdash\Entity\Topicsgeneric', 'tbl')
			->where('tbl.productkeyword IS NULL')
			->orWhere('tbl.productkeyword = \'\'')
			->setMaxResults($numberofkwds);
			
		$query = $qb->getQuery()
					->useQueryCache(false);			

		$result = $query->getResult();

		
		if ($language != "en")
		{
			foreach ($result as &$row) :
				$translated = $row->getTopictranslated();
				if ($translated == null || $translated == '')
				{
					//
					// Translate
					//
					$translator = new \Bingtranslate\Controller\BingtranslateController(ACCOUNT_KEY);
					$text_to_translate = $row->getTopic();
					$to = "en";
					$from = $language;
					$translator->translate($from, $to, $text_to_translate);
					$output = strip_tags($translator->response->translation);
					if($output != "") $row->setTopictranslated($output);
					
					//
					// Update translated value in the database
					//

					$id_curr = $row->getId();
					$qb->update('Forumdash\Entity\Topicsgeneric', 't')
						->set('t.topictranslated',$qb->expr()->literal($output))
						->where('t.id = ' . $id_curr);
						
					$query = $qb->getQuery()
								->useQueryCache(false);										
					$res_update_topictranslated = $query->execute();
					// die(var_dump($query));						
				}
			endforeach;
		}
		

		//die(var_dump($result));

		/*				
		$em = $this
			->getServiceLocator()
			->get('Doctrine\ORM\EntityManager');
			
		$query = $em->createQuery('SELECT t FROM Forumdash\Entity' . '\\' .  $tablename . ' t WHERE t.ProductKeyword = \' \'');
		$nokwdlist = $query->getResult(Query::setMaxResults(5));
		*/									

		//	die(var_dump($result));

        return array(
            'projects' => $result,
            'id' => $id,
            'form' => $form,
            'numberofkwds' => $numberofkwds,
            'projectname' => $projectname,
        );

/*
		return new ViewModel(array(
				'projects' => $result,
			));	
*/
    }

    
    public function addforumAction()
    {

        $objectManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');

        
        $vm = new ViewModel();
        $vm->setTemplate('forumdash/forumdash/addforum.phtml');

        //$entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $form = new AddforumForm($objectManager);
        
        // $sl = $this->getServiceLocator();
        // $form = $sl->get('FormElementManager')->get('\Forumdash\Form\AddforumForm');
        
        //$form = new AddforumForm();
        $form->get('submit')->setValue('Add');        
        
        
        $request = $this->getRequest();
        if ($request->isPost()) 
        {
            //$form->setInputFilter($newforum->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                
                $hydrator = new DoctrineObject(
                    $objectManager,
                    'Forumdash\Entity\Projects'        
                );
                       
                $projects = new \Forumdash\Entity\Projects();
                $data = $form->getData();

                $projects = $hydrator->hydrate($data, $projects);
                $topictable = $data['TopicsTable'];
                
                //die(var_dump($topictable)); // prints "Frankfurt"
                
                $db = $objectManager->getConnection();
                $querycheck = $db->prepare("SELECT table_name FROM information_schema.tables WHERE table_schema = 'postingdb' AND table_name = '$topictable';");                
                $querycheck->execute();
                $tblexists = $querycheck->fetchAll();
                // array(1) { [0]=> array(1) { ["table_name"]=> string(11) "topicstest2" } }
                // array(0) { }
                
                
                if(empty($tblexists))
                {
                    // CREATE entry in the projects table
                    $objectManager->persist($projects);
                    $objectManager->flush();
                
                    // CREATE a new topics table
                    $query = $db->prepare("CREATE TABLE `$topictable` (   `Id` int(10) 
                        NOT NULL AUTO_INCREMENT,   `Link` varchar(255) DEFAULT NULL,   
                        `Topic` text,   `TopicTranslated` text,   
                        `PostingTime` datetime DEFAULT NULL,   
                        `PostedStatus` tinyint(4) NOT NULL DEFAULT '0',   
                        `PostURLexact` varchar(255) DEFAULT NULL,   
                        `ProductKeyword` varchar(100) DEFAULT NULL,   
                        `LongURL1` text,   `LongURL2` text,   
                        `ShortURL1` varchar(100) DEFAULT NULL,   
                        `ShortURL2` varchar(100) DEFAULT NULL,   `Response` longtext,   
                        `CustResponse` longtext,   `AffprogramId1` int(10) NOT NULL DEFAULT '$data[AffprogramId1]',   
                        `AffprogramId2` int(10) NOT NULL DEFAULT '0',   
                        PRIMARY KEY (`Id`),   UNIQUE KEY `Link` (`Link`) ) 
                        ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;");

                    $query->execute();
                }
                else
                {
                    $errormsg = "Such topic table name already exists";
                    return $vm->setVariables(array(
                        'form' => $form,
                        'err' => $errormsg,
                    ));
                    
                }
                return $this->redirect()->toRoute('forumdash', array(
                    'action' => 'index'
                ));
            }
        }
        /**/
        
        //$form->setObjectManager($objectManager);
        //die(var_dump($form));
        
        
        
        return $vm->setVariables(array(
            'form' => $form,
            'err' => $errormsg,
        ));
        
        
        //return array('form' => $form);
        
    }

    public function addaccountpropertyAction()
    {
        $objectManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');

        $vm = new ViewModel();
        $vm->setTemplate('forumdash/forumdash/addaccountproperty.phtml');

        $form = new AddaccountpropertyForm();
        $form->get('submit')->setValue('Add');        
        
        $request = $this->getRequest();
        if ($request->isPost()) 
        {
            //$form->setInputFilter($newforum->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $data = $form->getData();
                $propertyname = $data['PropertyName'];
                $dataPropvalues = $data['Propvalues'];
                $dataPropvalues = str_replace("\r\n", "\n", $dataPropvalues);
                $rowarray = \explode("\n",$dataPropvalues);
                //die(var_dump($form->getData()));
                foreach($rowarray as $row) :
                    $arraytobejsoned = array($propertyname => $row);
                    $jsonRow = json_encode($arraytobejsoned);
                    //die(var_dump($jsonRow));
                    if ($jsonRow != NULL && $jsonRow != "")
                        $newarray[] = $jsonRow;                
                endforeach;
                
                
                // CREATE a TEMP table ( If exists, delete it first)
                $db = $objectManager->getConnection();
                
                $query = $db->prepare("DROP TABLE IF EXISTS `import_data`;");

                $query->execute();
                $query->closeCursor();

                $query = $db->prepare("CREATE TABLE `import_data` (
                  `Id` int(10) NOT NULL AUTO_INCREMENT,
                  `Data` TEXT,
                  PRIMARY KEY (`Id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

                $query->execute();
                $query->closeCursor();
                // die(var_dump($query));
                
                // Populate a TEMP table
                $k = count($newarray);
                for ($i=0; $i < $k; $i++)
                {
                    $tempdatarow = new \Forumdash\Entity\Dataimport();
                    $tempdatarow->setData($newarray[$i]);
                    $objectManager->persist($tempdatarow);
                }
                $objectManager->flush();
                $objectManager->clear();
                
                // die(var_dump($objectManager));
                // "CALL doiterate()"
                $query = $db->prepare("CALL Updateaccountproperties();");
                $query->execute();
                $query->closeCursor();
                
                //die(var_dump($query));

                // Delete a TEMP
                $query = $db->prepare("DROP TABLE IF EXISTS `import_data`;");
                $query->execute();
                
                return $this->redirect()->toRoute('forumdash', array(
                    'action' => 'index'
                ));
            }

        }
        
        return $vm->setVariables(array(
            'form' => $form,
            'err' => $errormsg,
        ));
        
    }    

    public function addtopicsAction()
    {
        
        
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('forumdash', array(
                'action' => 'index'
            ));
        }

        $vm = new ViewModel();
        $vm->setTemplate('forumdash/forumdash/addtopics.phtml');


        $em = null;
        $em = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');

        $objectManager = null;
        $objectManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');

        $Projects = $objectManager
                ->getRepository('Forumdash\Entity\Projects')
                ->findOneBy(array('id' => $id)); 

        $tablename = $Projects->getTopicstable();
        $tablename = ucfirst($tablename); 
        $projectname = $Projects->getProjectname();
        // $language = $Projects->getLanguage();
        //die(var_dump($tablename));

        $topicstblnew = $em
                ->getRepository('Forumdash\Entity\Topicsgeneric');

        $cmf = $em->getMetadataFactory();
        $class = $cmf->getMetadataFor('Forumdash\Entity\Topicsgeneric');
        $class->setPrimaryTable(array('name' => $tablename));

        //die(var_dump($class));

        $qb = null;
                
        $form = new AddtopicsForm();
        $form->get('submit')->setValue('Add');        
        
        $request = $this->getRequest();
        if ($request->isPost()) 
        {
            //$form->setInputFilter($newforum->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) 
            {
                // $rowarray = array();
                $tmp = \explode("\n",$form->getData();
                $rowarray = $tmp['topics']);
                foreach($rowarray as $row) :
                    $colarray = \explode("\t", $row);
                    
                    $qb = $objectManager
                        ->createQueryBuilder();
                    $qb->select('addtop')
                            ->from('Forumdash\Entity\Topicsgeneric', 'addtop')
                            ->where('addtop.link = \'' . $colarray[0] . '\'');

                    $query = $qb->getQuery()
                            ->useQueryCache(false);			

                    $result = $query->getResult();
                    
                    // $result = NULL;  Value for testing purposes only
                    
                    $importdata["Link"] = $colarray[0];
                    $importdata["Topic"] = $colarray[1]; 
                    $importdata["PostedStatus"] = 0;
                    $importdata["AffprogramId1"] = 0;
                    $importdata["AffprogramId2"] = 0;
                    
                    if(empty($result))
                    {
                        $hydrator = new DoctrineObject(
                            $objectManager,
                            'Forumdash\Entity\Topicsgeneric'        
                        );
                        $topics = new \Forumdash\Entity\Topicsgeneric();
                        $topics = $hydrator->hydrate($importdata, $topics);
                        $objectManager->persist($topics);
                        
                    }
                    
                endforeach;
                
                $objectManager->flush();
                
                return $this->redirect()->toRoute('forumdash', array(
                    'action' => 'index'
                ));
                //die(var_dump($rowarray));
            }
        }

        return $vm->setVariables(array(
            'form' => $form,
            'id' => $id,
            'projectname' => $projectname,   
        ));
        
    }   
    
    
    
    public function showlatestAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('forumdash', array(
                'action' => 'index'
            ));
        }

        $numberofposts = 10;

        $em = null;
        $em = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');

        $objectManager = null;
        $objectManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');

        $Projects = $objectManager
                ->getRepository('Forumdash\Entity\Projects')
                ->findOneBy(array('id' => $id)); 

        $tablename = $Projects->getTopicstable();
        $tablename = ucfirst($tablename); 
        $projectname = $Projects->getProjectname();
        $language = $Projects->getLanguage();


        $topicstblnew = $em
            ->getRepository('Forumdash\Entity\Topicsgeneric');

        $cmf = $em->getMetadataFactory();
        $class = $cmf->getMetadataFor('Forumdash\Entity\Topicsgeneric');
        $class->setPrimaryTable(array('name' => $tablename));

        //die(var_dump($class));

        $qb = null;
        $qb = $objectManager
                ->createQueryBuilder();


        $qb->select('tbl')
            ->from('Forumdash\Entity\Topicsgeneric', 'tbl')
            ->where('tbl.postingtime IS NOT NULL')
            ->orderBy('tbl.postingtime', 'DESC')
            ->setMaxResults($numberofposts);

        $query = $qb->getQuery()
                ->useQueryCache(false);			

        $result = $query->getResult();

//		die(var_dump($result));
        $this->view->posts = $result;
        return array(
			'posts' => $result,
			'id' => $id,
			'numberofposts' => $numberofposts,
			'projectname' => $projectname,
        );
    }


	public function getAlbumTable()
    {
        if (!$this->albumTable) {
            $sm = $this->getServiceLocator();
            $this->albumTable = $sm->get('Album\Model\AlbumTable');
        }
        return $this->albumTable;
    }
}