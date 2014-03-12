<?php

namespace TomCan\CatalogueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SoftwareTitle
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class SoftwareTitle
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
     * @var string
     *
     * @ORM\Column(name="Version", type="string", length=255)
     */
    private $version;

    /**
     * @var integer
     *
     * @ORM\Column(name="Status", type="integer")
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="LicenseType", type="string", length=255)
     */
    private $licenseType;

    /**
     * @ORM\ManyToOne(targetEntity="Vendor", inversedBy="id")
     */
    private $vendor;

    /**
     * @ORM\ManyToOne(targetEntity="SoftwareCategory", inversedBy="id")
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="Remark", type="text", nullable=true)
     */
    private $remark;

    /**
     * @ORM\OneToMany(targetEntity="SoftwareLicense", mappedBy="id")
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
     * @return SoftwareTitle
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
     * Set version
     *
     * @param string $version
     * @return SoftwareTitle
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return SoftwareTitle
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set licenseType
     *
     * @param string $licenseType
     * @return SoftwareTitle
     */
    public function setLicenseType($licenseType)
    {
        $this->licenseType = $licenseType;

        return $this;
    }

    /**
     * Get licenseType
     *
     * @return string 
     */
    public function getLicenseType()
    {
        return $this->licenseType;
    }

    /**
     * Set vendor
     *
     * @param string $vendor
     * @return SoftwareTitle
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
     * Set remark
     *
     * @param string $remark
     * @return SoftwareTitle
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
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    function __toString()
    {
        return $this->getVendor()->getName() . " " . $this->name . " " . $this->version;
    }


}
