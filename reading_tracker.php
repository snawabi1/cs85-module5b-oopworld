<?php
/**
 * Class ReadingTracker
 * Tracks the progress of a book being read.
 */
class ReadingTracker {
    private $title;
    private $author;
    private $totalPages;
    private $pagesRead;
    private $isComplete;

    /**
     * Constructor for ReadingTracker
     *
     * @param string $title
     * @param string $author
     * @param int $totalPages
     */
    public function __construct($title, $author, $totalPages) {
        $this->title = $title;
        $this->author = $author;
        $this->totalPages = $totalPages;
        $this->pagesRead = 0;
        $this->isComplete = false;
    }

    /**
     * Marks the book as complete.
     */
    public function markComplete() {
        $this->pagesRead = $this->totalPages;
        $this->isComplete = true;
    }

    /**
     * Displays a summary of the reading status.
     * Prediction: displaySummary() will output progress and book info in browser.
     * Prediction: getProgress() will return a string like "85%" based on pages read.
     */
    public function displaySummary() {
        echo "<strong>Your Reading Tracker:</strong><br>";
        echo "- Title: \"{$this->title}\"<br>";
        echo "- Author: {$this->author}<br>";
        echo "- Pages Read: {$this->pagesRead} of {$this->totalPages}<br>";
        echo "- Complete: " . ($this->isComplete ? "Yes" : "No") . "<br>";
        echo "Summary: You've read " . $this->getProgress() . " of this book.<br><br>";
    }

    /**
     * Adds pages read and updates status if finished.
     *
     * @param int $pages
     */
    public function addPages($pages) {
        $this->pagesRead += $pages;
        if ($this->pagesRead >= $this->totalPages) {
            $this->pagesRead = $this->totalPages;
            $this->isComplete = true;
        }
    }

    /**
     * Calculates reading progress.
     *
     * @return string
     */
    public function getProgress() {
        return round(($this->pagesRead / $this->totalPages) * 100, 2) . "%";
    }
}

// --- Testing the class ---
$book1 = new ReadingTracker("Life and Work", "Ray Dalio", 500);
$book1->addPages(150);
$book1->displaySummary();

$book2 = new ReadingTracker("Tools of Titans", "Tim Ferriss", 700);
$book2->markComplete();
$book2->displaySummary();
?>


