<?php
namespace HcbComments\Entity;

use Doctrine\ORM\Mapping as ORM;
use HcBackend\Entity\EntityInterface;
use HcBackend\Entity\User;

/**
 * MappedComment
 *
 * @ORM\Table(name="comment")
 * @ORM\MappedSuperclass
 */
class MappedComment implements EntityInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content = '';

    /**
     * @var User
     *
     * @ORM\OneToOne(targetEntity="HcBackend\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="approved", type="integer", nullable=false)
     */
    private $approved;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_timestamp", type="datetime", nullable=false)
     */
    private $createdTimestamp;

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
     * Set approved
     *
     * @param int $approved
     * @return MappedComment
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;

        return $this;
    }

    /**
     * Get approved
     *
     * @return int
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return MappedComment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdTimestamp
     *
     * @param \DateTime $createdTimestamp
     * @return MappedComment
     */
    public function setCreatedTimestamp($createdTimestamp)
    {
        $this->createdTimestamp = $createdTimestamp;

        return $this;
    }

    /**
     * Get createdTimestamp
     *
     * @return \DateTime
     */
    public function getCreatedTimestamp()
    {
        return $this->createdTimestamp;
    }

    /**
     * Set user
     *
     * @param \HcBackend\Entity\User $user
     * @return MappedComment
     */
    public function setUser(\HcBackend\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \HcBackend\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
