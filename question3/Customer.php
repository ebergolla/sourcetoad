<?php
/**
 * Created by PhpStorm.
 * User: ernesto
 * Date: 1/6/21
 * Time: 9:37 PM
 */

class Customer {

    private $firstName;
    private $lastName;
    /**
     * @var Address[]
     */
    private $addresses;
    private $cart;

    public function __construct($firstName, $lastName,array $addresses, Cart $cart)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->addresses = $addresses;
        $this->cart = $cart;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getAddresses() : array
    {
        return $this->addresses;
    }

    /**
     * @param Address[] $addresses
     */
    public function setAddresses($addresses): void
    {
        $this->addresses = $addresses;
    }

    /**
     * @param Address $address
     */
    public function addAddress(Address $address) {
        $this->addresses[] = $address;
    }

    /**
     * @return Cart
     */
    public function getCart(): Cart
    {
        return $this->cart;
    }

    /**
     * @param Cart $cart
     */
    public function setCart(Cart $cart): void
    {
        $this->cart = $cart;
    }

    /**
     * Returns Customer Name
     * @return string
     */
    public function getFullName() {
        return $this->firstName.' '.$this->lastName;
    }



}