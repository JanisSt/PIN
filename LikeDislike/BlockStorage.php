<?php

class BlockStorage
{
    private string $path;
    private array $blocks = [];

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->getFromCSV();

    }

    public function getFromCSV(): void
    {
        $files = file_get_contents($this->path);

        $files = json_decode($files, true);
        foreach ($files as $file) {
            //var_dump($file);
            foreach ($file as $fil) {
                $this->blocks[] = new Block($fil['link'], $fil['likes']);

            }
        }
    }

    public function getBlocks(): array
    {

        return $this->blocks;
    }

    public function addToCSV(): void
    {
        $file = ['blocks' => []];
        foreach ($this->blocks as $block) {
            $file['blocks'][] = ['link' => $block->getLink(), 'likes' => $block->getLikes()];
        }
        $save = json_encode($file);
        file_put_contents($this->path, $save);
    }

    public function like(int $id): void
    {
        $this->blocks[$id]->upVote();
        $this->addToCSV();
    }

    public function dislike(int $id): void
    {
        $this->blocks[$id]->downVote();
        $this->addToCSV();

    }
}


