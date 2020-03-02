<?php

namespace Studit\H5PBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="ContentRepository")
 * @ORM\Table(name="h5p_content")
 * @ORM\HasLifecycleCallbacks()
 */
class Content
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="laboratory_id", type="integer", nullable=true)
     */
    private $laboratory;

    /**
     * @var Library
     *
     * @ORM\ManyToOne(targetEntity="\Studit\H5PBundle\Entity\Library")
     * @ORM\JoinColumn(name="library_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $library;
    /**
     * @var string
     *
     * @ORM\Column(name="parameters", type="text", nullable=true)
     */
    private $parameters;
    /**
     * @var string
     *
     * @ORM\Column(name="filtered_parameters", type="text", nullable=true)
     */
    private $filteredParameters;
    /**
     * @var int
     *
     * @ORM\Column(name="disabled_features", type="integer", nullable=true)
     */
    private $disabledFeatures;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_published", type="boolean", options={"default":"0"})
     */
    protected $isPublished = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_deleted", type="boolean", options={"default":"0"})
     */
    protected $isDeleted = false;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_date", type="datetime")
     */
    protected $createDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_date", type="datetime")
     */
    protected $updateDate;

    public function __construct()
    {
        $this->createDate = new \DateTime();
        $this->updateDate = new \DateTime();
    }

    public function __clone()
    {
        $this->id = null;
    }
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @return integer
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @param integer $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }    

    public function getLaboratory()
    {
        return $this->laboratory;
    }

    public function setLaboratory($laboratory)
    {
        $this->laboratory = $laboratory;

        return $this;
    }
    
    /**
     * @return Library
     */
    public function getLibrary()
    {
        return $this->library;
    }
    /**
     * @param Library $library
     */
    public function setLibrary($library)
    {
        $this->library = $library;
    }
    /**
     * @return string
     */
    public function getParameters()
    {
        return $this->parameters;
    }
    /**
     * @param string $parameters
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }
    /**
     * @return string
     */
    public function getFilteredParameters()
    {
        return $this->filteredParameters;
    }
    /**
     * @param string $filteredParameters
     */
    public function setFilteredParameters($filteredParameters)
    {
        $this->filteredParameters = $filteredParameters;
    }
    /**
     * @return int
     */
    public function getDisabledFeatures()
    {
        return $this->disabledFeatures;
    }
    /**
     * @param int $disabledFeatures
     */
    public function setDisabledFeatures($disabledFeatures)
    {
        $this->disabledFeatures = $disabledFeatures;
    }

    /**
     * Set createDate
     *
     * @ORM\PrePersist
     */
    public function setCreateDate()
    {
        $this->createDate = new \DateTime();

        return $this;
    }

    /**
     * Get createDate
     *
     * @return \DateTime
     */
    public function getCreateDate(): ? \Datetime
    {
        return $this->createDate;
    }

    /**
     * Set updateDate
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setUpdateDate()
    {
        $this->updateDate = new \DateTime();

        return $this;
    }

    /**
     * Get updateDate
     *
     * @return \DateTime
     */
    public function getUpdateDate(): ? \Datetime
    {
        return $this->updateDate;
    } 

    /**
     * Set isDeleted
     *
     * @param bool $isDeleted
     * @return self
     */
    public function setIsDeleted(int $isDeleted)
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return bool
     */
    public function getIsDeleted(): ?int
    {
        return $this->isDeleted;
    } 

    /**
     * Set isPublished
     *
     * @param bool $isPublished
     * @return self
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    /**
     * Get isPublished
     *
     * @return bool
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }          
}