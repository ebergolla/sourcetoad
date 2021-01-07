<?php
/**
 * Created by PhpStorm.
 * User: ernesto
 * Date: 1/6/21
 * Time: 9:42 PM
 */

class CartItem
{
    private $id;
    private $price;
    private $name;
    private $quantity;
    private $taxRate;
    /**
     * @var Address
     */
    private $shippingAddress;


    public function __construct()
    {
        $taxRate = 7;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getTaxRate()
    {
        return $this->taxRate;
    }

    /**
     * @param mixed $taxRate
     */
    public function setTaxRate($taxRate): void
    {
        $this->taxRate = $taxRate;
    }

    /**
     * @return Address
     */
    public function getShippingAddress(): Address
    {
        return $this->shippingAddress;
    }

    /**
     * @param Address $shippingAddress
     */
    public function setShippingAddress(Address $shippingAddress): void
    {
        $this->shippingAddress = $shippingAddress;
    }


    /**
     * @return float|int
     *
     */
    public function getItemCostIncludingTax() {
        return $this->quantity*$this->price*$this->taxRate/100;
    }
    /**
     * @return float|int
     *
     */
    public function getItemCostIncludingTaxAndShipping() {
        return $this->quantity*$this->price*$this->taxRate/100 + ShippingApi::getShippingRate($this->shippingAddress);
    }

    /**
     * @return float|int
     *
     */
    public function getItemCostExcludingTax() {
        return $this->quantity*$this->price;
    }

}