<?php

namespace AppBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashController extends Controller {

    public function indexAction() {
        return $this->render('@AppBundle/Resources/views/admin/admin.html.twig');
    }

}
