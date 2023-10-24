<?php

namespace App\Service;

class RotaService
{

    private static function getRotaAlias(): string
    {
        return request()->route()->action['as'];
    }

    private static function getRotaBase(): string
    {
        return explode('.', request()->route()->action['as'])[0];
    }

    public static function getTitulo(string $resource): string
    {
        $rota_alias = strstr(self::getRotaAlias(), '.');
        return match ($rota_alias) {
            '.index' => 'Lista de ' . $resource . 's',
            '.create' => 'Criar ' . $resource,
            '.edit' => 'Editar ' . $resource,
            default => ''
        };
    }

    public static function getRotaCreate()
    {
        return self::getRotaBase() . '.create';
    }

    private static function getRotaStore()
    {
        return self::getRotaBase() . '.store';
    }

    private static function getRotaUpdate()
    {
        return self::getRotaBase() . '.update';
    }

    public static function getRotaForm()
    {
        $rota_alias = strstr(self::getRotaAlias(), '.');
        $id = request()->route()->parameter('id');
        return match ($rota_alias) {
            '.create' => route(self::getRotaStore()),
            '.edit' => route(self::getRotaUpdate(), ['id' => $id]),
        };
    }

    public static function getRotaEdit(string $id): string
    {
        return route(self::getRotaBase() . '.edit', ['id' => $id]);
    }

    public static function getRotaDelete(string $id): string
    {
        return route(self::getRotaBase() . '.delete', ['id' => $id]);
    }

}
