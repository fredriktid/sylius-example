<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function helloAction()
    {
        $customerRepository = $this->container->get('sylius.repository.customer');
        $customerFactory = $this->container->get('sylius.factory.customer');
        $customer = $customerFactory->createNew();
        $customer->setEmail('support@netmaking.no');

        $validator = $this->container->get('validator');
        $errors = $validator->validate($customer, ['sylius']);

        if (0 === count($errors)) {
            $customerRepository->add($customer);
        }

        return $this->render('AppBundle::hello.html.twig', [
            'customer' => $customer,
            'errors' => $errors,
        ]);

    }
}
