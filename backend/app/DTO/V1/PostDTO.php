<?php

namespace App\DTO\V1;

use DateTime;
use Illuminate\Foundation\Http\FormRequest;

readonly class PostDTO
{
    public function __construct(
        public string $title,
        public ?string $body,
        public ?DateTime $publish_at=null)
    {
    }

    public function toArray(): array
    {
        return [
            'title'       => $this->title,
            'body'        => $this->body,
            'publish_at'  => $this->publish_at?->format('Y-m-d H:i:s'),
        ];
    }

    public static function fromRequest(FormRequest $request): self
    {
        return new self(
            title: $request->input('title'),
            body: $request->input('body'),
            publish_at: $request->input('publish_at')?->format('Y-m-d H:i:s')
        );
    }
}
