<?php

declare(strict_types=1);

namespace AppTest\Shopping\Handler;

use App\Shopping\Handler\ActionAfterGeneratingNotaFiscalHandlerInterface;
use App\Shopping\Handler\GeneratorNotaFiscalHandler;
use App\Shopping\Handler\SystemWatchHandler;
use App\Shopping\Handler\TableHandlerInterface;
use App\Shopping\Order;
use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * GeneratorNotaFiscalTest class
 */
class GeneratorNotaFiscalHandlerTest extends TestCase
{
    public function testDeveGerarNotaFiscalComValorDeImpostoDescontado()
    {
        // Exemplo de mock com PHPUnit
        // $notaFiscalDAO = $this->createMock(\App\Shopping\NotaFiscalDAO::class);
        // $notaFiscalDAO->expects($this->any())
        //     ->method('persist')
        //     ->willReturn(true);

        // Exemplo de mock com Mockery
        // $notaFiscalDAO = Mockery::mock('App\Shopping\NotaFiscalDAO');
        // $notaFiscalDAO->shouldReceive('persist')
        //     ->andReturn(true);

        // $sap = Mockery::mock('App\Shopping\SAP');
        // $sap->shouldReceive('send')
        //     ->andReturn(true);

        $table = Mockery::mock(TableHandlerInterface::class);
        $table->shouldReceive('toValue')
            ->with(1000)
            ->andReturn(0.06);

        $action1 = Mockery::mock(ActionAfterGeneratingNotaFiscalHandlerInterface::class);
        $action1->shouldReceive('execute')
            ->andReturn(true);

        $action2 = Mockery::mock(ActionAfterGeneratingNotaFiscalHandlerInterface::class);
        $action2->shouldReceive('execute')
            ->andReturn(true);

        $generator = new GeneratorNotaFiscalHandler([
            $action1,
            $action2,
        ], new SystemWatchHandler(), $table);

        $order = new Order('André', 1000, 1);

        $notaFiscal = $generator->generate($order);

        $this->assertTrue($action1->execute($notaFiscal));
        $this->assertTrue($action2->execute($notaFiscal));
        $this->assertNotNull($notaFiscal);
        $this->assertEquals(1000 * 0.94, $notaFiscal->getValue());
    }

    public function testDeveInvocarAcoesPosteriores()
    {
        $table = Mockery::mock(TableHandlerInterface::class);
        $table->shouldReceive('toValue')
            ->with(1000)
            ->andReturn(0.2);

        $action1 = Mockery::mock(ActionAfterGeneratingNotaFiscalHandlerInterface::class);
        $action1->shouldReceive('execute')
            ->andReturn(true);

        $action2 = Mockery::mock(ActionAfterGeneratingNotaFiscalHandlerInterface::class);
        $action2->shouldReceive('execute')
            ->andReturn(true);

        $generator = new GeneratorNotaFiscalHandler([
            $action1,
            $action2,
        ], new SystemWatchHandler(), $table);

        $order = new Order('André', 1000, 1);

        $notaFiscal = $generator->generate($order);

        $this->assertTrue($action1->execute($notaFiscal));
        $this->assertTrue($action2->execute($notaFiscal));
        $this->assertNotNull($notaFiscal);
        $this->assertInstanceOf(\App\Shopping\NotaFiscal::class, $notaFiscal);
    }

    public function testDeveConsultarATabelaParaCalcularValor()
    {
        $table = Mockery::mock(TableHandlerInterface::class);
        $table->shouldReceive('toValue')
            ->with(1000)
            ->andReturn(0.2);

        $generator = new GeneratorNotaFiscalHandler([], new SystemWatchHandler(), $table);

        $order = new Order('André', 1000, 1);

        $notaFiscal = $generator->generate($order);

        $this->assertEquals(1000 * 0.8, $notaFiscal->getValue());
    }
}
