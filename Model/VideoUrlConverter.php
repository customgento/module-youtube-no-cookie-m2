<?php

declare(strict_types=1);

namespace CustomGento\YouTubeNoCookie\Model;

class VideoUrlConverter
{
    private const YOUTUBE_NOCOOKIE_FORMAT = 'https://www.youtube-nocookie.com/embed/%s';

    public function convert(string $url): string
    {
        $youtubeId = $this->getYouTubeIdFromUrl($url);
        if (!$youtubeId) {
            return $url;
        }

        return sprintf(self::YOUTUBE_NOCOOKIE_FORMAT, $youtubeId);
    }

    /**
     * @param string $url
     *
     * @return string
     * @see https://stackoverflow.com/a/6556662/719023
     */
    private function getYouTubeIdFromUrl(string $url): string
    {
        $pattern = '%^        # Match any youtube URL
            (?:https?:\/\/)?  # Optional scheme. Either http or https
            (?:www\.)?        # Optional www subdomain
            (?:               # Group host alternatives
              youtu\.be\/     # Either youtu.be,
              |youtube\.com    # or youtube.com
              (?:             # Group path alternatives
                \/embed\/     # Either /embed/
                |\/v\/       # or /v/
                |\/watch\?v= # or /watch\?v=
              )               # End path alternatives.
            )                 # End host alternatives.
            ([\w-]{10,12})    # Allow 10-12 for 11 char youtube id.
            (?:&.*)*          # additional parameters
            $%x';
        $result  = preg_match($pattern, $url, $matches);
        if ($result) {
            return $matches[1];
        }

        return '';
    }
}
