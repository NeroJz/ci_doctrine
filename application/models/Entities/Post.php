<?php
/**
 * Created by PhpStorm.
 * User: amtisb2
 * Date: 5/2/2016
 * Time: 2:10 PM
 */

namespace Entities;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\DBAL\Schema\Table;
use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="post", indexes={
 *  @Index(name="publication_date_idx", columns="publicationDate")
 * })
 */
class Post
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
     * @Column(type="string")
     */
    protected $title;


    /**
     * @var string
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
     * @var Comment[]
     *
     * @OneToMany(targetEntity="Comment", mappedBy="post")
     */
    protected $comments;

    /**
     * Initializes Collections
     */
    public function __construct(){
        $this->comments = new ArrayCollection();
    }
    

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
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     *
     * @return Post
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
     * @return Post
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
     * Add comment
     *
     * @param \Entities\Comment $comment
     *
     * @return Post
     */
    public function addComment(\Entities\Comment $comment)
    {
        $this->comments[] = $comment;
        $comment->setPost($this);

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \Entities\Comment $comment
     */
    public function removeComment(\Entities\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
