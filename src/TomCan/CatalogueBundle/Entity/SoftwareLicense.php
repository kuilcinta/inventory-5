<?php

namespace TomCan\CatalogueBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * SoftwareLicense
 *
 * @ORM\Table(name="softwarelicense")
 * @ORM\Entity(repositoryClass="SoftwareLicenseRepository")
 */
class SoftwareLicense
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
     * @ORM\ManyToOne(targetEntity="SoftwareTitle", inversedBy="licenses")
     */
    private $softwareTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="SoftwareLicenseType", type="string", length=255)
     */
    private $softwareLicenseType;

    /**
     * @var integer
     *
     * @ORM\Column(name="Seats", type="integer")
     */
    private $seats;

    /**
     * @var string
     *
     * @ORM\Column(name="LicenseKey", type="text")
     */
    private $licenseKey;

    /**
     * @var string
     *
     * @ORM\Column(name="Remark", type="text", nullable=true)
     */
    private $remark;

    /**
     * @var string
     *
     * @ORM\Column(name="UpgradedFrom", type="string", length=255, nullable=True)
     */
    private $upgradedFrom;

    /**
     * @var string
     *
     * @ORM\Column(name="UpgradedTo", type="string", length=255, nullable=True)
     */
    private $upgradedTo;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=255, nullable=True)
     */
    private $alias;

    /**
     * @ORM\ManyToMany(targetEntity="Device", mappedBy="licenses")
     */
    private $devices;

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
     * Set softwareTitle
     *
     * @param string $softwareTitle
     * @return SoftwareLicense
     */
    public function setSoftwareTitle($softwareTitle)
    {
        $this->softwareTitle = $softwareTitle;

        return $this;
    }

    /**
     * Get softwareTitle
     *
     * @return string 
     */
    public function getSoftwareTitle()
    {
        return $this->softwareTitle;
    }

    /**
     * Set softwareLicenseType
     *
     * @param string $softwareLicenseType
     * @return SoftwareLicense
     */
    public function setSoftwareLicenseType($softwareLicenseType)
    {
        $this->softwareLicenseType = $softwareLicenseType;

        return $this;
    }

    /**
     * Get softwareLicenseType
     *
     * @return string 
     */
    public function getSoftwareLicenseType()
    {
        return $this->softwareLicenseType;
    }

    /**
     * Set seats
     *
     * @param integer $seats
     * @return SoftwareLicense
     */
    public function setSeats($seats)
    {
        $this->seats = $seats;

        return $this;
    }

    /**
     * Get seats
     *
     * @return integer 
     */
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * Set licenseKey
     *
     * @param string $licenseKey
     * @return SoftwareLicense
     */
    public function setLicenseKey($licenseKey)
    {
        $this->licenseKey = $licenseKey;

        return $this;
    }

    /**
     * Get licenseKey
     *
     * @return string 
     */
    public function getLicenseKey()
    {
        return $this->licenseKey;
    }

    /**
     * Set remark
     *
     * @param string $remark
     * @return SoftwareLicense
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * Get remark
     *
     * @return string 
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Set upgradedFrom
     *
     * @param string $upgradedFrom
     * @return SoftwareLicense
     */
    public function setUpgradedFrom($upgradedFrom)
    {
        $this->upgradedFrom = $upgradedFrom;

        return $this;
    }

    /**
     * Get upgradedFrom
     *
     * @return string 
     */
    public function getUpgradedFrom()
    {
        return $this->upgradedFrom;
    }

    /**
     * Set upgradedTo
     *
     * @param string $upgradedTo
     * @return SoftwareLicense
     */
    public function setUpgradedTo($upgradedTo)
    {
        $this->upgradedTo = $upgradedTo;

        return $this;
    }

    /**
     * Get upgradedTo
     *
     * @return string 
     */
    public function getUpgradedTo()
    {
        return $this->upgradedTo;
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
     * @param mixed $devices
     */
    public function setDevices($devices)
    {
        $this->devices = $devices;
    }

    /**
     * @return mixed
     */
    public function getDevices()
    {
        return $this->devices;
    }

    public function __construct() {
        $this->devices = new ArrayCollection();
        $this->persons = new ArrayCollection();
    }

    public function __toString() {
        return "License " . $this->id;
    }

    /**
     * @param string $alias
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

}
