<?php

class Block
{
    private string $link;
    private int $likes;

    public function __construct(string $link, int $likes)
    {

        $this->link = $link;
        $this->likes = $likes;
    }

    public function getLikes(): int
    {
        return $this->likes;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function upVote(): void
    {
        //return $this->likes++;
        $this->likes++;
    }

    public function downVote(): void
    {
        $this->likes--;
    }


}