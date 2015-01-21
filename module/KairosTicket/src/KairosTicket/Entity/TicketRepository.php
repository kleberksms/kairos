<?php

namespace KairosTicket\Entity;

class TicketRepository extends AbstractEntityRepository
{

    public function __construct()
    {
        $this->entity = 'KairosTicket\Entity\Ticket';

    }
} 