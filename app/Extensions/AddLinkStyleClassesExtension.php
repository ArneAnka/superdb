<?php

namespace App\Extensions;

use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\ExtensionInterface;

class AddLinkStyleClassesExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment): void
    {
            $environment
                ->addEventListener(DocumentParsedEvent::class, new AddLinkStyleClassesRenderer());
        ;
    }
}