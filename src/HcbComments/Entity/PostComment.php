<?php
namespace HcbComments\Entity;

use Doctrine\ORM\Mapping as ORM;
use HcbBlog\Entity\Post;

/**
 * PostComment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity
 */
class PostComment extends MappedComment
{
    /**
     * @var Post
     *
     * @ORM\ManyToOne(targetEntity="HcbBlog\Entity\Post", cascade={"persist"})
     * @ORM\JoinTable(name="post_comment",
     *   joinColumns={
     *     @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="comment_id", referencedColumnName="id")
     *   }
     * )
     */
    private $post = null;

    /**
     * Set post
     *
     * @param \HcbBlog\Entity\Post $post
     * @return Comment
     */
    public function setPost(\HcbBlog\Entity\Post $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \HcbBlog\Entity\Post 
     */
    public function getPost()
    {
        return $this->post;
    }
}
