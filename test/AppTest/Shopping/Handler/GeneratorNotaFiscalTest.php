<?php

declare(strict_types=1);

namespace AppTest\Shopping\Handler;

use App\Shopping\Handler\GeneratorNotaFiscalHandler;
use App\Shopping\Order;
use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * GeneratorNotaFiscalTest class
 */
class GeneratorNotaFiscalTest extends TestCase
{
    public function testDeveGerarNotaFiscalComValorDeImpostoDescontado()
    {
        // Exemplo de mock com PHPUnit
        // $notaFiscalDAO = $this->createMock(\App\Shopping\NotaFiscalDAO::class);
        // $notaFiscalDAO->expects($this->once())
        //     ->method('persist')
        //     ->with($this->returnValue(true));

        // Exemplo de mock com Mockery
        $notaFiscalDAO = Mockery::mock('App\Shopping\NotaFiscalDAO');
        $notaFiscalDAO->shouldReceive('persist')
            ->andReturn(true);

        $sap = Mockery::mock('App\Shopping\SAP');
        $sap->shouldReceive('send')
            ->andReturn(true);

        $generator = new GeneratorNotaFiscalHandler($notaFiscalDAO, $sap);

        $order = new Order('André', 1000, 1);

        $notaFiscal = $generator->generate($order);

        $this->assertNotNull($notaFiscal);
        $this->assertTrue($notaFiscalDAO->persist($notaFiscal));
        $this->assertTrue($sap->send($notaFiscal));
        $this->assertEquals(1000 * 0.94, $notaFiscal->getValue());
    }
}
