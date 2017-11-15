<?php

namespace Mail\Repository;

class EmailTemplateRepository
{
    public function getDefaultHtmlTemplate(): string
    {
        return '<font size="12">%message%</font>';
    }
}
