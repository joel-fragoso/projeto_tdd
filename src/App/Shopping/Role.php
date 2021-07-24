<?php

declare(strict_types=1);

namespace App\Shopping;

use App\Shopping\Handler\CalculatorRuleAbstract;
use App\Shopping\Handler\FifteenOrTwentyFivePorcentHandler;
use App\Shopping\Handler\TenOrTwentyPorcentHandler;
use Exception;

use function array_key_exists;

/**
 * Role class
 */
class Role
{
    public const DEVELOPER = 'developer';
    public const DBA       = 'dba';
    public const TESTER    = 'tester';

    private string $rule;

    /** @var array */
    private array $roles = [
        'developer' => TenOrTwentyPorcentHandler::class,
        'dba'       => FifteenOrTwentyFivePorcentHandler::class,
        'tester'    => FifteenOrTwentyFivePorcentHandler::class,
    ];

    /**
     * @throws Exception
     */
    public function __construct(string $role)
    {
        if (array_key_exists($role, $this->roles)) {
            $this->rule = $this->roles[$role];
        } else {
            throw new Exception('Cargo inválido');
        }
    }

    public function getRule(): CalculatorRuleAbstract
    {
        return new $this->rule();
    }
}
