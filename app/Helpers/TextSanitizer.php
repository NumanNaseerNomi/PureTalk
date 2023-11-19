<?php

namespace App\Helpers;

use App\Models\Dictionary;

class TextSanitizer
{
    private $blockedWords;

    public function __construct()
    {
        $this->blockedWords = Dictionary::blockedWords();
    }

    public function sanitize($posts)
    {
        foreach($posts as $post)
        {
            $post->title = $this->replaceBlockedWords($post->title);
            $post->content = $this->replaceBlockedWords($post->content);

            foreach($post->comments as $comment)
            {
                $comment->content = $this->replaceBlockedWords($comment->content);
            }
        }
    }

    private function replaceBlockedWords($text)
    {
        foreach($this->blockedWords as $word)
        {
            $pattern = "/\b" . preg_quote($word, '/') . "\b/i";
            $text = preg_replace_callback($pattern, fn($matches) => $matches[0][0] . str_repeat('*', strlen($matches[0]) - 1), $text);
        }

        return $text;
    }
}
