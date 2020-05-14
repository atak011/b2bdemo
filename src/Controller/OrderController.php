<?php

namespace App\Controller;

use App\Services\OrderService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Exception\MissingInputException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class OrderController extends AbstractFOSRestController
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }



    public function getOrdersAction(Request $request)
    {
        $orders = $this->orderService->getAllOrder();
        return $this->view($orders, Response::HTTP_OK);
    }

    public function postOrdersAction(Request $request)
    {
        $address = $request->get('address');
        $productId = $request->get('productId');
        $quantity = $request->get('quantity');
        if ($quantity == null || $productId == null || $quantity == null){
            throw new MissingInputException();
        }else{
            $order = $this->orderService->createOrder($address,$productId,$quantity);
            return $this->view($order, Response::HTTP_OK);
        }
    }

    public function getOrderAction($id)
    {
           $order =  $this->orderService->getOrderIfExist($id);
           return $this->view($order, Response::HTTP_OK);
    }

    public function putOrderAction(Request $request,$id)
    {
        $address = $request->get('address');
        $productId = $request->get('productId');
        $quantity = $request->get('quantity');
        $shippingDate = $request->get('shippingDate');
        $order =  $this->orderService->getOrderIfExist($id);
        $order =  $this->orderService->updateOrder($order,$shippingDate,$address,$productId,$quantity);
        return $this->view($order, Response::HTTP_OK);

    }

}
