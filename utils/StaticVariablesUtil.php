<?php
namespace src\utils;

class StaticVariablesUtil
{
    const minNumberOfCharacters = 3;
    const startingNumberOfCharacters = 5;
    const maxNumberOfCharacters = 30;
    const maxId = 826;
    const charactersUrl = 'https://rickandmortyapi.com/api/character/';

    public static function getCharactersUrl()
    {
        return self::charactersUrl;
    }

    public static function getMinNumberOfCharacters()
    {
        return self::minNumberOfCharacters;
    }

    public static function getMaxNumberOfCharacters()
    {
        return self::maxNumberOfCharacters;
    }

    public static function getMaxId()
    {
        return self::maxId;
    }

    public static function getStartingNumberOfCharacters()
    {
        return self::startingNumberOfCharacters;
    }
}