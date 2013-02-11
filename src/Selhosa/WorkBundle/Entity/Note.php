<?php

namespace Selhosa\WorkBundle\Entity;

/**
 * Note
 */
class Note
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var \Selhosa\WorkBundle\Entity\WorkOrder
     */
    private $workorder;


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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Note
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Note
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param \Selhosa\WorkBundle\Entity\WorkOrder $workorder
     */
    public function setWorkorder($workorder)
    {
        $this->workorder = $workorder;

        return $this->workorder;
    }

    /**
     * @return \Selhosa\WorkBundle\Entity\WorkOrder
     */
    public function getWorkorder()
    {
        return $this->workorder;
    }


}
