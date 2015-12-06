<?php

namespace Miw\ClubPadelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groups
 *
 * @ORM\Table(name="groups", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_F06D39705E237E06", columns={"name"})})
 * @ORM\Entity
 */
class Groups {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array", nullable=false)
     */
    private $roles;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Miw\ClubPadelBundle\Entity\Users", mappedBy="group")
     */
    private $user;

    /**
     * Constructor
     *
     * @param string $name
     * @param array $roles
     */
    public function __construct($name = null, $roles = array()) {
        $this->name = $name;
        $this->roles = $roles;
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
