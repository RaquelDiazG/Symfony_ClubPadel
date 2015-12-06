<?php

namespace Miw\ClubPadelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Courts
 *
 * @ORM\Table(name="courts")
 * @ORM\Entity
 */
class Courts {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active = '1';

    /**
     * Constructor
     * @param boolean $active
     */
    public function __construct($active = true) {
        $this->active = $active;
    }

}
