<?php

namespace AppBundle\Controller;

use AppBundle\Form\XoGridType;
use AppBundle\Game\XoGrid;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $grid = new XoGrid();

        $form = $this->createForm(new XoGridType(), $grid);

        $form->handleRequest($request);

        if (false !== $winner = $grid->getWinner()) {
            $request->getSession()->getFlashBag()->add('winner', 'The winner is ' . $winner);
        }

        return $this->render('default/index.html.twig', ['form' => $form->createView()]);
    }
}
