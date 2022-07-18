<?php
namespace verbb\calendarlinks\services;

use verbb\calendarlinks\models\CalendarLink;

use craft\base\Component;

use Spatie\CalendarLinks\Link;

use DateTime;

class Service extends Component
{
    // Public Methods
    // =========================================================================

    public function create(array $options = []): CalendarLink
    {
        $default = [
            'text' => 'No text',
            'from' => (new DateTime())->modify('00:00'),
            'to' => (new DateTime())->modify('midnight'),
        ];

        $options = array_merge($default, $options);
        $link = Link::create($options['text'], $options['from'], $options['to']);

        if (!empty($options['description'])) {
            $link->description($options['description']);
        }

        if (!empty($options['address'])) {
            $link->address($options['address']);
        }

        return new CalendarLink(['link' => $link]);
    }
}