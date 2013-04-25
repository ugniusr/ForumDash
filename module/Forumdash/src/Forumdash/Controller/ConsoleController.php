<?php
namespace Forumdash\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Console\Request as ConsoleRequest;
use Zend\Math\Rand;

class ConsoleController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel(); // display standard index page
    }

    public function printhelloAction()
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