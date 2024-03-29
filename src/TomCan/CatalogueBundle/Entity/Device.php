<?php

namespace TomCan\CatalogueBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Device
 *
 * @ORM\Table(name="device")
 * @ORM\Entity
 */
class Device
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="id")
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="DeviceType", inversedBy="id")
     */
    private $deviceType;

    /**
     * @ORM\ManyToOne(targetEntity="Vendor", inversedBy="id")
     */
    private $vendor;

    /**
     * @var string
     *
     * @ORM\Column(name="Model", type="string", length=255, nullable=true)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="PartNo", type="string", length=255, nullable=true)
     */
    private $partNo;

    /**
     * @var string
     *
     * @ORM\Column(name="SerialNo", type="string", length=255, nullable=true)
     */
    private $serialNo;

    /**
     * @ORM\ManyToMany(targetEntity="Person", inversedBy="devices")
     */
    private $persons;

    /**
     * @ORM\ManyToMany(targetEntity="SoftwareLicense", inversedBy="devices")
     */
    private $licenses;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Device
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set deviceType
     *
     * @param string $deviceType
     * @return Device
     */
    public function setDeviceType($deviceType)
    {
        $this->deviceType = $deviceType;

        return $this;
    }

    /**
     * Get deviceType
     *
     * @return string 
     */
    public function getDeviceType()
    {
        return $this->deviceType;
    }

    /**
     * Set vendor
     *
     * @param string $vendor
     * @return Device
     */
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;

        return $this;
    }

    /**
     * Get vendor
     *
     * @return string 
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * Set model
     *
     * @param string $model
     * @return Device
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set partNo
     *
     * @param string $partNo
     * @return Device
     */
    public function setPartNo($partNo)
    {
        $this->partNo = $partNo;

        return $this;
    }

    /**
     * Get partNo
     *
     * @return string 
     */
    public function getPartNo()
    {
        return $this->partNo;
    }

    /**
     * Set serialNo
     *
     * @param string $serialNo
     * @return Device
     */
    public function setSerialNo($serialNo)
    {
        $this->serialNo = $serialNo;

        return $this;
    }

    /**
     * Get serialNo
     *
     * @return string 
     */
    public function getSerialNo()
    {
        return $this->serialNo;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $persons
     */
    public function setPersons($persons)
    {
        $this->persons = $persons;
    }

    /**
     * @return mixed
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * @param mixed $licenses
     */
    public function setLicenses($licenses)
    {
        $this->licenses = $licenses;
    }

    /**
     * @return mixed
     */
    public function getLicenses()
    {
        return $this->licenses;
    }

    public function __construct() {
        $this->licenses = new ArrayCollection();
        $this->persons = new ArrayCollection();
    }

    public function __toString() {
        return $this->name;
    }


}
