<?php

namespace Mail\Service;

class TemplateRendererService
{
    public function render(string $template, array $data = []): string
    {
        return strtr($template, $data);
    }
}
