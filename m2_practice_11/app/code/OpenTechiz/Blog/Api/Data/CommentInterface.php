<?php

namespace OpenTechiz\Blog\Api\Data;


interface CommentInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const COMMENT_ID       = 'post_id';
    const CONTENT       = 'url_key';
    const AUTHOR         = 'title';
    const POST_ID       = 'content';
    const CREATION_TIME = 'creation_time';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get content
     *
     * @return string
     */
    public function getContent();

    /**
     * Get author
     *
     * @return string|null
     */
    public function getAuthor();

    /**
     * Get post id
     *
     * @return int|null
     */
    public function getPostId();
    

    public function getCreationTime();


    public function setId($id);


    public function setContent($content);


    public function setAuthor($author);


    public function setPostId($post_id);


    public function setCreationTime($creationTime);

}
