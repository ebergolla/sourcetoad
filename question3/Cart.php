<?php
/**
 * Created by PhpStorm.
 * User: ernesto
 * Date: 1/6/21
 * Time: 9:41 PM
 */

class Cart
{
    /**
     * @var CartItem[]
     */
    private $items;

    /**
     * @var Customer
     */
    private $customer;

    public function __construct()
    {
        $this->items = [];
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }



    /**
     * @return CartItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param CartItem[] $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * @param CartItem $item
     */
    public function addItem(CartItem $item) {
        $this->items[] = $item;
    }

    /**
     * Cost of item in cart, including shipping and tax
     * @param $itemId
     * @return float
     */
    public function getItemCost($itemId) {
        $totalCost = 0;
        foreach ($this->items as $item) {
            if($item->getId() == $itemId) {
                $totalCost = $item->getItemCostIncludingTaxAndShipping();
            }
        }
        return $totalCost;
    }

    /**
     * Return Total
     * @return float|int
     */
    public function getTotal() {
        $totalCost = 0;
        foreach ($this->items as $item) {
            $totalCost += $item->getItemCostIncludingTax();
        }
        return $totalCost;
    }

    /**
     * Return SubTotal
     * @return float|int
     */
    public function getSubTotal() {
        $totalCost = 0;
        foreach ($this->items as $item) {
            $totalCost += $item->getItemCostExcludingTax();
        }
        return $totalCost;
    }

}