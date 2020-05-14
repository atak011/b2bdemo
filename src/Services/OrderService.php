<?php

namespace App\Services;

use App\Entity\Order;
use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraints\Date;

class OrderService
{

    private OrderRepository $orderRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(OrderRepository $orderRepository,EntityManagerInterface $entityManager)
    {
        $this->orderRepository = $orderRepository;
        $this->entityManager = $entityManager;
    }


    public function getOrderIfExist($id){
        $order = $this->orderRepository->find($id);
        if ($order==null){
            throw new \Exception('Order Not Found');
        }
        return $this->orderRepository->find($id);
    }


    public function getAllOrder(){
        return $this->orderRepository->findAll();
    }

    public function createOrder($address,$productId,$quantity):Order {
        $order = new Order();
        $order->setOrderCode(uuid_create(4));
        $order->setAddress($address);
        $order->setProductId($productId);
        $order->setQuantity($quantity);
        $this->entityManager->persist($order);
        $this->entityManager->flush();
        return $order;
    }

    public function updateOrder(Order $order,$shippingDate,$address,$productId,$quantity):Order {
        $order->setAddress($address);
        $order->setProductId($productId);
        $order->setQuantity($quantity);
        $order->setShippingDate($shippingDate);
        $this->entityManager->persist($order);
        $this->entityManager->flush();
        return $order;
    }

}