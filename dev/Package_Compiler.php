<?php
/**
 * Scoper to generate custom PHP-Scoper config
 *
 * PHP Version 8.1

 * @package Devkit_Scoper
 * @author  Bob Moore <bob@bobmoore.dev
 * @license GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.txt>
 * @link    https://github.com/bob-moore/Devkit-Plugin-Boilerplate
 * @see     https://github.com/OnTheGoSystems/twig-scoper
 * @since   1.0.0
 */

namespace Devkit\Apollo\Dev;

use Symfony\Component\Yaml\Yaml;

class Package_Compiler
{
    public static function compile(): void
    {
        $src = dirname( __FILE__, 2 ) . '/theme.yaml';
        $dest = dirname( __DIR__, 2 ) . '/theme.json';

        $parsed = self::parseYaml( $src );

        file_put_contents( $dest, json_encode( $parsed, JSON_PRETTY_PRINT ) );  
    }

    public static function parseYaml( string $src ): mixed
    {
        $src = is_file( $src ) ? $src : dirname( __DIR__, 2 ) . '/' . $src;

        if ( ! is_file( $src ) ) {
            return '';
        }

        $value = Yaml::parseFile( $src, Yaml::PARSE_CUSTOM_TAGS );

        $value = self::parseTags( $value );

        return $value;
    }

    public static function parseTags( mixed $value ): mixed
    {
        if ( is_array( $value ) ) {
            $value = array_map( [ self::class, 'parseTags' ], $value );
        }
        if ( is_object( $value ) ) {
            match ( $value->getTag() ) {
                'include' => $value = self::parseInclude( $value->getValue() ),
                default => $value = '',
            };
        }
        return $value;
    }

    public static function parseInclude( string $src ): string
    {
        $src = is_file( $src ) ? $src : dirname( __DIR__, 2 ) . '/' . $src;

        if ( ! is_file( $src ) ) {
            return '';
        }

        return match ( pathinfo( $src, PATHINFO_EXTENSION ) ) {
            'yaml'  => Yaml::parseFile( $src, Yaml::PARSE_CUSTOM_TAGS ),
            'css'   => preg_replace( '/\s*/m', '', file_get_contents( $src ) ),
            default => trim( file_get_contents( $src ) ),
        };
    }
}