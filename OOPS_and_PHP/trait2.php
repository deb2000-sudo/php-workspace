<?php

// 1. DEFINE THE TAGGING TOOLKIT
trait Taggable {
    // The trait can even have its own properties!
    protected $tags = [];

    public function addTag($tag) {
        $this->tags[] = $tag;
    }

    public function getTags() {
        return implode(", ", $this->tags);
    }
}

// 2. CREATE CLASSES THAT NEED TAGGING
class Article {
    use Taggable;
    public $title;
    public function __construct($title) {
        $this->title = $title;
    }
}

class Video {
    use Taggable;
    public $videoUrl;
    public function __construct($url) {
        $this->videoUrl = $url;
    }
}


// 3. LET'S USE THEM!
$article = new Article("Learning PHP Traits");
$article->addTag("php");
$article->addTag("oop");
$article->addTag("tutorial");

$video = new Video("my-cool-video.mp4");
$video->addTag("funny");
$video->addTag("cats");

echo "Article Tags: " . $article->getTags();
// Output: Article Tags: php, oop, tutorial
echo "<br>";
echo "Video Tags: " . $video->getTags();
// Output: Video Tags: funny, cats