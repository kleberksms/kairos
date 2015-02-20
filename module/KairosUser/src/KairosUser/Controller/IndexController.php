<?php

namespace KairosUser\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\EventManager\EventManagerInterface;

class IndexController extends AbstractRestfulController
{

    /**
     *
     * @var array
     */
    protected $collectionOptions = array(
        'GET'
    );

    /**
     *
     * @var array
     */
    protected $resourceOptions = array(
        'GET'
    );

    /**
     * Check if an id is set and the allowed http verb is in array
     *
     * @return array
     */
    protected function _getOptions()
    {
        if($this->params()->fromRoute('id', false))
        {
            return $this->resourceOptions;
        }
        //die('_getOptions');
        return $this->collectionOptions;
    }

    /**
     * Return the allowed http verbs
     *
     * @return Response
     */
    public function options()
    {
        $response = $this->getResponse();

        $response->getHeaders()
            ->addHeaderLine('Allow', implode(',', $this->_getOptions()));

        return $response;
    }

    /**
     * Attach the check options function whenever a request happens
     *
     * @param \Zend\EventManager\EventManagerInterface $events
     */
    public function setEventManager(EventManagerInterface $events)
    {
        parent::setEventManager($events);

        $this->events = $events;

        //validate the http method
        $events->attach('dispatch', array($this,'checkOptions'), 10);
    }

    /**
     * Check if the current request is allowed
     *
     * @param Event $e
     * @return Reponse
     */
    public function checkOptions($e)
    {
        if(in_array($e->getRequest()->getMethod(),$this->_getOptions()))
        {
            return;
        }

        return $this->formatResponse(array(), 405);
    }

    /**
     * Single Resource
     *
     * @param type $id
     * @return response
     */
    public function get($id)
    {
        return $this->formatResponse(array(), 405);
    }

    /**
     * Multiple Resources
     *
     * @return response
     */
    public function getList()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $repo = $em->getRepository('KairosUser\Entity\User');

        $finders = $repo->findAll();

        $users = array();

        foreach($finders as $user){
            array_push($users,$user->toArray());
        }

        return $this->formatResponse($users, 200);
    }

    /**
     * Create Resource (Post)
     *
     * @param array $data
     * @return response
     */
    public function create($data)
    {
        return $this->formatResponse(array(), 405);
    }

    /**
     * Delete Resource (Delete)
     *
     * @param type $id
     * @return response
     */
    public function delete($id)
    {
        return $this->formatResponse(array(), 405);
    }

    /**
     * Update Resource (Put)
     *
     * @param type $id
     * @return response
     */
    public function update($id, $data)
    {
        return $this->formatResponse(array(), 405);
    }

    /**
     * Used to build the ajax response
     *
     * @param type $content
     * @param type $statusCode
     * @return type
     */
    protected function formatResponse($content = array(), $statusCode = 200)
    {
        $response = $this->getResponse();
        $response->setStatusCode($statusCode);
        $response
            ->getHeaders()
            ->addHeaderLine('Content-Type', 'application/json');
        if (!empty($content) && is_array($content))
        {
            $response->setContent(json_encode($content));
        }

        return $response;
    }

    /**
     * Gets the current users hudzi token
     *
     * @param type $type
     * @return type
     */
    protected function getUserSocial($type = '')
    {
        $userSocialEntity = $this->getEntityManager()
            ->getRepository('Application\Entity\UserSocial')
            ->findOneBy(array(
                'user' => $this->zfcUserAuthentication()->getIdentity(),
                'type' => $type
            ));

        return $userSocialEntity;
    }

    /**
     * Return logged in user id
     * @return type
     */
    protected function getUser() {
        if(!$this->_user) {
            $this->setUser($this->zfcUserAuthentication()->getIdentity());
        }

        return $this->_user;
    }

    /**
     * Set logged in user
     * @param Application\Entity\User $user
     */
    protected function setUser(\Application\Entity\User $user) {
        if($user) {
            $this->_user = $user;
        } else {
            $this->_user = $this->zfcUserAuthentication()->getIdentity();
        }
    }

    /**
     * Set em
     *
     * @param \Doctrine\ORM\EntityManager $em
     */
    protected function setEntityManager(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Get em
     *
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        if($this->em === null)
        {
            $this->em = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        }

        return $this->em;
    }
}
