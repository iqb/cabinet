<?php

/*
 * This file is part of Cabinet - file access abstraction library for PHP.
 * (c) 2017 by Dennis Birkholz
 * All rights reserved.
 * For the license to use this library, see the provided LICENSE file.
 */

namespace Iqb\Cabinet\FileSystem;

use Iqb\Cabinet\FileInterface;
use Iqb\Cabinet\FolderInterface;

class File extends Entry implements FileInterface
{
    /**
     * Hash of the file
     * @var string
     */
    private $md5;


    /** @inheritdoc */
    public function delete() : bool
    {

    }


    /** @inheritdoc */
    final public function getSize(): int
    {
        return $this->stat->size;
    }


    /** @inheritdoc */
    final public function hasHash(): bool
    {
        return ($this->md5 !== null);
    }


    /** @inheritdoc */
    final public function getHash(): string
    {
        if ($this->md5 === null) {
            $this->md5 = $this->driver->hashFile($this);
        }

        return $this->md5;
    }
}
