<?php

namespace Src\Shared\ValueObjects;

use Illuminate\Pagination\LengthAwarePaginator;

readonly class Pagination
{
    public function __construct(
        private int $total,
        private int $perPage,
        private int $currentPage,
        private int $lastPage,
        private int $from,
        private int $to,
    ) {}

    public function toLengthAwarePaginator(): LengthAwarePaginator
    {
        $items = [];

        for ($i = 1; $i <= $this->total; $i++) {
            $items[] = $i;
        }

        $itemsForCurrentPage = array_slice($items, $this->from - 1, $this->perPage, true);

        return new LengthAwarePaginator(
            $itemsForCurrentPage,
            $this->total,
            $this->perPage,
            $this->currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
    }

    public function toArray(): array
    {
        return [
            'total'        => $this->total,
            'per_page'     => $this->perPage,
            'current_page' => $this->currentPage,
            'last_page'    => $this->lastPage,
            'from'         => $this->from,
            'to'           => $this->to,
        ];
    }
}
