<?php

namespace Iqb\Cabinet;

interface EntryInterface
{
    /**
     * Get the complete path of the file or directory
     *
     * @return string
     */
    function getPath() : string;

    /**
     * Get the name this file is known by.
     * A file name should be unique for the same parent but some file system may implement it otherwise
     *
     * @return string
     */
    function getName() : string;

    /**
     * Change the name of this entry.
     * On error, an Exception must be thrown
     *
     * @param string $newName
     * @throws \InvalidArgumentException
     */
    function rename(string $newName);

    /**
     * Check whether the file has at least one parent.
     * Most file systems will only allow a single parent but some allow more than one parent.
     *
     * @return bool
     */
    function hasParents() : bool;

    /**
     * Get the (first) folder this entry is contained in
     *
     * @return FolderInterface
     */
    function getParent() : FolderInterface;

    /**
     * Get all folders this entry is contained in
     *
     * @return FolderInterface[]
     */
    function getParents() : array;

    /**
     * Delete the entry from all its parents
     *
     * @return bool
     */
    function delete() : bool;

    /**
     * Get the size of the file or the total size of the directory in bytes
     *
     * @return int
     */
    function getSize() : int;
}
