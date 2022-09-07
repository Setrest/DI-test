<?php

namespace App\Domain\Records\DTOs;

use App\Infrastructure\Domain\DTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RecordDTO extends DTO
{
    protected ?int $id;

    public function __construct(public string $name, public string $secondName, public string $patronymic, public string $email, public string $phone)
    {}

    public static function fromJson(string $json): DTO
    {
        $data = json_decode($json, true);

        $dto = new self(
            name: $data['name'],
            secondName: $data['secondName'],
            patronymic: $data['patronymic'],
            email:$data['email'],
            phone:$data['phone'],
        );

        return $dto;
    }

    public static function fromModel(Model $model): DTO
    {
        $data = $model->toArray();

        $dto = new self(
            name: $data['name'],
            secondName: $data['second_name'],
            patronymic: $data['patronymic'],
            email:$data['email'],
            phone:$data['phone'],
        );

        return $dto->setId($data['id']);
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function fio(): string
    {
        return "{$this->secondName} {$this->name} {$this->patronymic}";
    }
}