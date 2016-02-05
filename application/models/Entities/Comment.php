<?php
/**
 * Created by PhpStorm.
 * User: amtisb2
 * Date: 5/2/2016
 * Time: 4:06 PM
 */

namespace Entities;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\ManyToOne;


/**
 * Comment entity
 *
 * @Entity
 * @Table(name="comment")
 */
class Comment
{
    /**
     * @var int
     *
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    protected $id;


    /**
     * @var string
     *
     * @Column(type="text")
     */
    protected $body;


    /**
     * @var \DateTime
     *
     * @Column(type="datetime")
     */
    protected $publicationDate;


    /**
     * @var Post
     *
     * @ManyToOne(targetEntity="Post", inversedBy="comments")
     */
    protected $post;

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
     * Set body
     *
     * @param string $body
     *
     * @return Comment
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set publicationDate
     *
     * @param \DateTime $publicationDate
     *
     * @return Comment
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * Get publicationDate
     *
     * @return \DateTime
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Set post
     *
     * @param \Entities\Post $post
     *
     * @return Comment
     */
    public function setPost(\Entities\Post $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \Entities\Post
     */
    public function getPost()
    {
        return $this->post;
    }
}
