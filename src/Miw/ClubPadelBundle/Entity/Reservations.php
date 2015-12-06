<?php

namespace Miw\ClubPadelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservations
 *
 * @ORM\Table(name="reservations", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_4DA23963AE193F", columns={"court"}), @ORM\UniqueConstraint(name="UNIQ_4DA2398D93D649", columns={"user"})})
 * @ORM\Entity
 */
class Reservations {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime", nullable=false)
     */
    private $datetime;

    /**
     * @var \Miw\ClubPadelBundle\Entity\Courts
     *
     * @ORM\ManyToOne(targetEntity="Miw\ClubPadelBundle\Entity\Courts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="court", referencedColumnName="id")
     * })
     */
    private $court;

    /**
     * @var \Miw\ClubPadelBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Miw\ClubPadelBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * Constructor
     *
     * @param dateTime $datetime
     * @param integer $court
     * @param integer $user
     */
    public function __construct($datetime = null) {
        $this->datetime = $datetime;
    }

}
