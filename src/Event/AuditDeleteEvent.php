<?php

namespace AuditStash\Event;

use Datetime;

/**
 * Represents an audit log event for a newly deleted record.
 */
class AuditDeleteEvent extends BaseEvent
{
    use BaseEventTrait;
    use SerializableEventTrait {
        basicSerialize as public jsonSerialize;
    }

    /**
     * Construnctor.
     *
     * @param string $transactionId The global transaction id
     * @param mixed $id The primary key record that got deleted
     * @param string $source The name of the source (table) where the record was deleted
     * @param string|null $displayValue The display field's value
     * @param array $original The original values the entity had before it got changed
     * @param null $parentSource The name of the source (table) that triggered this change
     */
    public function __construct(string $transactionId, $id, $source, ?string $displayValue, array $original = [], $parentSource = null)
    {
        parent::__construct($transactionId, $id, $source, [], $original, $displayValue);
    }

    /**
     * Returns the name of this event type.
     *
     * @return string
     */
    public function getEventType(): string
    {
        return 'delete';
    }
}
