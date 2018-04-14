<?php
/**
 * Created by PhpStorm.
 * User: Hellkiper
 * Date: 14.04.2018
 * Time: 12:18
 */

namespace Helkiper\PostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Comment
 * @package Helkiper\PostBundle\Entity
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="Helkiper\PostBundle\Repository\CommentRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Comment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="comments")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     */
    private $post;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="date")
     */
    private $createdAt;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content.
     *
     * @param string $content
     *
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return Comment
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set post.
     *
     * @param \Helkiper\PostBundle\Entity\Post|null $post
     *
     * @return Comment
     */
    public function setPost(\Helkiper\PostBundle\Entity\Post $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post.
     *
     * @return \Helkiper\PostBundle\Entity\Post|null
     */
    public function getPost()
    {
        return $this->post;
    }


    /**
     * @ORM\PrePersist()
     */
    public function prePersist()
    {
        $this->createdAt = new \DateTime();
    }
}
