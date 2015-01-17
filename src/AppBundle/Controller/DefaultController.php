<?php

namespace AppBundle\Controller;

use AppBundle\Form\NestedGridType;
use AppBundle\Game\GridFactory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Config;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Config\Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $grid = $this->getGridFactory()->createNestedGrid(2);

        $form = $this->createForm(new NestedGridType(), $grid);
        $form->handleRequest($request);

        if ($form->isValid() && false !== $winner = $grid->getWinner()) {
            $request->getSession()->getFlashBag()->add('winner', 'The winner is ' . $winner);
        }

        return $this->render('default/index.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @return GridFactory
     */
    private function getGridFactory()
    {
        return $this->get('grid_factory');
    }
}
