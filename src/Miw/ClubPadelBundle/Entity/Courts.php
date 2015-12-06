<?php

namespace Miw\ClubPadelBundle\Entity;

/**
 * Courts
 */
class Courts
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $active = '1';


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
     * Set active
     *
     * @param boolean $active
     *
     * @return Courts
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }
}

