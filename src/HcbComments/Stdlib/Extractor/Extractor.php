<?php
namespace HcbBlog\Stdlib\Extractor;

use Zf2Libs\Stdlib\Extractor\ExtractorInterface;
use Zf2Libs\Stdlib\Extractor\Exception\InvalidArgumentException;
use HcbComments\Entity\Comment as CommentEntity;

class Extractor implements ExtractorInterface
{
    /**
     * Extract values from an object
     *
     * @param  CommentEntity $post
     * @throws \Zf2Libs\Stdlib\Extractor\Exception\InvalidArgumentException
     * @return array
     */
    public function extract($comment)
    {
        if (!$comment instanceof CommentEntity) {
            throw new InvalidArgumentException("Expected HcbComments\\Entity\\Comment object,
                                                invalid object given");
        }

        return array('id'=>$comment->getId());
    }
}
