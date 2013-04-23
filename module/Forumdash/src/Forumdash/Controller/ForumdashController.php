<?php
namespace Forumdash\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
//use Album\Model\Album;          // <-- Add this import
use Forumdash\Form\ForumdashForm;

use Zend\Form\Element;
use Zend\Form\Fieldset;
use Zend\Form\Form;
//use Classes\MicrosoftTranslator;
use MicrosoftTranslator;

use Forumdash\Entity\Topicsgeneric;
use Doctrine\ORM\Mapping\Driver\StaticPHPDriver;

require __DIR__ . '/config.inc.php';
//require __DIR__ . '/class/ServicesJSON.class.php';
//require __DIR__ . '/class/MicrosoftTranslator.class.php';


class ForumdashController extends AbstractActionController
{
	protected $albumTable;
	
    public function indexAction()
    {

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
			$form->add($idfield);
			$form->add($kwdfield);
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
					$translator = new \MicrosoftTranslator\MicrosoftTranslator(ACCOUNT_KEY);
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