<?php

class ReadingTracker {
    private $title;
    private $author;
    private $totalPages;
    private $pagesRead;
    private $isComplete;

    /**
     * Initializes a new ReadingTracker object with the given title, author, and total pages.
     *
     * @param string $title The title of the book.
     * @param string $author The author of the book.
     * @param int $totalPages The total number of pages in the book.
     *
     * @return void
     */
    /**
     * Initializes a new ReadingTracker object with the given title, author, and total pages.
     *
     * @param string $title The title of the book.
     * @param string $author The author of the book.
     * @param int $totalPages The total number of pages in the book.
     *
     * @return void
     */
    public function __construct($title, $author, $totalPages) {
        $this->title = $title;
        $this->author = $author;
        $this->totalPages = $totalPages;
        $this->pagesRead = 0;
        $this->isComplete = false;
    }

    /**
     * Marks the reading as complete by setting the pages read to the total pages and the completion status to true.
     *
     * @return void
     */
    public function markComplete() {
        $this->pagesRead = $this->totalPages;
        $this->isComplete = true;
    }

    /**
     * Displays a summary of the reading tracker's current status.
     *
     * @return void
     */
    public function displaySummary() {
        echo "Your Reading Tracker:\n";
        echo "- Title: \"{$this->title}\"\n";
        echo "- Author: {$this->author}\n";
        echo "- Pages Read: {$this->pagesRead} of {$this->totalPages}\n";
        echo "- Complete: " . ($this->isComplete ? "Yes" : "No") . "\n";
        echo " Summary: You've read " . $this->getProgress() . " of this book.\n";
        echo "\n--\n\n";
    }

    /**
     * Adds the specified number of pages to the total pages read.
     * If the total pages read exceeds the total pages of the book,
     * the pages read will be set to the total pages and the completion status will be marked as true.
     *
     * @param int $pages The number of pages to add to the total pages read.
     *
     * @return void
     */
    public function addPages($pages) {
        $this->pagesRead += $pages;
        if ($this->pagesRead >= $this->totalPages) {
            $this->pagesRead = $this->totalPages;
            $this->isComplete = true;
        }
    }

    /**
     * Calculates and returns the reading progress as a percentage.
     *
     * @return string The reading progress in percentage format.
     */
    public function getProgress() {
        return round(($this->pagesRead / $this->totalPages) * 100, 2) . "%";
    }
}

$book1 = new ReadingTracker("Life and Work", "Ray Dalio", 500);
$book1->addPages(150);
$book1->displaySummary();

$book2 = new ReadingTracker("Tools of Titans", "Tim Ferriss", 700);
$book2->markComplete();
$book2->displaySummary();



