<?php
namespace App\Extensions;

use League\CommonMark\EnvironmentInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Block\Element\ListBlock;

class AddListStyleClassesRenderer {

    /**
     * @param DocumentParsedEvent $e
     *
     * @return void
     */
    public function __invoke(DocumentParsedEvent $e)
    {
        $walker = $e->getDocument()->walker();

        while ($event = $walker->next()) {
            $node = $event->getNode();
            if ($node instanceof ListBlock) {
                $node->data['attributes'] = array('class' => 'list-disc list-inside');
            }
        }
    }

}