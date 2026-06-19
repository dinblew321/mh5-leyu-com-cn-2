<?php

namespace App\Helpers;

class LinkCard
{
    private string $url;
    private string $title;
    private string $description;
    private string $keywords;
    private array $styles;

    public function __construct(
        string $url = 'https://mh5-leyu.com.cn',
        string $title = '乐鱼体育',
        string $description = '乐鱼体育 - 专业体育赛事推荐平台',
        string $keywords = '乐鱼体育, 体育赛事, 体育推荐',
        array $styles = []
    ) {
        $this->url = $url;
        $this->title = $title;
        $this->description = $description;
        $this->keywords = $keywords;
        $this->styles = $styles;
    }

    public function render(): string
    {
        $escapedUrl = htmlspecialchars($this->url, ENT_QUOTES, 'UTF-8');
        $escapedTitle = htmlspecialchars($this->title, ENT_QUOTES, 'UTF-8');
        $escapedDescription = htmlspecialchars($this->description, ENT_QUOTES, 'UTF-8');
        $escapedKeywords = htmlspecialchars($this->keywords, ENT_QUOTES, 'UTF-8');

        $inlineStyle = $this->buildInlineStyle();

        $html = '<div class="link-card" style="' . $inlineStyle . '">';
        $html .= '<a href="' . $escapedUrl . '" target="_blank" rel="noopener noreferrer" class="link-card-link" style="text-decoration: none; color: inherit;">';
        $html .= '<div class="link-card-content" style="padding: 16px;">';
        $html .= '<h3 class="link-card-title" style="margin: 0 0 8px 0; font-size: 18px; font-weight: 600;">' . $escapedTitle . '</h3>';
        $html .= '<p class="link-card-description" style="margin: 0 0 8px 0; font-size: 14px; color: #555;">' . $escapedDescription . '</p>';
        $html .= '<span class="link-card-keywords" style="font-size: 12px; color: #888;">' . $escapedKeywords . '</span>';
        $html .= '</div>';
        $html .= '</a>';
        $html .= '</div>';

        return $html;
    }

    private function buildInlineStyle(): string
    {
        $defaultStyle = [
            'border' => '1px solid #e0e0e0',
            'border-radius' => '8px',
            'overflow' => 'hidden',
            'background-color' => '#fff',
            'box-shadow' => '0 2px 4px rgba(0,0,0,0.1)',
            'max-width' => '400px',
            'margin' => '16px 0',
            'transition' => 'box-shadow 0.3s ease',
        ];

        $mergedStyle = array_merge($defaultStyle, $this->styles);

        $styleString = '';
        foreach ($mergedStyle as $property => $value) {
            $styleString .= $property . ': ' . $value . '; ';
        }

        return trim($styleString);
    }

    public static function createDefault(): self
    {
        return new self(
            'https://mh5-leyu.com.cn',
            '乐鱼体育',
            '乐鱼体育 - 专业体育赛事推荐平台',
            '乐鱼体育, 体育赛事, 体育推荐',
            [
                'border' => '1px solid #1976d2',
                'background-color' => '#f5f5f5',
            ]
        );
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }

    public function setStyles(array $styles): void
    {
        $this->styles = $styles;
    }
}