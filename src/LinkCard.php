<?php

namespace App\Render;

class LinkCard
{
    private string $siteUrl;
    private string $siteName;
    private string $description;
    private string $keywords;
    private string $backgroundColor;
    private string $textColor;

    public function __construct(
        string $siteUrl = 'https://site-portal-leisu.com',
        string $siteName = '雷速门户',
        string $description = '提供雷速相关资讯与服务的综合平台。',
        string $keywords = '雷速, 资讯, 服务',
        string $backgroundColor = '#1a73e8',
        string $textColor = '#ffffff'
    ) {
        $this->siteUrl = $siteUrl;
        $this->siteName = $siteName;
        $this->description = $description;
        $this->keywords = $keywords;
        $this->backgroundColor = $backgroundColor;
        $this->textColor = $textColor;
    }

    public function render(): string
    {
        $escapedUrl = htmlspecialchars($this->siteUrl, ENT_QUOTES, 'UTF-8');
        $escapedName = htmlspecialchars($this->siteName, ENT_QUOTES, 'UTF-8');
        $escapedDesc = htmlspecialchars($this->description, ENT_QUOTES, 'UTF-8');
        $escapedKeywords = htmlspecialchars($this->keywords, ENT_QUOTES, 'UTF-8');
        $escapedBg = htmlspecialchars($this->backgroundColor, ENT_QUOTES, 'UTF-8');
        $escapedColor = htmlspecialchars($this->textColor, ENT_QUOTES, 'UTF-8');

        $html = '<div class="link-card" style="background-color: ' . $escapedBg . '; color: ' . $escapedColor . '; padding: 16px; border-radius: 12px; max-width: 360px; font-family: sans-serif;">';
        $html .= '<a href="' . $escapedUrl . '" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: none;">';
        $html .= '<h3 style="margin: 0 0 8px 0; font-size: 20px;">' . $escapedName . '</h3>';
        $html .= '<p style="margin: 0 0 12px 0; font-size: 14px; line-height: 1.4;">' . $escapedDesc . '</p>';
        $html .= '<span style="font-size: 12px; opacity: 0.8;">关键词: ' . $escapedKeywords . '</span>';
        $html .= '</a>';
        $html .= '</div>';

        return $html;
    }

    public static function createDefault(): self
    {
        return new self();
    }

    public static function createFromArray(array $config): self
    {
        return new self(
            $config['siteUrl'] ?? 'https://site-portal-leisu.com',
            $config['siteName'] ?? '雷速',
            $config['description'] ?? '',
            $config['keywords'] ?? '雷速',
            $config['backgroundColor'] ?? '#1a73e8',
            $config['textColor'] ?? '#ffffff'
        );
    }
}